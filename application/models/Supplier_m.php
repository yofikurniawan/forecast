<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {
	//Ambil Data Supplier
	public function get($id = null) {
		$this->db->from('supplier');
		if($id != null) {
			$this->db->where('supplier_id', $id);
		}
		return $query = $this->db->get();
	}
	//Tambah Data Supplier
	public function add($post) {
		$params = [
			'name' => $post['name'],
			'alamat' => $post['alamat'],
			'email' => $post['email'],
			'phone' => $post['phone'],
			'deskripsi' => empty($post['deskripsi']) ? null : $post['deskripsi'],
		];
		$this->db->insert('supplier', $params);
	}
	//Edit Data Supplier
	public function edit($post) {
		$params = [
			'name' => $post['name'],
			'alamat' => $post['alamat'],
			'email' => $post['email'],
			'phone' => $post['phone'],
			'deskripsi' => empty($post['deskripsi']) ? null : $post['deskripsi'],
			'update'	=> date('Y-m-d H:i:s') 
		];
		$this->db->where('supplier_id',$post['supplier_id']);
		$this->db->update('supplier', $params);
	}
	//Delete Data Supplier
	public function del($id) {
		$this->db->where('supplier_id',$id);
		$this->db->delete('supplier');
	}
}
/* End of file Supplier_m.php */
/* Location: ./application/Models/Supplier_m.php*/
