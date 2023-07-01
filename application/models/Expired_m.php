<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Expired_m extends CI_Model {   
    //Ambil Data Expired Kurang dari 30 sampai 10 Hari
    public function exp30() {
        $query = $this->db->query("SELECT A.*, B.name AS category_name, C.name AS unit_name, D.name AS
                                    bentuk_name, E.* 
                                    FROM dataobat A
                                    INNER JOIN m_category B ON A.category_id = B.category_id
                                    INNER JOIN m_unit C ON A.unit_id = C.unit_id
                                    INNER JOIN m_bentuk D ON A.bentuk_id = D.bentuk_id
                                    INNER JOIN stokexpobat E ON A.kd_obat = E.kd_obat 
                                    WHERE E.tgl_exp>date_add(CURDATE(), INTERVAL 10 DAY) 
                                    AND E.tgl_exp<=date_add(CURDATE(), INTERVAL 30 DAY) AND E.stok > 0");
        return $query;
    }
    //Ambil Data Expired Kurang dari 10 Hari 
    public function exp10() {
        $query = $this->db->query("SELECT A.*, B.name AS category_name, C.name AS unit_name, D.name AS
                                    bentuk_name, E.* 
                                    FROM dataobat A
                                    INNER JOIN m_category B ON A.category_id = B.category_id
                                    INNER JOIN m_unit C ON A.unit_id = C.unit_id
                                    INNER JOIN m_bentuk D ON A.bentuk_id = D.bentuk_id
                                    INNER JOIN stokexpobat E ON A.kd_obat = E.kd_obat 
                                    WHERE E.tgl_exp>CURDATE() 
                                    AND E.tgl_exp<=date_add(CURDATE(), INTERVAL 10 DAY) AND E.stok > 0");
        return $query;
    }
    // Ambil Data Expired
    public function expired() {
        $query = $this->db->query("SELECT A.*, B.name AS category_name, C.name AS unit_name, D.name AS
                                    bentuk_name, E.* 
                                    FROM dataobat A
                                    INNER JOIN m_category B ON A.category_id = B.category_id
                                    INNER JOIN m_unit C ON A.unit_id = C.unit_id
                                    INNER JOIN m_bentuk D ON A.bentuk_id = D.bentuk_id
                                    INNER JOIN stokexpobat E ON A.kd_obat = E.kd_obat 
                                    WHERE E.tgl_exp<=CURDATE() AND E.stok > 0");
        return $query;
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
}
/* End of file Obat_m.php */
/* Location: ./application/Models/Expired_m.php*/
