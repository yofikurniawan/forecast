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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Penjualan Detail</title>
	<link rel="stylesheet" href="assets/laporan/custom_laporan.css">
<body>    
	</head>
	 <!-- Text Lampiran -->
    <div class="col-6 float-right lh-150">
        <table>
			<tr>
				<td class="align-top lh-150" valign="top">
					Lampiran Penjualan Detail :
				</td>
				<td class="lh-150">
					Dinas Penanaman Modal Dan
					<br>Perizinan Terpadu Satu Pintu
					<br>Nomor : 19950101/SIPA.16.10/2019/2006
					<br>Pada Tanggal : 28 Mei 2019
				</td>
			</tr>
		</table>
    </div>

     <div class="clearfix"></div>
    <!-- /Text Lampiran -->

    <!-- Judul --> 
    <h3 class="text-center lh-200">
        SURAT LAPORAN PENJUALAN DETAIL
        <br>APOTEK DINAR MAS INDRALAYA
    </h3>

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
				}else if ($ket_pegawai == 3){
				$oke = 'Wahyu';
				}else{
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
    <!-- akhir tabel -->
    <div class="separator"></div>
</div>
		<?php 
			if($status == "kosong") {
	 	?>
	 		<div class="text-center">
	 	    	<h6> Tidak terdapat data penjualan dengan kriteria tersebut </h6>
	 		</div>
		<?php } else {?>

		<?php 
 			$total_semua = 0;
			$id_pjl = 1;
			foreach($rows->result_array() as $data_pjl ):
				$no_penjualan = $data_pjl['no_penjualan'];
		 ?>
		<div style="margin: 12px 0 8px 0;">
			<table class="tabel-nopenjualan">
				<tr>
					<th rowspan="2" style="vertical-align: middle; text-align: center; padding: 0 15px;">
						<?php echo $id_pjl++; ?></th>
					<th>Nomor Penjualan</th>
					<td>: <?php echo $no_penjualan; ?></td>
					<th style="padding-left: 30px;">Tanggal</th>
					<td>: <?php echo tgl_indo($data_pjl['tgl_penjualan']); ?></td>
				</tr>
				<tr>
					<th>Pegawai</th>
					<td>: <?php echo $data_pjl['nama_peg']; ?></td>
				</tr>
			</table>
		</div>
		<table class="table table-bordered" width="100%" border="1" style="border-collapse: collapse;">
			<tr bgcolor="#d1d1d1">
				<th class="kol-nmobat">Nama Obat</th>
				<th class="kol-hrgjual">Harga</th>
				<th class="kol-jmljual">Jumlah</th>
				<th class="kol-satjual">Satuan</th>
				<th class="kol-subt">Subtotal</th>
			</tr>
			<?php 
				$query_obat = $this->db->query("SELECT * FROM tbl_penjualandetail INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat WHERE tbl_penjualandetail.no_penjualan = '$no_penjualan'");
				foreach($query_obat->result_array() as $data_obat) {
			 ?>
			<tr>
				<td class="kol-nmobat"><?php echo $data_obat['nm_obat']; ?></td>
				<td class="kol-hrgjual"><?php echo $data_obat['hrg_jual']; ?></td>
				<td class="kol-jmljual"><?php echo $data_obat['jml_jual']; ?></td>
				<td class="kol-satjual"><?php echo $data_obat['sat_jual']; ?></td>
				<td class="kol-subt">Rp<?php echo number_format($data_obat['subtotal']); ?></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="4"></td>
				<td class="total-pjl">Rp<?php echo number_format($data_pjl['total_penjualan']); ?></td>
			</tr>
		</table>
		<?php
				$total_semua = $data_pjl['total_penjualan'] + $total_semua; 
			endforeach; 
		?>
		<div
			style="margin-top: 30px; background-color: #dbdbdb; padding: 5px 2px; font-weight: bold; font-size: 16px; text-align: right; font-style: italic;">
			Total : Rp<?php echo number_format($total_semua); ?>
		</div>
	<table width="100%" class="mt-5">
        <tr>
            <td>
                Demikian laporan Detail ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
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
    <!-- /tabel TTD -->
		<?php } ?>
		<!-- </div> -->
	</page>
</body>

</html>
