<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.tabel-nama-apotek-nopenjualan {
			width: 100%;
			font-size: 7px;
		}

		body {
			font-family: arial, sans-serif;
			font-size: 10px;
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
							Jl. Tasik, LK II RT.05 N0.19, KeL. Indralaya Mulya, Kec. Indralaya, Kab. Ogan Ilir
							Indralaya 30862 <br>
							(Telp) 0877-9641-8116
						</td>
						<td class="nopenjualan">
							<?php
                        $oke1 = $this->uri->segment(3);
                        $oke2 = $this->uri->segment(4);
                        $oke3 = $this->uri->segment(5);
                        $no_pjl = $oke1.'/'.$oke2.'/'.$oke3;
                        ?>
							NOTA PENJUALAN <br> <?= $no_pjl; ?>
						</td>
					</tr>
				</table>
			</div>
			<div class="data-penjualan">
				<table class="tabel-data-penjualan">
					<?php foreach ($user->result() as $key => $data) :?>
					<tr>
						<td class="isi tanggal">
							tgl : [<?php echo tgl_indo($data->tgl_penjualan); ?>]
						</td>
						<td>/</td>
						<td class="isi nama-pegawai">
							kasir : <?= $data->nama_peg ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="data-barang">
				<table class="tabel-data-barang">
					<?php foreach ($penjualan->result() as $key => $data_dpjl) :?>
					<tr>
						<td align="left" class="nama_obat">
							<?= $data_dpjl->nm_obat ?>
						</td>
						<td class="jml_obat">
							<?php echo $data_dpjl->jml_jual; ?>
						</td>
						<td class="sat_obat">
							<?php echo $data_dpjl->sat_jual ?>
						</td>
						<td align="right" class="hrg_obat">
							<?php echo $data_dpjl->hrg_jual ?>
						</td>
						<td align="right" class="subt_obat">
							<?php echo $data_dpjl->subtotal ?>
						</td>
					</tr>
					<?php endforeach; ?>
					<tr class="baris-total">
						<td colspan="4">Total :</td>
						<td class="total">
							<?php echo $data->total_penjualan ?>
						</td>
					</tr>

					<tr class="baris-tunai">
						<td colspan="4">Tunai :</td>
						<td class="tunai">
							<?php echo $data->tunai ?>
						</td>
					</tr>
					<tr class="baris-kembali">
						<td colspan="4">Kembali :</td>
						<td class="kembali">
							<?php echo $data->kembali ?>
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
