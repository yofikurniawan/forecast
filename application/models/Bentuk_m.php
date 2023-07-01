<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bentuk_m extends CI_Model {
	//Ambil Data Bentuk
	public function get($id = null) {
		$this->db->from('m_bentuk');
		if($id != null) {
			$this->db->where('bentuk_id', $id);
		}
		return $query = $this->db->get();
	}
	// Tmbah Data Bentuk
	public function add($post) {
		$params = ['name' => $post['name'],];
		$this->db->insert('m_bentuk', $params);
	}
	// Edit Data Bentuk
	public function edit($post) {
		$params = [
			'name' => $post['name'],
			'updated'	=> date('Y-m-d H:i:s') 
		];
		$this->db->where('bentuk_id',$post['id']);
		$this->db->update('m_bentuk', $params);
	}
	// Delete Data Bentuk
	public function del($id) {
		$this->db->where('bentuk_id',$id);
		$this->db->delete('m_bentuk');
	}
}
/* End of file Bentuk_m.php */
/* Location: ./application/Models/Bentuk_m.php*/
