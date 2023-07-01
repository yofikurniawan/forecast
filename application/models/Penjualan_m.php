<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_m extends CI_Model {
	public function get() {
		$this->db->select('tbl_penjualan.*, user.*');
		$this->db->from('tbl_penjualan');
		$this->db->join('user', 'user.user_id = tbl_penjualan.user_id');
		$this->db->order_by('tgl_penjualan','DESC');
        $this->db->order_by('no_penjualan','DESC');
		return $query = $this->db->get();
	}
    //Perobat
    public function perobat() {
        $tgl_sekarang = date('Y-m-d');
		$nomor = 1;
        $query_pjlobat = $this->db->query("SELECT nm_obat, tbl_penjualandetail.kd_obat, m_unit.*, SUM(tbl_penjualandetail.jml_jual) AS jml_terjual, SUM(tbl_penjualandetail.hrg_jual*tbl_penjualandetail.jml_jual) AS keuntungan 
        FROM tbl_penjualandetail
        INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat 
        INNER JOIN tbl_penjualan ON tbl_penjualandetail.no_penjualan = tbl_penjualan.no_penjualan
        INNER JOIN m_unit ON  dataobat.unit_id = m_unit.unit_id
        WHERE (tbl_penjualan.tgl_penjualan 
        BETWEEN '' AND '$tgl_sekarang') 
        GROUP BY tbl_penjualandetail.kd_obat 
        ORDER BY nm_obat ASC");
        return $query_pjlobat;
    }

    public function laporan_penjualan_user($no_pjl) {
        $query_pjl = $this->db->query("SELECT tbl_penjualan.tgl_penjualan, tbl_penjualan.total_penjualan, tbl_penjualan.tunai, tbl_penjualan.kembali, user.nama_peg 
        FROM tbl_penjualan 
        INNER JOIN user 
        ON tbl_penjualan.user_id = user.user_id 
        WHERE tbl_penjualan.no_penjualan = '$no_pjl'");
        return $query_pjl;
    }

    public function laporan_penjualan($no_pjl) {
				$query_dpjl = $this->db->query("SELECT dataobat.nm_obat, tbl_penjualandetail.jml_jual, tbl_penjualandetail.sat_jual, tbl_penjualandetail.hrg_jual, tbl_penjualandetail.subtotal FROM tbl_penjualandetail 
                INNER JOIN dataobat 
                ON tbl_penjualandetail.kd_obat = dataobat.kd_obat 
                WHERE tbl_penjualandetail.no_penjualan = '$no_pjl'");
                return $query_dpjl;
    }

}
/* End of file Obat_m.php */
/* Location: ./application/Models/Obat_m.php*/
