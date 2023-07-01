<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_m extends CI_Model {
	public function get() {
		$this->db->select('tbl_pembelian.*');
		$this->db->from('tbl_pembelian');
        $this->db->order_by('no_faktur','DESC');
		return $query = $this->db->get();
	}

	public function get_faktur($id = null) {
		$this->db->from('tbl_pembelian');
		if($id != null) {
			$this->db->where('no_faktur', $id);
		}
		return $query = $this->db->get();
	}
	// lUNAS
	public function pembelian_lunas() {
		$lunas = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN user ON tbl_pembelian.user_id = user.user_id INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE tbl_pembelian.status_byr = 'Lunas' ORDER BY supplier.name ASC");
		return $lunas;
	}
	//Utang
	public function pembelian_utang(){
		$utang = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN user ON tbl_pembelian.user_id = user.user_id INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE tbl_pembelian.status_byr = 'Belum Lunas' ORDER BY tbl_pembelian.tgl_pembelian ASC");
		return $utang;
	}
}
/* End of file Obat_m.php */
/* Location: ./application/Models/Obat_m.php*/
