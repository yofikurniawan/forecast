<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta. title. CSS. favicons. etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laporan Data Pegawai Apotek Dinar Mas</title>
	<!-- Custom untuk Laporan -->
	<link rel="stylesheet" href="assets/laporan/custom_laporan.css">
</head>

<body>
	<!-- Text Lampiran -->
	<div class="col-6 float-right">
		<table>
			<tr>
				<td class="align-top lh-150" valign="top">
					Lampiran Pegawai :
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
		DAFTAR NAMA PEGAWAI APOTEK DINAR MAS
	</h3>
	<?php $no=1; foreach ($user->result() as $key => $data): ?>
	<table class="table table-bordered" width="100%" border="1" cellspacing='0'>
		<thead>
			<tr>
				<th class="text-center">I</th>
				<th colspan="2" class="text-center">KETERANGAN PERORANGAN</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="text-center">1</td>
				<td>Nama Lengkap</td>
				<td><b><?= $data->nama_peg ?></b></td>
			</tr>
			<tr>
				<td class="text-center">2</td>
				<td>Tanggal Lahir</td>
				<td><?= date_indo($data->lhr_peg) ?></td>
			</tr>
			<tr>
				<td class="text-center">3</td>
				<td>Jenis Kelamin</td>
				<td><?= $data->jk_peg == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
			</tr>
			<tr>
				<td class="text-center">4</td>
				<td>Alamat</td>
				<td><?= $data->alamat_peg ?></td>
			</tr>
			<tr>
				<td class="text-center">5</td>
				<td>Jabatan</td>
				<td>
					<?php 
                        if($data->level == 1) {
                            echo"Admin/Pemilik";
                            }else if($data->level == 2) {
                                echo"Asisten Apoteker";
                            }else if ($data->level == 3) {
                                echo"Kasir";
                            }else {
                                echo"Tidak diketahui";
                            }
                    ?>
				</td>
			</tr>
			<tr>
				<td class="text-center">6</td>
				<td>HP Pegawai</td>
				<td><?= $data->hp_peg ?></td>
			</tr>
			<tr>
				<td class="text-center">7</td>
				<td>Email</td>
				<td><?= $data->email ?></td>
			</tr>
			<tr>
				<td class="text-center">8</td>
				<td>Masa Kerja <span class="float-right">*Lama</span></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2"><span class="float-right">*Baru</span></td>
				<td>-</td>
			</tr>
			<tr>
				<td class="text-center">9</td>
				<td>Alamat Kerja</td>
				<td>Jalan Tasik LK.II RT.05 No.19 Kel. Indralaya Mulya Kecamatan Indralaya Kabupaten Ogan Ilir</td>
			</tr>
		</tbody>
	</table>
	<!-- akhir tabel Keterangan Perorangan -->
	<div class="separator"></div>
	<?php endforeach ?>

</body>
</html>
