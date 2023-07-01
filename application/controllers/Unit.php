<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Unit extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		// check_admin();
	}
	// Index halaman Unit
	public function index() {
		$data['judul'] = 'Data';
		$data['sub_judul'] = 'Unit/Satuan Obat';
		$data['row'] = $this->unit_m->get();
		$this->template->load('template', 'master/unit/unit_data', $data);
	}
	// Form tambah data unit
	public function add_unit() {
		check_admin();
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		$data = array(
			'judul'=> 'Tambah Data',
			'sub_judul' => 'Unit',
			'page' => 'add',
			'row' => $unit
		);
		$this->template->load('template', 'master/unit/unit_form', $data);
	}
	// Form edit data unit
	public function edit_unit($id) {
		check_admin();
		$query = $this->unit_m->get($id);
		if($query->num_rows() > 0) {
			$unit = $query->row();
			$data = array(
			'judul'=> 'Edit Data',
			'sub_judul' => 'Unit',
			'page' => 'edit',
			'row' => $unit);
			$this->template->load('template', 'master/unit/unit_form', $data);
		}else {
			echo "<script> alert('Data Tidak ditemukan');";
			echo "window.location = '".site_url('unit'). "'; </script>";
		}
	}
	// Proses tambah dan edit unit
	public function process() {
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->unit_m->add($post);
		}else if(isset($_POST['edit'])) {
			$this->unit_m->edit($post);
		}
		if($this->db->affected_rows() > 0) {
	    	$this->session->set_flashdata('flash','Data Unit Berhasil Disimpan');
	    }
		redirect('unit');
	}
	// Delte data unit
	public function del($id) {
		$this->unit_m->del($id);
		if($this->db->affected_rows() > 0) {
	    	$this->session->set_flashdata('flash','Data Unit Berhasil Dihapus');
	    }
	    	redirect('unit');
	}
}

