<?php 
	$ket_periode = "";
	$periode_lap = $this->input->post('periode_lap');
	$no_supp = $this->input->post('nm_supplier');
	$data_nmsupp = $this->db->query("SELECT name,supplier_id FROM supplier WHERE supplier_id = '$no_supp'")->row_array();
	$ket_supp = $data_nmsupp['name'];
	$status_byr = $this->input->post('status_pbl');
	if($no_supp == "semua") {
		$no_supp = "%";
		$ket_supp = "Semua";
	} 
	if($status_byr == "semua") {
		$status_byr = "%";
		$ket_status = "Semua";
	} else {
		$ket_status = $status_byr;
	}

	if($periode_lap == "hari_ini") {
		$ket_periode = date('d M Y');
		$query = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE tbl_pembelian.tgl_pembelian = CURDATE() AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr  LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
	} else if($periode_lap == "bulan_ini") {
		$ket_periode = date('F Y');
		$query = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE (MONTH(tbl_pembelian.tgl_pembelian) = MONTH(CURDATE()) AND YEAR(tbl_pembelian.tgl_pembelian) = YEAR(CURDATE())) AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr  LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
	} else if($periode_lap == "tahun_ini") {
		$ket_periode = "tahun ".date('Y');
		$query = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE YEAR(tbl_pembelian.tgl_pembelian) = YEAR(CURDATE()) AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr  LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
	} else if($periode_lap == "pertanggal") {
		$cek_tgl = $this->input->post('tgl_akhir');
		$tgl_awal = $this->input->post('per_tanggal1');
		if($cek_tgl == "yes") {
			$tgl_akhir = $this->input->post('per_tanggal2');
			$ket_periode = tgl_indo($tgl_awal)." sd ".tgl_indo($tgl_akhir);
			$query = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE (tbl_pembelian.tgl_pembelian BETWEEN '$tgl_awal' AND '$tgl_akhir') AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
		} else {
			$ket_periode = tgl_indo($tgl_awal);
			$query = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE tbl_pembelian.tgl_pembelian = '$tgl_awal' AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
		}
	} else if($periode_lap == "perbulan") {
		$cek_bln = $this->input->post('bulan_akhir');
		$bulan1 = $this->input->post('per_bulan1');
		$tahunbulan1 = $this->input->post('tahun_perbulan1');
		if($cek_bln == "yes") {
			$bulan2 = $this->input->post('per_bulan2');
			$tahunbulan2 = $this->input->post('tahun_perbulan2');
			$tgl_awal = $tahunbulan1."-".$bulan1."-01";
			$tgl_akhir = $tahunbulan2."-".$bulan2."-31";
			$ket_periode = bulan_indo($bulan1)." ".$tahunbulan1." sd ".bulan_indo($bulan2)." ".$tahunbulan2;
			$query = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE (tbl_pembelian.tgl_pembelian BETWEEN '$tgl_awal' AND '$tgl_akhir') AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
		} else {
			$ket_periode = bulan_indo($bulan1)." ".$tahunbulan1;
			$query = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE (MONTH(tbl_pembelian.tgl_pembelian) = '$bulan1' AND YEAR(tbl_pembelian.tgl_pembelian) = '$tahunbulan1') AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr  LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
		}
	} else if($periode_lap == "pertahun") {
		$cek_thn = $this->input->post('tahun_akhir');
		$per_tahun1 = $this->input->post('per_tahun1');
		if($cek_thn == "yes") {
			$per_tahun2 = $this->input->post('per_tahun2');
			$ket_periode = "tahun ".$per_tahun1." sd ".$per_tahun2;
			$query = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE (YEAR(tbl_pembelian.tgl_pembelian) BETWEEN '$per_tahun1' AND '$per_tahun2') AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
		} else {
			$ket_periode = "tahun ".$per_tahun1;
			$query = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE YEAR(tbl_pembelian.tgl_pembelian) = '$per_tahun1' AND supplier.supplier_id LIKE '$no_supp' AND tbl_pembelian.status_byr LIKE '$status_byr' ORDER BY tbl_pembelian.tgl_pembelian ASC");
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
	<title>Document</title>
	<style>
		.tabel-judul {
			width: 100%;
		}

		.tabel-judul td {
			width: 50%;
		}

		.tabel-judul .kolom-nama-apotek {
			text-align: right;
			padding-top: 5px;
		}

		.kolom-nama-apotek .nama-apotek {
			font-weight: bold;
		}

		.tabel-keterangan-laporan {
			width: 100%;
			font-weight: bold;
		}

		.tabel-keterangan-laporan .nama-laporan {
			font-size: 15px;
		}

		.tabel-keterangan-laporan .keterangan {
			width: 20%;
		}

		.tabel-keterangan-laporan .isi-keterangan {
			width: 80%;
		}

		.kotak-data-penjualan {
			margin-top: 20px;
			height: 90%;
		}

		.data-kosong {
			border: 1px solid;
			height: 90%;
			font-size: 22px;
			text-align: center;
			vertical-align: middle;
		}

		.data-penjualan-detail {
			width: 100%;
			max-width: 100%;
			min-width: 100%;
		}

		.tabel-daftar-obat,
		.tabel-data-penjualan-rangkuman {
			width: 100%;
			max-width: 100%;
		}

		.tabel-nopenjualan td,
		.tabel-nopenjualan th {
			padding: 3px;
		}

		.tabel-daftar-obat td,
		.tabel-daftar-obat th {
			padding: 3px;
		}

		.tabel-data-penjualan-rangkuman td,
		.tabel-data-penjualan-rangkuman th {
			padding: 7px 3px;
		}

		.tabel-daftar-obat th,
		.tabel-pembelian-rangkuman th {
			text-align: center;
			background-color: #d1d1d1;
		}

		.tabel-daftar-obat .kol-nmobat {
			width: 40%;
			max-width: 40%;
		}

		.tabel-daftar-obat .kol-hrgjual {
			width: 20%;
			max-width: 20%;
		}

		.tabel-daftar-obat .kol-jmljual {
			width: 10%;
			max-width: 10%;
		}

		.tabel-daftar-obat .kol-satjual {
			width: 10%;
			max-width: 10%;
		}

		.tabel-daftar-obat .kol-subt {
			width: 20%;
			max-width: 20%;
		}

		.tabel-daftar-obat .kol-jmljual,
		.tabel-daftar-obat .kol-satjual {
			text-align: center;
		}

		.tabel-daftar-obat td.kol-hrgjual,
		.tabel-daftar-obat td.kol-subt {
			text-align: right;
		}

		.tabel-daftar-obat .total-pjl,
		.tabel-data-penjualan-rangkuman .total-pjl {
			text-align: right;
			font-style: italic;
			font-weight: bold;
		}

		.tabel-pembelian-rangkuman {
			width: 100%;
			min-width: 100%;
			max-width: 100%;
		}

		.tabel-pembelian-rangkuman th,
		.tabel-pembelian-rangkuman td {
			padding: 7px;
		}

		.tabel-pembelian-rangkuman .kol-no {
			width: 7%;
		}

		.tabel-pembelian-rangkuman .kol-fak {
			width: 13%;
		}

		.tabel-pembelian-rangkuman .kol-tgl {
			width: 13%;
		}

		.tabel-pembelian-rangkuman .kol-sup {
			width: 30%;
		}

		.tabel-pembelian-rangkuman .kol-sta {
			width: 15%;
		}

		.tabel-pembelian-rangkuman .kol-tot {
			width: 22%;
		}

		.tabel-pembelian-rangkuman .kol-tot-pembelian {
			font-style: italic;
			font-weight: bold;
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>
	<page backtop="8mm" backbottom="8mm" backleft="0mm" backright="3mm" style="font-size: 12px;">
		<page_header class="page_header"
			style="text-align: right; font-size: 10px; color: #575757; font-style: italic;">
			Arsip Apotek Dinar Mas - laporan penjualan
		</page_header>
		<div class="page-content page-laporan-penjualan-detail">
			<div class="kotak-judul">
				<table class="tabel-judul">
					<tr>
						<td>
							<table class="tabel-keterangan-laporan">
								<tr>
									<td colspan="2" class="nama-laporan">LAPORAN PEMBELIAN</td>
								</tr>
								<tr>
									<td class="keterangan">Periode</td>
									<td class="isi-keterangan">: <?php echo $ket_periode; ?></td>
								</tr>
								<tr>
									<td class="keterangan">Supplier</td>
									<td class="isi-keterangan">: <?php echo $ket_supp; ?></td>
								</tr>
								<tr>
									<td class="keterangan">Status</td>
									<td class="isi-keterangan">: <?php echo $ket_status; ?></td>
								</tr>
							</table>
						</td>
						<td class="kolom-nama-apotek">
							<span class="nama-apotek">APOTEK DINAR MAS</span><br>
							Jl. Tasik, LK II RT.05 N0.19, KeL. Indralaya Mulya, Kec. Indralaya, Kab. Ogan Ilir
							Indralaya 30862 <br>
							(Telp) 0877-9641-8116
						</td>
					</tr>
				</table>
			</div>
		</div>
		<?php 
		if($status == "kosong") {
	?>
		<div class="data-kosong">
			Tidak terdapat data pembelian dengan kriteria tersebut
		</div>
		<?php } else {?>
		<div style="margin-top: 15px; width: 100%; border-bottom: 1px solid; "></div>
		<?php 
			$total_semua = 0;
			$id_pjl = 1;
			foreach($rows->result_array() as $data_pbl ) {
				$no_faktur = $data_pbl['no_faktur'];
	?>
		<div style="margin-bottom: 10px;">
			<table class="tabel-nopenjualan">
				<tr>
					<th rowspan="2" style="vertical-align: middle; text-align: center; padding: 0 15px;">
						<?php echo $id_pjl++; ?></th>
					<th>Nomor Faktur</th>
					<td>: <?php echo $no_faktur; ?></td>
					<th style="padding-left: 30px;">Tanggal</th>
					<td>: <?php echo tgl_indo($data_pbl['tgl_pembelian']); ?></td>
				</tr>
				<tr>
					<th>Supplier</th>
					<td>: <?php echo $data_pbl['name']; ?></td>
					<th style="padding-left: 30px;">Status</th>
					<td>: <?php echo $data_pbl['status_byr']; ?></td>
				</tr>
			</table>
		</div>
		<div style="width: 100%; max-width: 100%; margin-bottom: 20px;">
			<table class="tabel-daftar-obat" border="1" style="border-collapse: collapse;">
				<tr>
					<th class="kol-nmobat">Nama Obat</th>
					<th class="kol-hrgjual">Harga</th>
					<th class="kol-jmljual">Jumlah</th>
					<th class="kol-satjual">Satuan</th>
					<th class="kol-subt">Subtotal</th>
				</tr>
				<?php 
					$query_obat = $this->db->query("SELECT * FROM tbl_pembeliandetail INNER JOIN dataobat ON tbl_pembeliandetail.kd_obat = dataobat.kd_obat WHERE tbl_pembeliandetail.no_faktur = '$no_faktur'");
					foreach($query_obat->result_array() as $data_obat):
				?>
				<tr>
					<td class="kol-nmobat"><?php echo $data_obat['nm_obat']; ?></td>
					<td class="kol-hrgjual">Rp<?php echo number_format($data_obat['hrg_beli'], 0,",", "."); ?></td>
					<td class="kol-jmljual"><?php echo $data_obat['jml_beli']; ?></td>
					<td class="kol-satjual"><?php echo $data_obat['sat_beli']; ?></td>
					<td class="kol-subt">Rp<?php echo number_format($data_obat['subtotal'], 0,",", "."); ?></td>
				</tr>
				<?php endforeach ?>
				<tr>
					<td colspan="4"></td>
					<td class="total-pjl">Rp<?php echo number_format($data_pbl['total_pembelian'], 0,",", "."); ?></td>
				</tr>
			</table>
		</div>
		<?php
			$total_semua = $data_pbl['total_pembelian'] + $total_semua; 
			} 
		?>
		<div
			style="margin-top: 10px; background-color: #dbdbdb; padding: 5px 2px; font-weight: bold; font-size: 16px; text-align: right; font-style: italic;">
			Total : Rp<?php echo number_format($total_semua); ?>
		</div>
		<?php } ?>
	</page>
</body>
</html>
