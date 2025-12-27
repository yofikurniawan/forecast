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
	<style>
		/* Reset & Base */
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		
		body {
			font-family: Arial, sans-serif;
			font-size: 12px;
			line-height: 1.4;
			color: #333;
			padding: 20px;
		}
		
		/* Utilities */
		.text-center {
			text-align: center;
		}
		
		.float-right {
			float: right;
		}
		
		.clearfix::after {
			content: "";
			display: table;
			clear: both;
		}
		
		.lh-150 {
			line-height: 1.5;
		}
		
		.lh-200 {
			line-height: 2.0;
		}
		
		.mt-5 {
			margin-top: 50px;
		}
		
		.align-top {
			vertical-align: top;
		}
		
		/* Header Section - removed float-based layout */
		
		/* Title */
		h3 {
			margin: 30px 0 20px 0;
			font-size: 14px;
			font-weight: bold;
		}
		
		/* Info Table */
		.info-table {
			width: 100%;
			margin-bottom: 15px;
			border-collapse: collapse;
		}
		
		.info-table td {
			padding: 3px 0;
			vertical-align: top;
		}
		
		.info-table td:first-child {
			width: 20%;
		}
		
		/* Separator */
		.separator {
			border-top: 2px solid #333;
			margin: 15px 0;
		}
		
		/* Sales Header Table */
		.tabel-nopenjualan {
			width: 100%;
			border: 1px solid #333;
			border-collapse: collapse;
			margin: 12px 0 8px 0;
			background-color: #f5f5f5;
		}
		
		.tabel-nopenjualan th,
		.tabel-nopenjualan td {
			padding: 5px 10px;
			border: 1px solid #333;
			text-align: left;
		}
		
		.tabel-nopenjualan th:first-child {
			text-align: center;
			vertical-align: middle;
		}
		
		/* Detail Table */
		.table-bordered {
			width: 100%;
			border: 1px solid #333;
			border-collapse: collapse;
			margin-bottom: 20px;
		}
		
		.table-bordered th,
		.table-bordered td {
			border: 1px solid #333;
			padding: 6px 8px;
			text-align: left;
		}
		
		.table-bordered th {
			background-color: #d1d1d1;
			font-weight: bold;
		}
		
		/* Column Widths */
		.kol-nmobat {
			width: 40%;
		}
		
		.kol-hrgjual {
			width: 15%;
			text-align: right;
		}
		
		.kol-jmljual {
			width: 10%;
			text-align: center;
		}
		
		.kol-satjual {
			width: 10%;
			text-align: center;
		}
		
		.kol-subt {
			width: 25%;
			text-align: right;
		}
		
		.total-pjl {
			background-color: #f0f0f0;
			font-weight: bold;
			text-align: right;
		}
		
		/* Grand Total */
		.grand-total {
			margin-top: 30px;
			background-color: #dbdbdb;
			padding: 8px 10px;
			font-weight: bold;
			font-size: 16px;
			text-align: right;
			font-style: italic;
			border: 1px solid #999;
		}
		
		/* Footer/Signature */
		.footer-table {
			width: 100%;
			margin-top: 30px;
		}
		
		.footer-table td {
			padding: 5px 0;
		}
		
		.signature {
			float: right;
			text-align: center;
			margin-top: 20px;
		}
		
		.signature p {
			margin-top: 60px;
			border-top: 1px solid #333;
			padding-top: 5px;
			display: inline-block;
			min-width: 200px;
		}
		
		/* Empty State */
		.empty-state {
			text-align: center;
			padding: 40px 0;
			color: #666;
		}
		
		/* Print Optimization */
		@media print {
			body {
				padding: 0;
			}
			
			.pagebreak {
				page-break-after: always;
			}
		}
	</style>
</head>
<body>
	<!-- Header Section with Two Columns -->
	<table style="width: 100%; margin-bottom: 30px;">
		<tr>
			<td style="width: 50%; vertical-align: top;">
				<!-- Kosong untuk space -->
			</td>
			<td style="width: 50%; vertical-align: top; text-align: left; font-size: 11px;">
				<table style="width: 100%;">
					<tr>
						<td style="vertical-align: top; white-space: nowrap; padding-right: 5px;">
							Lampiran Penjualan Detail :
						</td>
						<td style="vertical-align: top;">
							Dinas Penanaman Modal Dan<br>
							Perizinan Terpadu Satu Pintu<br>
							Nomor : 19950101/SIPA.16.10/2019/2006<br>
							Pada Tanggal : 28 Mei 2019
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<!-- Judul --> 
	<h3 class="text-center lh-200">
		SURAT LAPORAN PENJUALAN DETAIL<br>
		APOTEK DINAR MAS INDRALAYA
	</h3>

	<br>
	<br>
	<br>
	<br>

	<!-- Info Table --> 
	<table class="info-table">
		<tr>
			<td>Periode</td>
			<td>: <b><?php echo $ket_periode; ?></b></td>
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
			<td>: <?php echo $oke; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: Jl. Tasik, LK II RT.05 N0.19, KeL. Indralaya Mulya, Kec. Indralaya, Kab. Ogan Ilir Indralaya 30862</td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>: 0877-9641-8116</td>
		</tr>
	</table>

	<div class="separator"></div>

	<?php if($status == "kosong") { ?>
		<div class="empty-state">
			<h6>Tidak terdapat data penjualan dengan kriteria tersebut</h6>
		</div>
	<?php } else { ?>

		<?php 
			$total_semua = 0;
			$id_pjl = 1;
			foreach($rows->result_array() as $data_pjl ):
				$no_penjualan = $data_pjl['no_penjualan'];
		?>
		
		<!-- Sales Header -->
		<table class="tabel-nopenjualan">
			<tr>
				<th rowspan="2" style="width: 40px;">
					<?php echo $id_pjl++; ?>
				</th>
				<th style="width: 150px;">Nomor Penjualan</th>
				<td>: <?php echo $no_penjualan; ?></td>
				<th style="width: 100px; padding-left: 30px;">Tanggal</th>
				<td>: <?php echo tgl_indo($data_pjl['tgl_penjualan']); ?></td>
			</tr>
			<tr>
				<th>Pegawai</th>
				<td colspan="3">: <?php echo $data_pjl['nama_peg']; ?></td>
			</tr>
		</table>

		<!-- Detail Table -->
		<table class="table-bordered">
			<thead>
				<tr>
					<th class="kol-nmobat">Nama Obat</th>
					<th class="kol-hrgjual">Harga</th>
					<th class="kol-jmljual">Jumlah</th>
					<th class="kol-satjual">Satuan</th>
					<th class="kol-subt">Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query_obat = $this->db->query("SELECT * FROM tbl_penjualandetail INNER JOIN dataobat ON tbl_penjualandetail.kd_obat = dataobat.kd_obat WHERE tbl_penjualandetail.no_penjualan = '$no_penjualan'");
					foreach($query_obat->result_array() as $data_obat) {
				?>
				<tr>
					<td class="kol-nmobat"><?php echo $data_obat['nm_obat']; ?></td>
					<td class="kol-hrgjual">Rp<?php echo number_format($data_obat['hrg_jual'], 0, ',', '.'); ?></td>
					<td class="kol-jmljual"><?php echo $data_obat['jml_jual']; ?></td>
					<td class="kol-satjual"><?php echo $data_obat['sat_jual']; ?></td>
					<td class="kol-subt">Rp<?php echo number_format($data_obat['subtotal'], 0, ',', '.'); ?></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="4" style="border-right: none;"></td>
					<td class="total-pjl">Rp<?php echo number_format($data_pjl['total_penjualan'], 0, ',', '.'); ?></td>
				</tr>
			</tbody>
		</table>

		<?php
			$total_semua = $data_pjl['total_penjualan'] + $total_semua; 
			endforeach; 
		?>

		<!-- Grand Total -->
		<div class="grand-total">
			Total : Rp<?php echo number_format($total_semua, 0, ',', '.'); ?>
		</div>

		<!-- Footer/Signature -->
		<table class="footer-table">
			<tr>
				<td>
					Demikian laporan Detail ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
				</td>    
			</tr>
			<tr>
				<td>
					<div class="signature">
						<?php $oke = date('Y-m-d'); ?>
						Indralaya, <?php echo date_indo($oke); ?><br>
						Pemilik Apotek Dinar Mas
						<p>
							Wiranti Anggraini, S.Farm., Apt
						</p>
					</div>
				</td>
			</tr>
		</table>

	<?php } ?>

</body>
</html>