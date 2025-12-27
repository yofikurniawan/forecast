<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	function __construct() {
		parent::__construct();
        check_not_login();
		// check_admin();
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	// Index Halaman Obat
    public function index() {
        $data['judul'] = 'Data Penjualan';
		$data['sub_judul'] = 'Obat';
		$data['obat'] = $this->penjualan_m->get();
		$this->template->load('template', 'penjualan/data_penjualan',$data);
	}
	public function per_obat() {
        $data['judul'] = 'Data Penjualan';
		$data['sub_judul'] = 'Obat';
		$data['perobat'] = $this->penjualan_m->perobat();
		$this->template->load('template', 'penjualan/data_penjualan_perobat',$data);
	}
    // Form Tambah data obat
    public function form_invoice() {
        $data['judul'] = 'Form Transaksi Penjualan';
		$data['sub_judul'] = 'Obat';
		$this->template->load('template', 'penjualan/form_penjualan',$data);
    }
	// Proses Simpan Penjualan
	public function savepenjualan() {
		$no_penjualan = $this->input->post('no_penjualan');
		$tgl_penjualan = $this->input->post('tanggal_pjl');
		$tunai = $this->input->post('jml_uang');
		$kembali = $this->input->post('jml_kembali');
		$total_penjualan = $this->input->post('hidden_totalpenjualan');
		$karyawan = $this->session->userdata('user_id');
		$peramalan = date('Y-m-d');

		//Query Insert tabel penjualan
		$query_penjualan = $this->db->query(" INSERT INTO tbl_penjualan VALUES ('$no_penjualan', '$tgl_penjualan', '$total_penjualan', '$tunai', '$kembali', '$karyawan')");
	
		for($i = 0; $i < count((($this->input->post('hidden_kdobat')) ? $this->input->post('hidden_kdobat'):[]));  $i++) {
		
			$kd_obat = $this->input->post('hidden_kdobat')[$i];
			$hrg_jual = $this->input->post('hidden_hrgobat')[$i]; 
			$jml_obat = $this->input->post('hidden_jmlobat')[$i];
			$sat_jual = $this->input->post('hidden_satobat')[$i];
			$subtotal = $this->input->post('hidden_subtotal')[$i];
			$exp_obat = $this->input->post('hidden_expobat')[$i];

			// Query Insert
			$query_pjldtl = $this->db->query("INSERT INTO tbl_penjualandetail (no_penjualan, kd_obat, expired, hrg_jual, jml_jual, sat_jual, subtotal, bulantahun_pembelian) VALUES ('$no_penjualan', '$kd_obat', '$exp_obat', '$hrg_jual', '$jml_obat', '$sat_jual', '$subtotal','$peramalan')"); 

			//Query menampilkan data stk_obat
			$query_stok =  $this->db->query("SELECT stk_obat FROM dataobat WHERE kd_obat = '$kd_obat'")->row_array();
		
			$stok_lama = $query_stok['stk_obat'];
			$stok_baru = $stok_lama - $jml_obat;
			//
			$query_estok = $this->db->query("UPDATE dataobat SET stk_obat='$stok_baru' WHERE kd_obat='$kd_obat'");

			$query_stokexp = $this->db->query("SELECT stok FROM stokexpobat WHERE kd_obat = '$kd_obat' AND tgl_exp = '$exp_obat'")->row_array();

			$stok_lamaexp = $query_stokexp['stok'];
			$stok_baruexp = $stok_lamaexp - $jml_obat;
			$query_estokexp = $this->db->query("UPDATE stokexpobat SET stok='$stok_baruexp' WHERE kd_obat='$kd_obat' AND tgl_exp = '$exp_obat'");
		}	
	}
	//Ajax Detail Data Penjualan
	public function detail() {
		$no_pjl = $this->input->get('no_pjl');
		$query_lihat = $this->db->query(" SELECT dataobat.nm_obat, tbl_penjualandetail.hrg_jual, tbl_penjualandetail.jml_jual, tbl_penjualandetail.sat_jual, tbl_penjualandetail.subtotal 
			FROM tbl_penjualandetail 
			INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat 
			WHERE tbl_penjualandetail.no_penjualan = '$no_pjl'");
		
		$data1 = array();
		foreach ($query_lihat->result_array() as $key => $data) {
			$data1[] = $data;
		}
			echo json_encode($data1);
	}
	//Laporan Data Penjualan per no penjualan
	public function laporan_penjualan($no_pjl) {
		$oke1 = $this->uri->segment(3);
		$oke2 = $this->uri->segment(4);
		$oke3 = $this->uri->segment(5);
		$no_pjl = $oke1.'/'.$oke2.'/'.$oke3;
		$data['user'] = $this->penjualan_m->laporan_penjualan_user($no_pjl);
		$data['penjualan'] = $this->penjualan_m->laporan_penjualan($no_pjl);
		$html = $this->load->view('penjualan/laporan_penjualan', $data, true);
		$this->fungsi->PdfGenerator($html, 'barcode',  array(0, 0, 320, 330), 'portrait');
		//$this->load->view('laporan/lampiran'); 
	}
	//Hapus Data Penjualan Obat
	public function hapus_penjualan_obat() {
		$id = $this->input->post("id");
		$query_pjl = $this->db->query("DELETE FROM tbl_penjualan WHERE no_penjualan = '$id'");
		$query_pjl1 = $this->db->query("DELETE FROM tbl_penjualandetail WHERE no_penjualan = '$id'");
	}

	//Form Laporan Penjualan detail dan Rangkuman
	public function laporan_penjualan_obat() {
		$data['judul'] = 'Form Laporan Data Penjualan';
		$data['sub_judul'] = 'Obat';
		$this->template->load('template', 'penjualan/form_laporan_penjualan',$data);
	}
	//Laporan Penjualan Rangkuman
	public function laporan_penjualan_rangkuman() {
		$data['obat'] = $this->penjualan_m->get();
		$html = $this->load->view('penjualan/laporan_penjualan_rangkuman', $data, true);
		$this->fungsi->PdfGenerator($html, 'barcode',  'A4', 'portrait');
	}
	//cek laporan penjualan
	public function ceklaporan() {
		$ket_periode = "";
		$periode_lap = $this->input->post('periode_lap');
		$pegawai = $this->input->post('nm_peg');
		if($pegawai == "semua") {
			$pegawai = "%";
			$ket_pegawai = "Semua";
		} else {
			$ket_pegawai = $pegawai;
		}
		if($periode_lap == "hari_ini") {
			$ket_periode = date('d M Y');
			$query = $this->db->query(" SELECT * FROM tbl_penjualan 
					INNER JOIN user ON tbl_penjualan.user_id = user.user_id 
					WHERE tbl_penjualan.tgl_penjualan = CURDATE() 
					AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");

		} else if($periode_lap == "bulan_ini") {
			$ket_periode = date('F Y');
			$query = $this->db->query(" SELECT * FROM tbl_penjualan 
					INNER JOIN user ON tbl_penjualan.user_id = user.user_id 
					WHERE (MONTH(tbl_penjualan.tgl_penjualan) = MONTH(CURDATE()) 
					AND YEAR(tbl_penjualan.tgl_penjualan) = YEAR(CURDATE())) 
					AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
		} else if($periode_lap == "tahun_ini") {
			$ket_periode = "tahun ".date('Y');
			$query = $this->db->query(" SELECT * FROM tbl_penjualan 
					INNER JOIN user ON tbl_penjualan.user_id = user.user_id 
					WHERE YEAR(tbl_penjualan.tgl_penjualan) = YEAR(CURDATE()) 
					AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
		} else if($periode_lap == "pertanggal") {
			$cek_tgl =$this->input->post('tgl_akhir');
			$tgl_awal =$this->input->post('per_tanggal1');
			if($cek_tgl == "yes") {
				$tgl_akhir =$this->input->post('per_tanggal2');
				$ket_periode = tgl_indo($tgl_awal)." sd ".tgl_indo($tgl_akhir);
				$query = $this->db->query(" SELECT * FROM tbl_penjualan 
						INNER JOIN user ON tbl_penjualan.user_id = user.user_id 
						WHERE (tbl_penjualan.tgl_penjualan BETWEEN '$tgl_awal' 
						AND '$tgl_akhir') AND user.user_id LIKE '$pegawai' 
						ORDER BY tbl_penjualan.tgl_penjualan ASC");
			} else {
				$ket_periode = tgl_indo($tgl_awal);
				$query = $this->db->query(" SELECT * FROM tbl_penjualan 
						INNER JOIN user ON tbl_penjualan.user_id = user.user_id 
						WHERE tbl_penjualan.tgl_penjualan = '$tgl_awal' 
						AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
			}	
		} else if($periode_lap == "perbulan") {
			$cek_bln =$this->input->post('bulan_akhir');
			$bulan1 =$this->input->post('per_bulan1');
			$tahunbulan1 =$this->input->post('tahun_perbulan1');
			if($cek_bln == "yes") {
				$bulan2 = $this->input->post('per_bulan2');
				$tahunbulan2 =$this->input->post('tahun_perbulan2');
				$ket_periode = bulan_indo($bulan1)." ".$tahunbulan1." sd ".bulan_indo($bulan2)." ".$tahunbulan2;
				$query = $this->db->query(" SELECT * FROM tbl_penjualan 
					INNER JOIN user ON tbl_penjualan.user_id = user.user_id 
					WHERE ((MONTH(tbl_penjualan.tgl_penjualan) BETWEEN '$bulan1' 
					AND '$bulan2') AND (YEAR(tbl_penjualan.tgl_penjualan) BETWEEN '$tahunbulan1' 
					AND '$tahunbulan2')) AND user.user_id LIKE '$pegawai' 
					ORDER BY tbl_penjualan.tgl_penjualan ASC");	

			} else {
				$ket_periode = bulan_indo($bulan1)." ".$tahunbulan1;
				$query = $this->db->query("SELECT * FROM tbl_penjualan 
						INNER JOIN user ON tbl_penjualan.user_id = user.user_id 
						WHERE (MONTH(tbl_penjualan.tgl_penjualan) = '$bulan1' 
						AND YEAR(tbl_penjualan.tgl_penjualan) = '$tahunbulan1') 
						AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
			}
		} else if($periode_lap == "pertahun") {
			$cek_thn =$this->input->post('tahun_akhir');
			$per_tahun1 =$this->input->post('per_tahun1');
			if($cek_thn == "yes") {
				$per_tahun2 =$this->input->post('per_tahun2');
				$ket_periode = "tahun ".$per_tahun1." sd ".$per_tahun2;
				$query = $this->db->query("SELECT * FROM tbl_penjualan 
					INNER JOIN user ON tbl_penjualan.user_id = user.user_id 
					WHERE (YEAR(tbl_penjualan.tgl_penjualan) BETWEEN '$per_tahun1' 
					AND '$per_tahun2') AND user.user_id LIKE '$pegawai' 
					ORDER BY tbl_penjualan.tgl_penjualan ASC");

			} else {
				$ket_periode = "tahun ".$per_tahun1;
				$query = $this->db->query("SELECT * FROM tbl_penjualan 
					INNER JOIN user ON tbl_penjualan.user_id = user.user_id 
					WHERE YEAR(tbl_penjualan.tgl_penjualan) = '$per_tahun1' 
					AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
			}
		}
			$rows = $query;
			if($rows->num_rows() >0) {
				echo "ada";
			} else {
				echo "kosong";
			}
	}
	// laporan penjualan detail
	public function laporan_penjualan_detail() {
		$data['obat'] = $this->penjualan_m->get();
		$html = $this->load->view('penjualan/laporan_penjualan_detail', $data, true);
		$this->fungsi->PdfGenerator($html, 'Laporan',  'A4', 'portrait');
	}
}
