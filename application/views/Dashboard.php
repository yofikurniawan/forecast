<div class="alert alert-success">
	<ul class="fa-ul">
		<li>
			<i class="fa fa-info-circle fa-lg fa-li "></i>
			<h4> Selamat Datang <?= $this->fungsi->user_login()->nama_peg; ?>. </h4>
		</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-- top tiles -->
		<!-- top tiles -->
		<div class="x_panel x_content">
			<div class="row tile_count" style="text-align: center;">
				<!-- Query Jumlah Produk -->
				<?php 
					$query_jproduk = $this->db->query("SELECT kd_obat FROM dataobat")->num_rows();
				?>
				<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"><i class="fa fa-medkit"></i> Jumlah Produk</span>
					<div class="count"><?= $query_jproduk; ?></div>
				</div>
				<!-- Query Stok Kurang -->
				<?php 
					$query_jstok = $this->db->query("SELECT kd_obat FROM dataobat WHERE stk_obat<=minstk_obat")->num_rows();
				?>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"><i class="fa fa-hospital-o"></i> Jumlah Produk dengan Stok Kurang</span>
					<div class="count"><?= $query_jstok ?></div>
				</div>
				<!-- Query Total Pembelian -->
				<?php 
					$tgl_ini = date('Y-m-d');
					$query_tpembelian = $this->db->query("SELECT SUM(total_pembelian) AS total_pbl FROM tbl_pembelian WHERE tgl_pembelian = '$tgl_ini'")->row_array();
					$tpembelian = $query_tpembelian['total_pbl'];
				?>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"><i class="fa fa-edit"></i> Total Pembelian Hari Ini</span>
					<div class="count">Rp <?php echo number_format($tpembelian); ?></div>
				</div>
				<!-- Query Total Penjualan -->
				<?php 
					$tgl_ini = date('Y-m-d');
					$query_tpenjualan = $this->db->query("SELECT SUM(total_penjualan) AS total FROM tbl_penjualan WHERE tgl_penjualan = '$tgl_ini'")->row_array();
					$tpenjualan = $query_tpenjualan['total'];
				?>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"><i class="fa fa-edit"></i> Total Penjualan Hari Ini</span>
					<div class="count">Rp <?php echo number_format($tpenjualan); ?></div>
				</div>
			</div>
			<!-- /top tiles -->

			<!-- top tiles -->
			<div class="row tile_count" style="text-align: center;">
				<!-- Query Pembelian Belum Lunas -->
				<?php 
					$query_pblutang = $this->db->query("SELECT no_faktur FROM tbl_pembelian WHERE status_byr='Belum Lunas'")->num_rows();
				?>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"><i class="fa fa-medkit"></i> Jml T. Pembelian Belum Lunas</span>
					<div class="count"><?= $query_pblutang ?></div>

				</div>
				<!-- Query Pembelian jatuh tempo hari ini -->
				<?php
					$tgl_ini = date('Y-m-d'); 
					$query_pbljtempo = $this->db->query("SELECT no_faktur FROM tbl_pembelian WHERE status_byr='Belum Lunas' AND jth_tempo='$tgl_ini'")->num_rows();
				?>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"><i class="fa fa-hospital-o"></i> Pembelian Jth Tempo Hari ini</span>
					<div class="count"><?= $query_pbljtempo ?></div>
				</div>
				<!-- Query Jumlah Transaksi Hari Ini -->
				<?php 
					$tgl_ini = date('Y-m-d');
					$query_jpenjualan = $this->db->query("SELECT no_penjualan FROM tbl_penjualan WHERE tgl_penjualan='$tgl_ini'");
					$jpenjualan = $query_jpenjualan->num_rows();
				?>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"><i class="fa fa-edit"></i> Jumlah Transaksi Penjualan Hari Ini</span>
					<div class="count"><?php echo $jpenjualan; ?></div>
				</div>
				<!-- Query Jumlah Pegawai -->
				<?php
					$pegawai = $this->db->query(" SELECT username FROM user")->num_rows();
				?>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"><i class="fa fa-users"></i> Jumlah Pegawai</span>
					<div class="count"><?= $pegawai ?></div>
				</div>
			</div>
			<!-- /top tiles -->
			<!-- top tiles -->
			<div class="row tile_count" style="text-align: center;">
				<!-- Kurang dari 30 Hari -->
				<?php 
					$query_30 = $this->db->query("SELECT * FROM dataobat INNER JOIN stokexpobat ON dataobat.kd_obat = stokexpobat.kd_obat WHERE stokexpobat.tgl_exp>date_add(CURDATE(), INTERVAL 10 DAY) AND stokexpobat.tgl_exp<=date_add(CURDATE(), INTERVAL 30 DAY) AND stokexpobat.stok > 0")->num_rows();
				?>
				<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
					<span class="count_top"><i class="fa fa-medkit"></i> Jumlah Produk Kedaluwarsa < 30 Hari</span> <div
							class="count"><?= $query_30 ?></div>
			</div>
			<!-- Kurang dari 10 Hari -->
			<?php 
					$query_10 = $this->db->query("SELECT * FROM dataobat INNER JOIN stokexpobat ON dataobat.kd_obat = stokexpobat.kd_obat WHERE stokexpobat.tgl_exp>CURDATE() AND stokexpobat.tgl_exp<=date_add(CURDATE(), INTERVAL 10 DAY) AND stokexpobat.stok > 0")->num_rows();
				?>
			<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-medkit"></i> Jumlah Produk Kedaluwarsa < 10 Hari</span> <div
						class="count"><?= $query_10 ?></div>

		</div>
		<!-- Kedaluwarsa -->
		<?php 
			$query_exp = $this->db->query("SELECT * FROM dataobat INNER JOIN stokexpobat ON dataobat.kd_obat = stokexpobat.kd_obat WHERE stokexpobat.tgl_exp<=CURDATE() AND stokexpobat.stok > 0")->num_rows();
		?>
		<div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-medkit"></i> Jumlah Produk Telah Kedaluwarsa</span>
			<div class="count"><?= $query_exp ?></div>
		</div>
	</div>
	<!-- /top tiles -->
</div>
<div class="row top_tiles">
	<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('obat/tambah_data_obat') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-medkit green"></i>
				</div>
				<div class="count">...</div>
				<h3 class="" style="">Obat</h3>
				<p>Menambahkan obat baru</p>
			</div>
		</a>
	</div>
	<?php } elseif ($this->fungsi->user_login()-> level == 3) { ?>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('obat') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-medkit red"></i>
				</div>
				<div class="count">...</div>
				<h3>Obat</h3>
				<p>Melihat Data obat</p>
			</div>
		</a>
	</div>
	<?php } ?>

	<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('category/add_category') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-hospital-o green"></i>
				</div>
				<div class="count">...</div>
				<h3>Kategori</h3>
				<p>Menambahkan kategori obat baru</p>
			</div>
		</a>
	</div>
	<?php } elseif ($this->fungsi->user_login()-> level == 3) { ?>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('category') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-hospital-o red"></i>
				</div>
				<div class="count">...</div>
				<h3>Kategori</h3>
				<p>Melihat kategori obat</p>
			</div>
		</a>
	</div>
	<?php } ?>	

	<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('supplier/add_supplier') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-user green"></i>
				</div>
				<div class="count">...</div>
				<h3>Supplier</h3>
				<p>Menambahkan supplier baru</p>
			</div>
		</a>
	</div>
	<?php } elseif ($this->fungsi->user_login()-> level == 3) { ?>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('supplier') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-user red"></i>
				</div>
				<div class="count">...</div>
				<h3>Supplier</h3>
				<p>Melihat Data Supplier</p>
			</div>
		</a>
	</div>
	<?php } ?>	
		

	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('penjualan/form_invoice') ?>">
			<div class="tile-stats">
				<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
				<div class="icon"><i class="fa fa-edit green"></i>
				<?php } elseif ($this->fungsi->user_login()-> level == 3 ) { ?>
				<div class="icon"><i class="fa fa-edit red"></i>
				<?php } ?>			
				</div>
				<div class="count">...</div>
				<h3>Penjualan</h3>
				<p>Menambahkan penjualan baru</p>
			</div>
		</a>
	</div>

<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('expired') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-warning green"></i>
				</div>
				<div class="count">...</div>
				<h3>Kedaluwarsa</h3>
				<p>Banyak obat yang kedaluwarsa</p>
			</div>
		</a>
	</div>


	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('penjualan/laporan_penjualan_obat') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-file-text-o green"></i>
				</div>
				<div class="count">...</div>
				<h3>Laporan Penjualan</h3>
				<p>Form Laporan Transaksi Penjualan Obat</p>
			</div>
		</a>
	</div>


	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('pembelian/laporan_pembelian_obat') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-bar-chart green"></i>
				</div>
				<div class="count">...</div>
				<h3 class="text-black">Laporan Pembelian</h3>
				<p>Form Laporan Transaksi Pembelian Obat</p>
			</div>
		</a>
	</div>


	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a href="<?=site_url('pembelian/form_pembelian') ?>">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-shopping-cart green"></i>
				</div>
				<div class="count">...</div>
				<h3>Pembelian</h3>
				<p>Menambahkan pembelian baru</p>
			</div>
		</a>
	<div>
	</div>
	<?php } ?>	
</div>
</div>
</div>
</div>