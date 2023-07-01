<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pembelian extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		check_admin();
	}
	// Index halaman Unit
	public function index() {
		$data['judul'] = 'Data Pembelian Obat Lunas & Utang';
		$data['sub_judul'] = '';
		$data['lunas'] = $this->pembelian_m->pembelian_lunas()->num_rows();
		$data['querylunas'] = $this->pembelian_m->pembelian_lunas();
		$data['utang'] = $this->pembelian_m->pembelian_utang()->num_rows();
		$data['queryutang'] = $this->pembelian_m->pembelian_utang();
		$this->template->load('template', 'pembelian/data_pembelian', $data);
	}
    //form pembelian
    public function form_pembelian() {
		$data['judul'] = 'Form Transaksi Pembelian';
		$data['sub_judul'] = '';
		$this->template->load('template', 'pembelian/form_pembelian', $data);
	}
	//Insert Pembelian
	public function savepembelian() {
		//post
		$no_faktur = $this->input->post('no_faktur');
		$no_supplier = $this->input->post('supplier_id');
		$tgl_pembelian = $this->input->post('tgl_pembelian');
		$total_pembelian = $this->input->post('hidden_totalpembelian');
		$cr_bayar = $this->input->post('cr_bayar');
		
		if($cr_bayar=="Utang"){
			$status = "Belum Lunas";
			$tgl_lunas = "0000-00-00";
			$jth_tempo = $this->input->post('jth_tempo');
		} else {
			$status = "Lunas";
			$tgl_lunas = $tgl_pembelian;
			$jth_tempo = "0000-00-00";
		}
		
		$id_pegawai =  $this->session->userdata('user_id');
		$query_pbl = $this->db->query("INSERT INTO tbl_pembelian (no_faktur, supplier_id, tgl_pembelian, cr_bayar, jth_tempo, total_pembelian, status_byr, tgl_lunas, user_id) VALUES ('$no_faktur', '$no_supplier', '$tgl_pembelian', '$cr_bayar', '$jth_tempo', '$total_pembelian', '$status', '$tgl_lunas', '$id_pegawai')");

		for($i = 0; $i < count((($this->input->post('hidden_kdobat')) ? $this->input->post('hidden_kdobat'):[]));  $i++) {
			$kd_obat = $this->input->post('hidden_kdobat')[$i];
			$hrg_beli = $this->input->post('hidden_hrgobat')[$i];
			$exp_obat = $this->input->post('hidden_expobat')[$i];
			$jml_obat = $this->input->post('hidden_jmlobat')[$i];
			$sat_jual = $this->input->post('hidden_satobat')[$i];
			$subtotal = $this->input->post('hidden_subtotal')[$i];

			$query_pbldtl = $this->db->query("INSERT INTO tbl_pembeliandetail (no_faktur, kd_obat, exp_obatbeli, hrg_beli, jml_beli, sat_beli, subtotal) VALUES ('$no_faktur', '$kd_obat', '$exp_obat', '$hrg_beli', '$jml_obat', '$sat_jual', '$subtotal')");

			$data_stok = $this->db->query("SELECT stk_obat, hrgbeli_obat FROM dataobat WHERE kd_obat = '$kd_obat'")->row_array();
			$stok_lama = $data_stok['stk_obat'];
			$stok_baru = $stok_lama + $jml_obat;
			$harga = $data_stok['hrgbeli_obat'];

			if($stok_lama >= 0) {
				$harga = (($stok_lama*$harga)+($jml_obat*$hrg_beli))/($stok_lama+$jml_obat);
			}

			$harga_jual = $harga*1.20;
			$query_estok = $this->db->query("UPDATE dataobat SET stk_obat='$stok_baru', hrgbeli_obat = '$harga', hrg_obat = '$harga_jual' WHERE kd_obat='$kd_obat'");

			$query_exp = $this->db->query("SELECT stok FROM stokexpobat WHERE kd_obat = '$kd_obat' AND tgl_exp = '$exp_obat'");

			$rows_exp = $query_exp->num_rows();
			if($rows_exp > 0) {
				$data_exp = $query_exp->row_array();
				$stok_lamaexp = $data_exp['stok'];
				$stok_baruexp = $stok_lamaexp + $jml_obat;
				$query_updstokexp = $this->db->query("UPDATE stokexpobat SET stok='$stok_baruexp' WHERE kd_obat='$kd_obat' AND tgl_exp = '$exp_obat'");
			} else {
				$query_stokexp = $this->db->query("INSERT INTO stokexpobat (kd_obat, tgl_exp, stok) VALUES ('$kd_obat', '$exp_obat', '$jml_obat')");
			}
		}
	}

	//Form Laporan Penjualan detail dan Rangkuman
	public function laporan_pembelian_obat() {
		$data['judul'] = 'Laporan Data Pembelian';
		$data['sub_judul'] = 'Obat';
		$this->template->load('template', 'pembelian/form_laporan_pembelian',$data);
	}

	//cek laporan
	public function cek_laporan () {
		$ket_periode = "";
		$periode_lap = $this->input->post('periode_lap');
		$no_supp = $this->input->post('nm_supplier');
		$status_byr = $this->input->post('status_pbl');
		if($no_supp == "semua") {
			$no_supp = "%";
			$ket_supp = "Semua";
		} else {
			$ket_supp = $no_supp;
		}

		if($status_byr == "semua") {
			$status_byr = "%";
			$ket_status = "Semua";
		} else {
			$ket_status = $status_byr;
		}

		if($periode_lap == "hari_ini") {
			$ket_periode = date('d M Y');
			$query = $this->db->query(" SELECT * FROM tbl_pembelian 
					INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id 
					WHERE tbl_pembelian.tgl_pembelian = CURDATE() AND supplier.supplier_id LIKE '$no_supp' 
					AND tbl_pembelian.status_byr  LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");

		} else if($periode_lap == "bulan_ini") {
			$ket_periode = date('F Y');
			$query = $this->db->query(" SELECT * FROM tbl_pembelian 
					INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id 
					WHERE MONTH(tbl_pembelian.tgl_pembelian) = MONTH(CURDATE()) 
					AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr  LIKE '$status_byr' 
					ORDER BY tbl_pembelian.tgl_pembelian ASC");

		} else if($periode_lap == "tahun_ini") {
			$ket_periode = "tahun ".date('Y');
			$query = $this->db->query("SELECT * FROM tbl_pembelian 
					INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id 
					WHERE YEAR(tbl_pembelian.tgl_pembelian) = YEAR(CURDATE()) 
					AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr  LIKE '$status_byr' 
					ORDER BY tbl_pembelian.tgl_pembelian ASC");

		} else if($periode_lap == "pertanggal") {
			$cek_tgl = $this->input->post('tgl_akhir');
			$tgl_awal = $this->input->post('per_tanggal1');
			if($cek_tgl == "yes") {
				$tgl_akhir = $this->input->post('per_tanggal2');
				$ket_periode = tgl_indo($tgl_awal)." sd ".tgl_indo($tgl_akhir);
				$query = $this->db->query("SELECT * FROM tbl_pembelian 
						INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id 
						WHERE (tbl_pembelian.tgl_pembelian BETWEEN '$tgl_awal' AND '$tgl_akhir') 
						AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr LIKE '$status_byr' 
						ORDER BY tbl_pembelian.tgl_pembelian ASC");

			} else {
				$ket_periode = tgl_indo($tgl_awal);
				$query = $this->db->query("SELECT * FROM tbl_pembelian 
					INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id 
					WHERE tbl_pembelian.tgl_pembelian = '$tgl_awal' AND supplier.supplier_id LIKE '$no_supp' 
					AND tbl_pembelian.status_byr LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
			}
		} else if($periode_lap == "perbulan") {
			$cek_bln = $this->input->post('bulan_akhir');
			$bulan1 = $this->input->post('per_bulan1');
			$tahunbulan1 = $this->input->post('tahun_perbulan1');
			if($cek_bln == "yes") {
				$bulan2 = $this->input->post('per_bulan2');
				$tahunbulan2 = $this->input->post('tahun_perbulan2');
				$tgl_awal = $tahunbulan1."-".$bulan1."-01";
				$tgl_akhir = $tahunbulan2."-".$bulan2."-31";
				$ket_periode = bulan_indo($bulan1)." ".$tahunbulan1." sd ".bulan_indo($bulan2)." ".$tahunbulan2;
				$query = $this->db->query("SELECT * FROM tbl_pembelian 
					INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id 
					WHERE (tbl_pembelian.tgl_pembelian BETWEEN '$tgl_awal' AND '$tgl_akhir') 
					AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr LIKE '$status_byr' 
					ORDER BY tbl_pembelian.tgl_pembelian ASC");

			} else {
				$ket_periode = bulan_indo($bulan1)." ".$tahunbulan1;
				$query = $this->db->query("SELECT * FROM tbl_pembelian 
						INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id 
						WHERE (MONTH(tbl_pembelian.tgl_pembelian) = '$bulan1' 
						AND YEAR(tbl_pembelian.tgl_pembelian) = '$tahunbulan1') 
						AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr  LIKE '$status_byr' 
						ORDER BY tbl_pembelian.tgl_pembelian ASC");
			}
		} else if($periode_lap == "pertahun") {
			$cek_thn = $this->input->post('tahun_akhir');
			$per_tahun1 = $this->input->post('per_tahun1');
			if($cek_thn == "yes") {
				$per_tahun2 = @$_POST['per_tahun2'];
				$ket_periode = "tahun ".$per_tahun1." sd ".$per_tahun2;
				$query = $this->db->query("SELECT * FROM tbl_pembelian 
						INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id 
						WHERE (YEAR(tbl_pembelian.tgl_pembelian) BETWEEN '$per_tahun1' AND '$per_tahun2') 
						AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr LIKE '$status_byr' 
						ORDER BY tbl_pembelian.tgl_pembelian ASC");

			} else {
				$ket_periode = "tahun ".$per_tahun1;
				$query = $this->db->query("SELECT * FROM tbl_pembelian 
					INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id 
					WHERE YEAR(tbl_pembelian.tgl_pembelian) = '$per_tahun1' AND supplier.supplier_id LIKE '$no_supp' 
					AND tbl_pembelian.status_byr LIKE '$status_byr' 
					ORDER BY tbl_pembelian.tgl_pembelian ASC");
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
	public function laporan_pembelian_detail() {
		$data['obat'] = $this->pembelian_m->get();
		$html = $this->load->view('pembelian/laporan_pembelian_detail', $data, true);
		$this->fungsi->PdfGenerator($html, 'barcode',  'A4', 'portrait');
	}
	//Laporan Penjualan Rangkuman
	public function laporan_pembelian_rangkuman() {
		$data['obat'] = $this->pembelian_m->get();
		$html = $this->load->view('pembelian/laporan_pembelian_rangkuman', $data, true);
		$this->fungsi->PdfGenerator($html, 'barcode',  'A4', 'portrait');
	}
	//Detail Data Pembelian
	public function detail() {
		$no_faktur = $this->input->get('no_faktur');
		$query_lihat = $this->db->query("SELECT dataobat.nm_obat, tbl_pembeliandetail.hrg_beli, tbl_pembeliandetail.jml_beli, tbl_pembeliandetail.sat_beli, tbl_pembeliandetail.subtotal 
			FROM tbl_pembeliandetail 
			INNER JOIN dataobat ON tbl_pembeliandetail.kd_obat = dataobat.kd_obat 
			WHERE tbl_pembeliandetail.no_faktur = '$no_faktur'");
		$data = array();
		foreach($query_lihat->result_array() as $key => $detail) {
			$data[] = $detail;
		}
		echo json_encode($data);
	}
	//hapus data pembelian
	public function hapus() {
		$id = $this->input->post("id");
		$query_pbl = $this->db->query("DELETE FROM tbl_pembelian WHERE no_faktur = '$id'");
	}
	//pelunasan pembelian
	public function pelunasan() {
		$no_faktur = $this->input->post('no_faktur');
		$tgl_lunas = date('Y-m-d');
		$query_lunas = $this->db->query("UPDATE tbl_pembelian SET status_byr = 'Lunas', tgl_lunas = '$tgl_lunas' WHERE no_faktur = '$no_faktur'");
	}
	// Nota Pembelian
	public function nota_pembelian($id) {
		$data['no_faktur'] = $this->input->post('no_faktur');
		$html = $this->load->view('pembelian/nota_pembelian', $data, true);
		$this->fungsi->PdfGenerator($html, 'barcode',  'A4', 'portrait');
	}

}

