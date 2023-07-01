<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_not_login();
		// check_admin();
	}
	// Index Dashboard
	public function index() {
		$data['judul'] = " ";
		$data['sub_judul'] = "";
		$this->template->load('template','dashboard',$data);
	}
	// Visi dan misi Apotek
	public function visidanmisi() {
		$data['judul'] = 'Visi, Moto dan Misi Apotek';
		$data['sub_judul'] = '';
		$this->template->load('template','visidanmisi',$data);
	}
	// Form Edit Profile berdasrkan Session
	public function profile() {
		$data['judul'] = 'Profile';
		$data['sub_judul'] = '';
		$this->template->load('template','profile',$data);
	}
	// Download panduan ebook apotek
	public function panduan_pelayanan() {
		force_download('assets/file/pelayanan.pdf',NULL);
	}

}
