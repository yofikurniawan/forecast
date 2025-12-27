<?php 
	$ket_periode = "";
		$periode_lap = $this->input->post('periode_lap');
		$pegawai = $this->input->post('nm_peg');
		if($pegawai == "semua") {
			$pegawai = "%";
			$ket_pegawai = "Semua";
		} else {
			$ket_pegawai = $pegawai;
		}
		if($periode_lap == "hari_ini") {
			$ket_periode = date('d M Y');
			$query = $this->db->query("SELECT * FROM tbl_penjualan INNER JOIN user ON tbl_penjualan.user_id = user.user_id WHERE tbl_penjualan.tgl_penjualan = CURDATE() AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
		} else if($periode_lap == "bulan_ini") {
			$ket_periode = date('F Y');
			$query = $this->db->query("SELECT * FROM tbl_penjualan INNER JOIN user ON tbl_penjualan.user_id = user.user_id WHERE (MONTH(tbl_penjualan.tgl_penjualan) = MONTH(CURDATE()) AND YEAR(tbl_penjualan.tgl_penjualan) = YEAR(CURDATE())) AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
		} else if($periode_lap == "tahun_ini") {
			$ket_periode = "Tahun ".date('Y');
			$query = $this->db->query("SELECT * FROM tbl_penjualan INNER JOIN user ON tbl_penjualan.user_id = user.user_id WHERE YEAR(tbl_penjualan.tgl_penjualan) = YEAR(CURDATE()) AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
		} else if($periode_lap == "pertanggal") {
			$cek_tgl =$this->input->post('tgl_akhir');
			$tgl_awal =$this->input->post('per_tanggal1');
			if($cek_tgl == "yes") {
				$tgl_akhir =$this->input->post('per_tanggal2');
				$ket_periode = tgl_indo($tgl_awal)." sd ".tgl_indo($tgl_akhir);
				$query = $this->db->query("SELECT * FROM tbl_penjualan INNER JOIN user ON tbl_penjualan.user_id = user.user_id WHERE (tbl_penjualan.tgl_penjualan BETWEEN '$tgl_awal' AND '$tgl_akhir') AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
			} else {
				$ket_periode = tgl_indo($tgl_awal);
				$query = $this->db->query("SELECT * FROM tbl_penjualan INNER JOIN user ON tbl_penjualan.user_id = user.user_id WHERE tbl_penjualan.tgl_penjualan = '$tgl_awal' AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
			}
		} else if($periode_lap == "perbulan") {
			$cek_bln =$this->input->post('bulan_akhir');
			$bulan1 =$this->input->post('per_bulan1');
			$tahunbulan1 =$this->input->post('tahun_perbulan1');
			if($cek_bln == "yes") {
				$bulan2 =$this->input->post('per_bulan2');
				$tahunbulan2 =$this->input->post('tahun_perbulan2');
				$ket_periode = bulan_indo($bulan1)." ".$tahunbulan1." sd ".bulan_indo($bulan2)." ".$tahunbulan2;
				$query = $this->db->query("SELECT * FROM tbl_penjualan INNER JOIN user ON tbl_penjualan.user_id = user.user_id WHERE ((MONTH(tbl_penjualan.tgl_penjualan) BETWEEN '$bulan1' AND '$bulan2') AND (YEAR(tbl_penjualan.tgl_penjualan) BETWEEN '$tahunbulan1' AND '$tahunbulan2')) AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");	
			} else {
				$ket_periode = bulan_indo($bulan1)." ".$tahunbulan1;
				$query = $this->db->query("SELECT * FROM tbl_penjualan INNER JOIN user ON tbl_penjualan.user_id = user.user_id WHERE (MONTH(tbl_penjualan.tgl_penjualan) = '$bulan1' AND YEAR(tbl_penjualan.tgl_penjualan) = '$tahunbulan1') AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
			}
		} else if($periode_lap == "pertahun") {
			$cek_thn =$this->input->post('tahun_akhir');
			$per_tahun1 =$this->input->post('per_tahun1');
			if($cek_thn == "yes") {
				$per_tahun2 =$this->input->post('per_tahun2');
				$ket_periode = "tahun ".$per_tahun1." sd ".$per_tahun2;
				$query = $this->db->query("SELECT * FROM tbl_penjualan INNER JOIN user ON tbl_penjualan.user_id = user.user_id WHERE (YEAR(tbl_penjualan.tgl_penjualan) BETWEEN '$per_tahun1' AND '$per_tahun2') AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
			} else {
				$ket_periode = "tahun ".$per_tahun1;
				$query = $this->db->query("SELECT * FROM tbl_penjualan INNER JOIN user ON tbl_penjualan.user_id = user.user_id WHERE YEAR(tbl_penjualan.tgl_penjualan) = '$per_tahun1' AND user.user_id LIKE '$pegawai' ORDER BY tbl_penjualan.tgl_penjualan ASC");
			}
		}
			$rows = $query;
			if($rows->num_rows() >0) {
				$status = "ada";
	    } else {
		        $status = "kosong";
			}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Penjualan Rangkuman</title>
	<style>
		body { font-family: Arial; padding: 20px; }
		.float-right { float: right; }
		.clearfix { clear: both; }
		.text-center { text-align: center; }
		.text-right { text-align: right; }
		.lh-150 { line-height: 1.5; }
		.lh-200 { line-height: 2; }
		.mt-5 { margin-top: 50px; }
		h3 { background: linear-gradient(135deg, #2c5f8d, #3d7aaf); color: white; padding: 15px; border-radius: 5px; }
		table.penilaian { border-collapse: collapse; width: 100%; margin: 20px 0; }
		table.penilaian th { background: linear-gradient(135deg, #2c5f8d, #3d7aaf); color: white; padding: 10px; }
		table.penilaian td { padding: 8px; border: 1px solid #ddd; }
		table.penilaian tr:nth-child(even) { background: #f8f9fa; }
		.data-kosong { text-align: center; padding: 30px; background: #fff3cd; border: 2px dashed #ffc107; border-radius: 5px; color: #856404; margin: 20px 0; }
	</style>
</head>
<body>

	<!-- Text Lampiran -->
    <div style="float: right; width: 50%; font-size: 9pt; margin-bottom: 15px;">
        <table style="width: 100%;">
			<tr>
				<td style="vertical-align: top; width: 35%; font-weight: bold;">
					Lampiran Penjualan Rangkuman :
				</td>
				<td style="line-height: 1.4;">
					Dinas Penanaman Modal Dan
					<br>Perizinan Terpadu Satu Pintu
					<br>Nomor : 19950101/SIPA.16.10/2019/2006
					<br>Pada Tanggal : 28 Mei 2019
				</td>
			</tr>
		</table>
    </div>

    <div class="clearfix"></div>

    <!-- Judul --> 
    <h3 class="text-center lh-200">
        SURAT LAPORAN PENJUALAN RANGKUMAN
        <br>APOTEK DINAR MAS INDRALAYA
    </h3>

	<br>
	<br>
	<br>
	<br>
	
    <!-- Tabel --> 
    <table width="100%" border="0">
        <tr>
            <td width="20%">Periode</td>
            <td> : <b><?php echo $ket_periode; ?></b></td>
        </tr>
        <?php 
			if ($ket_pegawai == 1) {
				$oke = 'Wiranti Anggraini, S.Farm., Apt';
			} else if ($ket_pegawai == 2) {
				$oke = 'Tasya Aulia S.Farm';
			} else if ($ket_pegawai == 3){
				$oke = 'Wahyu';
			} else {
				$oke = 'Semua';  
			}
		?>
        <tr>
            <td>Pegawai</td>
            <td> : <?php echo $oke; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td> : Jl. Tasik, LK II RT.05 N0.19, KeL. Indralaya Mulya, Kec. Indralaya, Kab. Ogan Ilir Indralaya 30862</td>
        </tr>
        <tr>
            <td>Telepon </td>
            <td> : 0877-9641-8116</td>
        </tr>
    </table>

	<div class="separator"></div>
	
	<?php if($status == "kosong") { ?>
	 	<div class="data-kosong">
	 	    Tidak terdapat data penjualan dengan kriteria tersebut
	 	</div>
	<?php } else { ?>

	<!-- Tabel Unsur Yang Dinilai -->
    <table class="penilaian" width="100%" border="1" cellspacing='0'>
        <tr bgcolor="#d1d1d1">
            <th class="text-center">Nomor</th>
            <th class="text-center">Nomor Penjualan</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Pegawai</th>
            <th class="text-center">Total</th>
        </tr>
        <?php 
			$id_pjl = 1;
			$total = 0;
			foreach($rows->result_array() as $data_pjl ) {
				$total = $total + $data_pjl['total_penjualan'];
		?>
        <tr>
            <td class="text-center"><?php echo $id_pjl++; ?></td>
            <td class="text-center"><?php echo $data_pjl['no_penjualan']; ?></td>
            <td class="text-center"><?php echo date_indo($data_pjl['tgl_penjualan']); ?></td>
            <td class="text-center"><?php echo $data_pjl['nama_peg']; ?></td>
            <td class="text-right">Rp <?php echo number_format($data_pjl['total_penjualan']); ?></td>
        </tr>
        <?php } ?>
        <tr bgcolor="#d1d1d1">
			<td colspan="4" class="text-right"><b> TOTAL </b></td>
			<td class="text-right">Rp <?php echo number_format($total); ?></td>
		</tr>
    </table>
    <?php } ?>

    <table width="100%" class="mt-5">
        <tr>
            <td>
                Demikian laporan rangkuman ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
            </td>    
        </tr>

        <tr class="lh-150">
            <td>
                <div class="float-right">
                	<?php $oke = date(' Y-m-d') ?>
                    Indralaya, <?= date_indo($oke); ?>
                    <br>Pemilik Apotek Dinar Mas
                    <p class="mt-5">
                        Wiranti Anggraini, S.Farm., Apt
                    </p>
                </div>
            </td>
        </tr>
    </table>

</body>
</html>