<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct() {
		parent::__construct();
		check_not_login();
		// check_admin();
	}
	// Index
	public function index() {
		$data['judul'] = 'Category';
		$data['sub_judul'] = 'Category Obat';
		$data['row'] = $this->category_m->get();
		$this->template->load('template', 'master/category/category_data', $data);
	}
	// Form tambah Category
	public function add_category() {
		check_admin();
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;
		$data = array(
			'judul'=> 'Tambah Data',
			'sub_judul' => 'Category', 
			'page' => 'add',
			'row' => $category
		);
		$this->template->load('template', 'master/category/category_form', $data);
	}
	// Form Edit Category
	public function edit_category($id) {
		check_admin();
		$query = $this->category_m->get($id);
		if($query->num_rows() > 0) {
			$category = $query->row();
			$data = array(
			'judul'=> 'Edit Data',
			'sub_judul' => 'Category', 
			'page' => 'edit',
			'row' => $category );
			$this->template->load('template', 'master/category/category_form', $data);
		}else {
			echo "<script> alert('Data Tidak ditemukan');";
			echo "window.location = '".site_url('category'). "';
				</script>";
		}
	}
	// Proses tambah  dan edit category
	public function process() {
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->category_m->add($post);
		}else if (isset($_POST['edit'])) {
			$this->category_m->edit($post);
		}
		$query = $this->db->affected_rows();
		if($query > 0) {
	        $this->session->set_flashdata('flash','Data Berhasil Disimpan/Diedit');
	    }
		redirect('category');
	}
	// Delete Category
	public function del($id) {
		$this->category_m->del($id);
		if($this->db->affected_rows() > 0) {
	    	$this->session->set_flashdata('flash-delete','Data berhasil dihapus');
	    }
	    redirect('category');
	}

}