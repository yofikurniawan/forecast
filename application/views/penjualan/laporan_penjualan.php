<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<style>
    /* UKURAN STRUK THERMAL 80mm */
    body {
		width: 80mm;
		max-width: 80mm;
		margin: 0 auto;
		padding: 2mm;
		font-size: 3mm; /* 3mm ≈ 11px */
	}

    
    /* HEADER */
    .header {
        text-align: center;
        margin-bottom: 5px;
    }
    
    .nama-toko {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 2px;
    }
    
    .alamat {
        font-size: 10px;
        margin-bottom: 3px;
    }
    
    /* GARIS */
    .garis {
        border-top: 1px dashed #000;
        margin: 5px 0;
    }
    
    .garis-tebal {
        border-top: 2px solid #000;
        margin: 5px 0;
    }
    
    /* TABEL SEDERHANA */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 3px 0;
    }
    
    td {
        padding: 2px 0;
        vertical-align: top;
    }
    
    /* TABEL BARANG */
    .tabel-barang td:nth-child(1) { width: 50%; }  /* nama */
    .tabel-barang td:nth-child(2) { width: 15%; text-align: center; } /* qty */
    .tabel-barang td:nth-child(3) { width: 20%; text-align: right; } /* harga */
    .tabel-barang td:nth-child(4) { width: 15%; text-align: right; } /* subtotal */
    
    /* HEADER BARANG */
    .header-barang {
        background: #f0f0f0;
        font-weight: bold;
        border-bottom: 1px solid #000;
    }
    
    /* TOTAL */
    .total {
        font-weight: bold;
    }
    
    .jumlah {
        text-align: right;
        font-weight: bold;
        color: #000;
    }
    
    /* FOOTER */
    .footer {
        text-align: center;
        margin-top: 10px;
        font-size: 10px;
    }
    
    .terimakasih {
        font-size: 12px;
        font-weight: bold;
        margin: 5px 0;
    }
</style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <div class="nama-toko">APOTEK DINAR MAS</div>
	<br>
    <div class="alamat">

        Jl. Tasik, LK II RT.05 No.19<br>
        Indralaya Mulya – Ogan Ilir<br>
        Telp: 0877-9641-8116 <br>
    </div>
	<br>
	<br>
	<br>
    <div style="font-size: 10px;"><?= date('d/m/Y H:i:s') ?></div>
</div>

<br>
<br>
<br>
<br>
	<br>

<div class="garis-tebal"></div>
<br>

<!-- NOMOR STRUK -->
<div style="text-align: center; background: #f0f0f0; padding: 3px; margin: 5px 0;">
    <strong>
    <?php
        $oke1 = $this->uri->segment(3);
        $oke2 = $this->uri->segment(4);
        $oke3 = $this->uri->segment(5);
        echo 'NO: ' . $oke1.'/'.$oke2.'/'.$oke3;
    ?>
    </strong>
</div>
	<br>
	<br>

<div class="garis"></div>

<!-- INFO TRANSAKSI -->
<?php foreach ($user->result() as $data) : ?>
	<br>
<table>
    <tr>
	

        <td style="width: 30%;">Tanggal</td>
        <td>: <?= tgl_indo($data->tgl_penjualan); ?></td>
    </tr>
    <tr>
        <td>Kasir</td>
        <td>: <?= $data->nama_peg ?></td>
    </tr>
</table>
<?php endforeach; ?>

<div class="garis"></div>

<!-- HEADER DAFTAR BARANG -->
<table class="header-barang">
    <tr>
        <td>BARANG</td>
        <td style="text-align: center;">QTY</td>
        <td style="text-align: right;">HARGA</td>
        <td style="text-align: right;">SUBTOTAL</td>
    </tr>
</table>

<!-- DAFTAR BARANG -->
<table class="tabel-barang">
    <?php foreach ($penjualan->result() as $row) : ?>
    <tr>
        <td><?= $row->nm_obat ?></td>
        <td><?= $row->jml_jual ?></td>
        <td><?= number_format($row->hrg_jual, 0, ',', '.') ?></td>
        <td><?= number_format($row->subtotal, 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="garis-tebal"></div>

<!-- TOTAL PEMBAYARAN -->
<table style="margin: 8px 0;">
    <tr class="total">
        <td>TOTAL</td>
        <td class="jumlah">Rp <?= number_format($data->total_penjualan, 0, ',', '.') ?></td>
    </tr>
    <tr>
        <td>TUNAI</td>
        <td class="jumlah">Rp <?= number_format($data->tunai, 0, ',', '.') ?></td>
    </tr>
    <tr class="total">
        <td>KEMBALI</td>
        <td class="jumlah">Rp <?= number_format($data->kembali, 0, ',', '.') ?></td>
    </tr>
</table>

<div class="garis-tebal"></div>

<!-- FOOTER -->
<div class="footer">
    <div class="terimakasih">TERIMA KASIH</div>
	<br>

    <div style="font-weight: bold; margin-bottom: 5px;">SEMOGA LEKAS SEMBUH</div>
	<br>
    <div style="font-size: 9px; color: #666;">
        * Struk ini sebagai bukti pembayaran yang sah
    </div>
</div>

</body>
</html>