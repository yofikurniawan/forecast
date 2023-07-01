<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {
	function __construct() {
		parent::__construct();
        check_not_login();
		// check_admin();
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	// Index Halaman Obat
    public function index() {
        $data['judul'] = 'Data';
		$data['sub_judul'] = 'Obat ';
		$data['row'] = $this->obat_m->get();
		$this->template->load('template', 'obat/data_obat', $data);
	}
	// Form Tambah data obat
	public function tambah_data_obat() {
		check_admin();
		$data['judul'] = 'Data Obat';
		$data['sub_judul'] = 'tambah data obat';
		$data['unit'] = $this->obat_m->getUnit();
		$data['category'] = $this->obat_m->getCategory();
		$data['bentuk'] = $this->obat_m->getBentuk();
		$this->template->load('template', 'obat/add_obat',$data);	
	}
	// Proses tambah data obat
	public function proses_add_obat() {
		//Aturan Vlidasi
		$this->form_validation->set_rules('kd_obat', 'Kode obat', 'required|is_unique[dataobat.kd_obat]');
		$this->form_validation->set_rules('nm_obat', 'Nama obat', 'required');
		$this->form_validation->set_rules('hrg_obat', 'Harga Obat', 'required');
		$this->form_validation->set_rules('stok', 'Stok Obat', 'required');
		$this->form_validation->set_rules('stk_minimal', 'Stok Minimal', 'required');
		// Pesan Validasi
		$this->form_validation->set_message('is_unique', ' %s sudah digunakan, Silahkan diganti');
		$this->form_validation->set_message('required', ' %s masih kosong, silahkan diisi');
		// Ketika Validasi Dijalankan
		if ($this->form_validation->run() == FALSE) {
				$this->tambah_data_obat();
			}else {
					$post = $this->input->post(null, TRUE);
					if(isset($_POST['add'])) {
						$this->obat_m->add_obat($post);
						$this->obat_m->add_exp($post);
						$query = $this->db->affected_rows();
						if($query > 0) {
							$this->session->set_flashdata('flash','Data Obat Berhasil Disimpan');
						}
						redirect('obat');
					}else {
						$this->session->set_flashdata('flash','Data Obat Gagal Ditambahkan');
						redirect('obat/add_obat');
				}
		}	
	}
	// form edit data obat
	public function edit_obat($obat_id) {
		check_admin();
		$data['judul'] = 'Edit Data Obat';
		$data['sub_judul'] = 'Edit Obat';
		$obat_id = $this->uri->segment(3);
		// $data['row'] = $this->obat_m->get($obat_id)->result_array(); 
		$data['unit'] = $this->obat_m->getUnit();
		$data['category'] = $this->obat_m->getCategory();
		$data['bentuk'] = $this->obat_m->getBentuk();
		$this->template->load('template', 'obat/edit_obat', $data);
	}
	// Proses Edit Obat
	public function edit_data_obat() {
		// Post Input
		$kode = $this->input->post('kd_obat');
		$nama = $this->input->post('nm_obat');
		$ktg = $this->input->post('category');
		$bentuk = $this->input->post('bentuk');
		$satuan = $this->input->post('unit');
		$harga = $this->input->post('hrgbeli_obat');
		$harga_jual = $harga*1.20;
		$stok = 0;
		$min_stok = $this->input->post('stk_minimal');

		$a_nmrstok = $this->input->post('no_stok');
		$a_exp = $this->input->post('tgl_exp');
		$a_stok = $this->input->post('stok');
		$jml_a = count($a_nmrstok);
		// Lakukan Perulanngan
		for($i=0; $i<$jml_a; $i++) {
			$nmr_stok = $a_nmrstok[$i];
			$exp_s = $a_exp[$i];
			$stok_s = $a_stok[$i];
			$stok = $stok + $stok_s;
			// Query Update Stoxexpobat
			$sql_stok = $this->db->query("UPDATE stokexpobat SET tgl_exp = '$exp_s', stok = '$stok_s' WHERE no_stok = '$nmr_stok'");
		}
		// Query Update Data Obat
		$sql = $this->db->query("UPDATE dataobat SET nm_obat='$nama', category_id='$ktg', unit_id='$satuan', hrg_obat='$harga_jual', hrgbeli_obat='$harga', stk_obat='$stok', bentuk_id='$bentuk', minstk_obat='$min_stok' WHERE kd_obat = '$kode'");

		if($sql && $sql_stok) {
			echo "berhasil";
		} else {
			echo "gagal";
		}
	}
	// Proses delete Obat
	public function deleteObat($obat_id) {
		$where = array('obat_id' => $obat_id);
		$oke = $this->obat_m->delete('dataobat',$where);
		if($oke == TRUE) {
			$this->session->set_flashdata('flash', 'Data obat telah dihapus');
			redirect('obat');
		}else {
			$this->session->set_flashdata('flash-delete', 'Data obat gagal dihapus');
			redirect('obat');
		}	
	}
	// Ajax Detail Expired Obat
	public function ajax() {
		$kd_obat = $this->input->get('kd_obat');
		$query_expstok = $this->db->query("SELECT * FROM stokexpobat WHERE kd_obat ='$kd_obat'");
		$data_expstok = array();
		foreach ($query_expstok->result_array() as $key => $data) {
			$data_expstok[] = $data; 
		}
		echo json_encode($data_expstok);
	}
	//Laporan Data Obat
	public function laporan() {
		$data['row'] = $this->obat_m->get();
		$html = $this->load->view('laporan/lampiran', $data, true);
		$this->fungsi->PdfGenerator($html, 'barcode',  array(0, 0, 190, 190), 'portrait');
		//$this->load->view('laporan/lampiran'); 
	}
	// function barcode_print($id)
	// { array(0, 0, 200, 250)
	// 	$data['row'] = $this->item_m->get($id)->row();
	// 	$html = $this->load->view('product/item/barcode_print', $data, true);
	// 	$this->fungsi->PdfGenerator($html,'Barcode-'.$data['row']->barcode, 'A4', 'landscape');
	// }
}