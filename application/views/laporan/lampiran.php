<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url();?>assets/css/nota_penjualan.css" rel="stylesheet">
	<style>
		.tabel-nama-apotek-nopenjualan {
			width: 100%;
			font-size: 5px;
		}

		.tabel-nama-apotek-nopenjualan td {
			width: 70%;
		}

		.tabel-nama-apotek-nopenjualan .nama_apotek {
			font-weight: bold;
		}

		.tabel-nama-apotek-nopenjualan .nopenjualan {
			font-weight: bold;
			text-align: center;
			vertical-align: middle;
			padding: 3px;
			width: 30%;
		}

		.tabel-data-penjualan .isi {
			padding: 0 3px;
		}

		.data-penjualan {
			border-bottom: 1px dotted #5c5c5c;
		}

		.data-barang {
			border-bottom: 1px dashed #5c5c5c;
		}

		.tabel-data-barang {
			width: 100%;
		}

		.tabel-data-barang td {
			text-align: center;
			padding: 0 2px;
			vertical-align: middle;
		}

		.tabel-data-barang .nama_obat {
			width: 40%;
		}

		.tabel-data-barang .jml_obat {
			width: 5%;
		}

		.tabel-data-barang .sat_obat {
			width: 15%;
		}

		.tabel-data-barang .hrg_obat {
			width: 17%;
		}

		.tabel-data-barang .subt_obat {
			width: 23%;
		}

		.tabel-data-barang .baris-total td,
		.tabel-data-barang .baris-tunai td,
		.tabel-data-barang .baris-kembali td {
			text-align: right;
		}

		.tabel-data-barang .baris-total td {
			padding-top: 3px;
		}

		.tabel-data-barang .baris-total td {
			border-top: 1px dotted #5c5c5c;
		}

		.terimakasih {
			font-size: 3px;
			text-align: center;
			padding: 4px;
		}

	</style>
	<title>Penjualan Product </title>
</head>

<body>
	<page backleft="-10px" backright="-10px" backtop="-16px" backbottom="-16px" style="font-size: 6px;">
		<page_header class="page_header">

		</page_header>
		<page_footer>
		</page_footer>
		<div class="page-content page-nota-penjualan">
			<div class="nama-apotek-nopenjualan">
				<table class="tabel-nama-apotek-nopenjualan">
					<tr>
						<td>
							<span class="nama_apotek">APOTEK DINAR MAS</span><br>
							Jalan Lintas Timur Indralaya, Simpang Puskesmas
							Indralaya 55561 <br>
							(Telp) 0821-7580-5939
						</td>
						<td class="nopenjualan">
							NOTA PENJUALAN <br> 457474
						</td>
					</tr>
				</table>
			</div>
			<div class="data-penjualan">
				<table class="tabel-data-penjualan">
					<tr>
						<td class="isi tanggal">
							tgl : [31-Januari-2021]
						</td>
						<td>/</td>
						<td class="isi nama-pegawai">
							kasir : Yofi Kurniawan
						</td>
					</tr>
				</table>
			</div>
			<div class="data-barang">
				<table class="tabel-data-barang">
					<tr>
						<td align="left" class="nama_obat">
							Sirup ABC Sakatonik
						</td>
						<td class="jml_obat">
							20
						</td>
						<td class="sat_obat">
							12
						</td>
						<td align="right" class="hrg_obat">
							Rp.50000
						</td>
						<td align="right" class="subt_obat">
							250
						</td>
                        
					</tr>
                    <tr>
                    <td align="left" class="nama_obat">
							Bodrex 15Gr
						</td>
						<td class="jml_obat">
							5
						</td>
						<td class="sat_obat">
							12
						</td>
						<td align="right" class="hrg_obat">
							Rp.25000
						</td>
						<td align="right" class="subt_obat">
							25
						</td>
                    </tr>
					<tr class="baris-total">
						<td colspan="4">Total :</td>
						<td class="total">
							Rp.75.000
						</td>
					</tr>
					<tr class="baris-tunai">
						<td colspan="4">Tunai :</td>
						<td class="tunai">
							Rp.100.000
						</td>
					</tr>
					<tr class="baris-kembali">
						<td colspan="4">Kembali :</td>
						<td class="kembali">
							Rp.25.000
						</td>
					</tr>
				</table>
			</div>
			<div class="terimakasih">
				TERIMA KASIH, SEMOGA OBAT YANG DIBELI DAPAT BERMANFAAT
			</div>
		</div>
	</page>
</body>

</html>
