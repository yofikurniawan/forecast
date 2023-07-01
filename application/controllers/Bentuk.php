<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bentuk extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		// check_admin();
	}
	// Index
	public function index() {
		$data['judul'] = 'Data Bentuk';
		$data['sub_judul'] = 'Obat';
		$data['row'] = $this->bentuk_m->get();
		$this->template->load('template', 'master/bentuk/bentuk_data', $data);
	}
	// Form tambah Bentuk
	public function add_bentuk() {
		check_admin();
		$bentuk = new stdClass();
		$bentuk->bentuk_id = null;
		$bentuk->name = null;
		$data = array(
			'judul'=> 'Tambah Data',
			'sub_judul' => 'Bentuk',
			'page' => 'add',
			'row' => $bentuk
		);
		$this->template->load('template', 'master/bentuk/bentuk_form', $data);
	}
	// Form Edit Bentuk
	public function edit_bentuk($id) {
		check_admin();
		$query = $this->bentuk_m->get($id);
		if($query->num_rows() > 0) {
			$unit = $query->row();
			$data = array(
			'judul'=> 'Edit Data',
			'sub_judul' => 'Unit',
			'page' => 'edit',
			'row' => $unit
		);
			$this->template->load('template', 'master/bentuk/bentuk_form', $data);
		}else {
			echo "<script> alert('Data Tidak ditemukan');";
			echo "window.location = '".site_url('unit'). "';
				</script>";
		}
	}
	// Proses tambah dan edit Bentuk
	public function process() {
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->bentuk_m->add($post);
		}elseif (isset($_POST['edit'])) {
			$this->bentuk_m->edit($post);
		}
		if($this->db->affected_rows() > 0) {
	    	$this->session->set_flashdata('flash','Data Bentuk Berhasil Disimpan');
	    }
		redirect('bentuk');
	}
	// Delete Bentuk
	public function del($id) {
		$this->bentuk_m->del($id);
		if($this->db->affected_rows() > 0) {
	    	$this->session->set_flashdata('flash','Data Bentuk Berhasil Dihapus');
	    }
	    	redirect('bentuk');
	}
}

