<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model {
	// Ambil Data Category Obat
	public function get($id = null) {
		$this->db->from('m_category');
		if($id != null) {
			$this->db->where('category_id', $id);
		}
		$this->db->order_by('name','ASC');
		return $query = $this->db->get();
	}
	// Tmbah Data Category Obat
	public function add($post) {
		$params = [ 'name' => $post['name']];
		$this->db->insert('m_category', $params);
	}
	// Edit Data Category Obat
	public function edit($post) {
		$params = [
			'name' => $post['name'],
			'updated'	=> date('Y-m-d H:i:s') 
		];
		$this->db->where('category_id',$post['id']);
		$this->db->update('m_category', $params);
	}
	// Delete Data Category Obat
	public function del($id) {
		$this->db->where('category_id',$id);
		$this->db->delete('m_category');
	}
}
/* End of file Category_m.php */
/* Location: ./application/Models/Category_m.php*/
