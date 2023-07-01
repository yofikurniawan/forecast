<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Expired extends CI_Controller {
	function __construct() {
		parent::__construct();
        check_not_login();
		// check_admin();
    }
    // Index Expired Obat
    public function index() {
        $data['judul'] = 'Data Expired Obat';
        $data['sub_judul'] = 'Expired Obat';
        $data['Tigapuluh'] = $this->expired_m->exp30();
        $data['sepuluh']  = $this->expired_m->exp10();
        $data['expired'] = $this->expired_m->expired();
		$this->template->load('template', 'expired', $data);
    }
    //Fungsi Mengkosongkan Expired Stok Obat
    public function kosongkan_stok() {
        // Post
        $id = $this->input->post('kd_obat');
        $exp = $this->input->post('tgl_exp');
        $stok = $this->input->post('stok'); 
        // Query Update stokexpobat
		$query_ksgstok = $this->db->query("UPDATE stokexpobat SET stok = '0' WHERE kd_obat = '$id' 
        AND tgl_exp = '$exp'");
        // Query Mengambil Berdasarkan Kode Obat
        $data_stok = $this->db->query("SELECT stk_obat FROM dataobat WHERE kd_obat = '$id'")->row_array();
        // Mengambil Stok Obat dari tabel data obat
        $stok_lama = $data_stok['stk_obat'];
        $stok_baru = $stok_lama - $stok;
        // Query Update tabel data obat
        $query_estok = $this->db->query("UPDATE dataobat SET stk_obat = '$stok_baru' WHERE kd_obat= '$id'");
        return $data_stok;
    }
}
