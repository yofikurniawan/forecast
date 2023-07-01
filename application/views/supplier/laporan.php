<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta. title. CSS. favicons. etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laporan Data Suppliers Apotek Dinar Mas</title>
	<!-- Custom untuk Laporan -->
	<link rel="stylesheet" href="assets/laporan/custom_laporan.css">

</head>

<body>

	<!-- Text Lampiran -->
	<div class="col-6 float-right">
		<table>
			<tr>
				<td class="align-top lh-150" valign="top">
					Lampiran Data Suppliers :
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
	<!-- Tabel Keterangan Perorangan -->
	<h3 class="text-center lh-200">
		DAFTAR NAMA SUPPLIERS APOTEK DINAR MAS
	</h3>
	<?php $no=1; foreach ($row->result() as $key => $data): ?>
	<table class="table table-bordered" width="100%" border="1" cellspacing='0'>
		<thead>
			<tr>
				<th class="text-center">I</th>
				<th colspan="2" class="text-center">KETERANGAN PERUSAHAAN SUPPLIER</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="text-center">1</td>
				<td>Nama Perusahaan / PT</td>
				<td><b><?= $data->name ?> (BSM)</b></td>
			</tr>
			<tr>
				<td class="text-center">2</td>
				<td>Alamat Perusahaan</td>
				<td><?= $data->alamat ?></td>
			</tr>
			<tr>
				<td class="text-center">3</td>
				<td>Email Perusahaan</td>
				<td><?= $data->email ?></td>
			</tr>
			<tr>
				<td class="text-center">4</td>
				<td>Nomor <span class="float-right">*HP & WA</span></td>
				<td><?= $data->phone ?></td>
			</tr>
			<tr>
				<td colspan="2"><span class="float-right">*Telp & Fax</span></td>
				<td>07115720885</td>
			</tr>
			<tr>
				<td class="text-center">5</td>
				<td>Alamat Tujuan</td>
				<td>Jalan Tasik LK.II RT.05 No.19 Kel. Indralaya Mulya Kecamatan Indralaya Kabupaten Ogan Ilir</td>
			</tr>
		</tbody>
	</table>
	<!-- akhir tabel Keterangan Perorangan -->
	<div class="separator"></div>
    <?php endforeach ?>
    <br>
    <h3 class="text-right lh-150">
        Indralaya Mulya, <?php $ok = date("Y-m-d"); echo date_indo($ok) ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        Wiranti Anggraini, S.Farm., Apt
    </h3>
</body>
</html>
