<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peramalan_m extends CI_Model {
	// Ambil Data User
    public function get_obat($kd_obat = null) {
		$this->db->from('dataobat');
		if($kd_obat != null) {
			$this->db->where('kd_obat', $kd_obat);
		}
		$this->db->order_by('nm_obat','ASC');
		return $query = $this->db->get();
	}

     public function get_ramal($id_ramal = null) {
        $this->db->select('peramalan.*, user.*');
        $this->db->from('peramalan');
        $this->db->join('user', 'user.user_id = peramalan.user_id');
        $this->db->order_by('id_peramalan','DESC');
        return $query = $this->db->get();
    }

    //Delete Data Supplier
    public function del($id) {
        $this->db->where('id_peramalan',$id);
        $this->db->delete('peramalan');
    }

    //quqery Peramalan Perulangan
    public function data_peramalan($kd_obat)
    {
        $query = $this->db->query(" SELECT IFNULL(SUM(pd.jml_jual), 0) AS total, pd.jml_jual AS jumlah, CONCAT(MONTH(pd.bulantahun_pembelian),'/',YEAR(pd.bulantahun_pembelian)) as bulan_tahun, COUNT(pd.kd_obat) AS ya FROM tbl_penjualandetail pd LEFT JOIN dataobat dob ON pd.kd_obat=dob.kd_obat WHERE pd.kd_obat='$kd_obat' GROUP BY DATE_FORMAT(bulantahun_pembelian,'%Y-%m') ORDER BY (bulantahun_pembelian) ASC LIMIT 24");
        return $query;
    }

    public function peramalan_selanjutnya($kd_obat)
    {
        $query = $this->db->query(" SELECT IFNULL(SUM(pd.jml_jual), 0) AS total, pd.jml_jual AS jumlah, CONCAT(MONTH(pd.bulantahun_pembelian),'/',YEAR(pd.bulantahun_pembelian)) as bulan_tahun, COUNT(pd.kd_obat) AS ya FROM tbl_penjualandetail pd LEFT JOIN dataobat dob ON pd.kd_obat=dob.kd_obat WHERE pd.kd_obat='$kd_obat' GROUP BY DATE_FORMAT(bulantahun_pembelian,'%Y-%m') ORDER BY (bulantahun_pembelian) ASC LIMIT 24,28");
        return $query;
    }

    //Query Bulan April 2021
    public function querysimpan($kd_obat,$tgl) {
        $test = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'Mei') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2021) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '$tgl .-01.' AND '$tgl .-31.') ");
        return $test;
    }

    // QUERY PERAMALAN 
  	//Query Bulan MEI 2019 
	public function querymei2019($kd_obat) {
	    $querymei2019 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'Mei') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2019) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
	        FROM tbl_penjualandetail 
	        INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
	        WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
	        BETWEEN '2019-05-01' AND '2019-05-31') ");
        return $querymei2019;
    }

    //Query Bulan Juni 2019 
    public function queryjuni2019($kd_obat) {
    	$queryjuni2019 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'June') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2019) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2019-06-01' AND '2019-06-30') ");
    	 return $queryjuni2019;
    }

    //Query Bulan Juli 2019 
    public function queryjuli2019($kd_obat) {
        $queryjuli2019 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'July') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2019) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2019-07-01' AND '2019-07-31') ");
        return $queryjuli2019;
    }
        
    //Query Bulan August 2019 
    public function queryaugust2019($kd_obat) {
        $queryaugust2019 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'August') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2019) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2019-08-01' AND '2019-08-31') ");
        return $queryaugust2019;
    }

    //Query Bulan September 2019
    public function queryseptember2019($kd_obat) {
    	$queryseptember2019 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'September') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2019) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2019-09-01' AND '2019-09-30') ");
    	return $queryseptember2019;
    }

    //Query Bulan october 2019
    public function queryoctober2019($kd_obat) {
    	$queryoctober2019 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'October') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2019) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2019-10-01' AND '2019-10-31') ");
    	return $queryoctober2019;
    }

    //Query Bulan november 2019
    public function querynovember2019($kd_obat) {
    	$querynovember2019 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'November') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2019) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2019-11-01' AND '2019-11-30') ");
    	return $querynovember2019;
    }

    //Query Bulan desember 2019
    public function querydesember2019($kd_obat) {
    	$querydesember2019 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'December') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2019) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2019-12-01' AND '2019-12-31') ");
    	return $querydesember2019;
    }

    													#### PENJUALAN TAHUN 2020 ##
    													#### PENJUALAN TAHUN 2020 ##
   	 													#### PENJUALAN TAHUN 2020 ##

    //Query Bulan januari 2020
    public function queryjanuari2020($kd_obat) {
    	$queryjanuari2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'January') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-01-01' AND '2020-01-31') ");
    	return $queryjanuari2020;
    }

    //Query Bulan februari 2020
    public function queryfebruari2020($kd_obat) {
    	$queryfebruari2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'February') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-02-01' AND '2020-02-29') ");
    	return $queryfebruari2020;
    }

    //Query Bulan Maret 2020
    public function querymaret2020($kd_obat) {
    	$querymaret2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'March') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-03-01' AND '2020-03-31') ");
    	return $querymaret2020;
    }

    //Query Bulan April 2020
    public function queryapril2020($kd_obat) {
    	$queryapril2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'April') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-04-01' AND '2020-04-30') ");
    	return $queryapril2020;
    }

    //Query Bulan mei 2020
    public function querymei2020($kd_obat) {
    	$querymei2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'May') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-05-01' AND '2020-05-31') ");
    	return $querymei2020;
    }

    //Query Bulan juni 2020
    public function queryjuni2020($kd_obat) {
    	$queryjuni2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'June') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-06-01' AND '2020-06-30') ");
    	return $queryjuni2020;
    }

    //Query Bulan juli 2020
    public function queryjuli2020($kd_obat) {
    	$queryjuli2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'July') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-07-01' AND '2020-07-31') ");
    	return $queryjuli2020;
    }

    //Query Bulan agustust 2020
    public function queryagustust2020($kd_obat) {
    	$queryagustust2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'August') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-08-01' AND '2020-08-31') ");
    	return $queryagustust2020;
    }

    //Query Bulan september 2020
    public function queryseptember2020($kd_obat) {
    	$queryseptember2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'September') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-09-01' AND '2020-09-30') ");
    	return $queryseptember2020;
    }

    //Query Bulan oktober 2020
    public function queryoktober2020($kd_obat) {
    	$queryoktober2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'October') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-10-01' AND '2020-10-30') ");
    	return $queryoktober2020;
    }

    //Query Bulan november 2020
    public function querynovember2020($kd_obat) {
    	$querynovember2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'November') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-11-01' AND '2020-11-31') ");
    	return $querynovember2020;
    }

    //Query Bulan desember 2020
    public function querydesember2020($kd_obat) {
    	$querydesember2020 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'December') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2020) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2020-12-01' AND '2020-12-31') ");
    	return $querydesember2020;
    }

    										#### TAHUN DATA PENJUALAN 2021 ###

    //Query Bulan januari 2021
    public function queryjanuari2021($kd_obat) {
    	$queryjanuari2021 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'January') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2021) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2021-01-01' AND '2021-01-31') ");
    	return $queryjanuari2021;
    }

    //Query Bulan februari 2021
    public function queryfebruari2021($kd_obat) {
    	$queryfebruari2021 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'February') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2021) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2021-02-01' AND '2021-02-29') ");
    	return $queryfebruari2021;
    }

    //Query Bulan Maret 2021
    public function querymaret2021($kd_obat) {
    	$querymaret2021 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'March') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2021) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2021-03-01' AND '2021-03-31') ");
    	return $querymaret2021;
    }

    //Query Bulan April 2021
    public function queryapril2021($kd_obat) {
    	$queryapril2021 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'April') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2021) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2021-04-01' AND '2021-04-30') ");
    	return $queryapril2021;
    }

    //Query Bulan April 2021
    public function querymei2021($kd_obat) {
        $querymei2021 = $this->db->query("SELECT IFNULL(SUM(tbl_penjualandetail.jml_jual), 0) AS total, tbl_penjualandetail.jml_jual AS jumlah, IFNULL(MONTHNAME(tbl_penjualandetail.bulantahun_pembelian), 'Mei') AS tgl_penjualan, IFNULL(YEAR(tbl_penjualandetail.bulantahun_pembelian), 2021) AS tahun, COUNT(tbl_penjualandetail.kd_obat) AS ya , tbl_penjualandetail.no_penjualan, tbl_penjualandetail.kd_obat, dataobat.* 
            FROM tbl_penjualandetail 
            INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat
            WHERE tbl_penjualandetail.kd_obat = '$kd_obat' AND (tbl_penjualandetail.bulantahun_pembelian 
            BETWEEN '2021-05-01' AND '2021-05-31') ");
        return $querymei2021;
    }

    
}    
