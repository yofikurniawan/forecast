<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_m extends CI_Model {
	public function get($id = null) {
		$this->db->select('dataobat.*, m_category.name AS category_name, m_unit.name AS unit_name, m_bentuk.name AS bentuk_name');
		$this->db->from('dataobat');
		$this->db->join('m_category', 'm_category.category_id = dataobat.category_id');
        $this->db->join('m_unit', 'm_unit.unit_id = dataobat.unit_id');
        $this->db->join('m_bentuk', 'm_bentuk.bentuk_id = dataobat.bentuk_id');
		if($id != null) {
			$this->db->where('kd_obat', $id);
		}
		$this->db->order_by('kd_obat','ASC');
		return $query = $this->db->get();
	}
	// Insert Data Obat
	public function add_obat($post) {
		$params = [
			'kd_obat' => $post['kd_obat'],
			'nm_obat' => $post['nm_obat'],
			'hrg_obat' => $post['hrg_obat']*1.20,
			'category_id' => $post['category'],
			'bentuk_id' => $post['bentuk'],
			'unit_id' => $post['unit'],
			'hrgbeli_obat' => $post['hrg_obat'],
			'stk_obat' => $post['stok'],
			'minstk_obat' => $post['stk_minimal']
		];
		$this->db->insert('dataobat', $params);
	}
	// Insert Data EXP Obat
	public function add_exp($post) {
		$params = [
			'kd_obat' => $post['kd_obat'],
			'tgl_exp' => $post['exp_obat'],
			'stok' => $post['stok']
		];
		$this->db->insert('stokexpobat', $params);
	}
	//Delete Obat
	public function delete($table, $where) {
		return $this->db->delete($table, $where);
    }
	// Relasi UNIT, CATEGORY, BENTUK
	public function getUnit() {
		$this->db->order_by("name", "ASC");
        return $this->db->get('m_unit')->result_array();
	}
	public function getCategory() {
		$this->db->order_by("name", "ASC");
        return $this->db->get('m_category')->result_array();
	}
	public function getBentuk() {
		$this->db->order_by("name", "ASC");
        return $this->db->get('m_bentuk')->result_array();
	}

	// public function edit($post)
	// {
	// 	$params = [
	// 		'barcode' => $post['barcode'],
	// 		'name' => $post['name'],
	// 		'category_id' => $post['category'],
	// 		'unit_id' => $post['unit'],
	// 		'price' => $post['price'],
	// 		'updated'	=> date('Y-m-d H:i:s') 
	// 	];
	// 	if($post['images'] != null ){
	// 		$params['images'] = $post['images'];
	// 	}
	// 	$this->db->where('item_id',$post['id']);
	// 	$this->db->update('p_item', $params);
	// }	
}
/* End of file Obat_m.php */
/* Location: ./application/Models/Obat_m.php*/
