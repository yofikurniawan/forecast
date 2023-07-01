<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.page_header {
			font-size: 8px;
			font-style: italic;
			text-align: right;
		}

		.page-content {
			font-size: 12px;
		}

		.judul {
			/*background-color: #d4d4d4;*/
			font-size: 16px;
			font-weight: bold;
			padding: 0 0 10px 4px;
		}

		.tabel-datautama {
			width: 100%;
			/*border: 1px solid black;*/
		}

		.tabel-datautama .data_nota td {
			padding: 3px 10px 3px 0px;
		}

		.tabel-datautama .kolom_utama {
			width: 50%;
		}

		.tabel-datautama .data_apotek {
			text-align: right;
			padding-top: 3px;
		}

		.data_apotek .nama_apotek {
			font-weight: bold;
			font-size: 13px;
		}

		.data-item {
			width: 100%;
			border: 1px solid black;
			border-collapse: collapse;
		}

		.data-item th {
			padding: 5px;
			text-align: center;
			background-color: #e8e8e8;
		}

		.data-item td {
			padding: 7px;
			text-align: center;
			font-size: 10px;
		}

		.catatan {
			margin: 3px 0;
			border-bottom: 1px dotted #525252;
			padding-bottom: 5px;
		}

		.tabel-catatan {
			width: 100%;
		}

		.tabel-catatan th,
		.tabel-catatan td {
			padding: 2px;
		}

		.paraf {
			margin-top: 5px;
		}

		.tabel-paraf {
			width: 100%;
		}

		.tabel-paraf td {
			width: 50%;
		}

		.tabel-paraf .kanan {
			text-align: right;
		}

		.tabel-paraf .isi-paraf {
			height: 55px;
		}

		/*Data Item Nota Pembelian*/
		.data-item-pembelian .col_no {
			width: 7%;
		}

		.data-item-pembelian .col_nmobat {
			width: 42%;
		}

		.data-item-pembelian .col_hrg {
			width: 14%;
		}

		.data-item-pembelian .col_jml {
			width: 10%;
		}

		.data-item-pembelian .col_sat {
			width: 13%;
		}

		.data-item-pembelian .col_subt {
			width: 14%;
		}

		.data-item-pembelian td.col_hrg,
		.data-item-pembelian td.col_subt,
		.data-item-pembelian td.col_tot {
			font-style: italic;
		}

	</style>
</head>

<body>
	<page backtop="15px">
		<page_header class="page_header">
			(Lampiran Apotek Dinar Mas)
		</page_header>
		<div class="page-content">
			<div class="judul">
				NOTA PEMBELIAN
			</div>
			<div style="margin-bottom: 10px;">
				<table class="tabel-datautama">
					<tr>
						<td class="kolom_utama">
							<?php 
							$data_pbl = $this->db->query("SELECT * FROM tbl_pembelian INNER JOIN user ON tbl_pembelian.user_id = user.user_id INNER JOIN supplier ON tbl_pembelian.supplier_id = supplier.supplier_id WHERE tbl_pembelian.no_faktur = '$no_faktur'")->row_array();
						 ?>
							<table class="data_nota">
								<tr>
									<td>No Faktur</td>
									<td>: <?php echo $no_faktur; ?></td>
								</tr>
								<tr>
									<td>Tanggal</td>
									<td>: <?php echo tgl_indo($data_pbl['tgl_pembelian']); ?></td>
								</tr>
								<tr>
									<td>Supplier</td>
									<td>: <?php echo $data_pbl['name']; ?></td>
								</tr>
							</table>
						</td>
						<td class="kolom_utama data_apotek">
							<span class="nama_apotek">APOTEK DINAR MAS</span><br>
							Jl. Tasik, LK II RT.05 N0.19, KeL. Indralaya Mulya, Kec. Indralaya, Kab. Ogan Ilir
							Indralaya 30862 <br>
							(Telp) 0877-9641-8116
						</td>
					</tr>
				</table>
			</div>
			<table class="data-item data-item-pembelian" border="1">
				<tr>
					<th class="col_no">No.</th>
					<th class="col_nmobat">Nama Obat</th>
					<th class="col_hrg">Harga</th>
					<th class="col_jml">Jumlah</th>
					<th class="col_sat">Satuan</th>
					<th class="col_subt">Subtotal</th>
				</tr>
				<?php 
					$no = 1;
					$total = 0;
					$query_lihat = $this->db->query("SELECT dataobat.nm_obat, tbl_pembeliandetail.hrg_beli, tbl_pembeliandetail.jml_beli, tbl_pembeliandetail.sat_beli, tbl_pembeliandetail.subtotal 
			        FROM tbl_pembeliandetail 
			        INNER JOIN dataobat ON tbl_pembeliandetail.kd_obat = dataobat.kd_obat 
			        WHERE tbl_pembeliandetail.no_faktur = '$no_faktur'");
					foreach($query_lihat->result_array() as $data):
					$total = $total+$data['subtotal'];
				?>
				<tr>
					<td class="col_no"><?php echo $no++; ?></td>
					<td class="col_nmobat" align="left"><?php echo $data['nm_obat']; ?></td>
					<td class="col_hrg" align="right"><?php echo $data['hrg_beli']; ?></td>
					<td class="col_jml"><?php echo $data['jml_beli']; ?></td>
					<td class="col_sat"><?php echo $data['sat_beli']; ?></td>
					<td class="col_subt" align="right">Rp<?php echo number_format($data['subtotal']); ?></td>
				</tr>
				<?php endforeach ?>
				<tr>
					<th colspan="5" class="col_tot" align="right">Total</th>
					<th class="col_tot" align="right">Rp<?php echo number_format($total); ?></th>
				</tr>
			</table>
			<div class="catatan">
				<table class="tabel-catatan">
					<tr>
						<th colspan="2">Catatan</th>
					</tr>
					<tr>
						<td>Jenis Pembayaran</td>
						<td>: <?php echo $data_pbl['cr_bayar']; ?></td>
					</tr>
					<tr>
						<td>Tgl Jatuh Tempo</td>
						<?php 
						$jth_tempo = tgl_indo($data_pbl['jth_tempo']);
						if ($data_pbl['cr_bayar'] == "Langsung") {
							$jth_tempo = "-";
						}
					 ?>
						<td>: <?php echo $jth_tempo; ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>: <?php echo $data_pbl['status_byr']; ?></td>
					</tr>
					<?php 
					if ($data_pbl['cr_bayar'] == "Utang" && $data_pbl['status_byr'] == "Lunas") {
				?>
					<tr>
						<td>Tanggal Pelunasan</td>
						<td>: <?php echo tgl_indo($data_pbl['tgl_lunas']); ?></td>
					</tr>
					<?php
					}
				 ?>
				</table>
			</div>
			<div class="paraf">
				<table class="tabel-paraf">
					<tr>
						<td class="keterangan-paraf">Supplier</td>
						<td class="keterangan-paraf kanan">Pembeli</td>
					</tr>
					<tr>
						<td class="isi-paraf"></td>
						<td class="isi-paraf kanan"></td>
					</tr>
					<tr>
						<td class="nama-paraf"><?php echo $data_pbl['name']; ?></td>
						<td class="nama-paraf kanan">Apotek Dinar Mas</td>
					</tr>
				</table>
			</div>
		</div>
		<page_footer>

		</page_footer>
	</page>
</body>
</html>
