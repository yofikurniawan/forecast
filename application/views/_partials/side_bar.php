
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<h3>Menu</h3>
		<ul class="nav side-menu">
			<li>
				<a href="<?=site_url('dashboard') ?>"><i class="fa fa-laptop"></i> Dashboard <span
						class="label label-success pull-right">News</span></a>
			</li>
			<li>
				<a href="<?=site_url('expired') ?>"><i class="fa fa-medkit"></i>Expired Obat</a>
			</li>
			<li><a><i class="fa fa-edit"></i> Data Master <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="<?=site_url('category') ?>">Data Category</a></li>
					<li><a href="<?=site_url('unit') ?>">Data Unit</a></li>
					<li><a href="<?=site_url('bentuk') ?>">Data Bentuk</a></li>	
					<li><a href="<?=site_url('obat') ?>">Data Obat</a></li>
					<li><a href="<?=site_url('supplier') ?>">Data Suppliers</a></li>
				</ul>
			</li>
			<li><a><i class="fa fa-desktop"></i> Transaction <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a>Penjualan<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        	<li class="sub_menu"><a href="<?=site_url('penjualan') ?>">Data Penjualan</a></li>
                        	<li class="sub_menu"><a href="<?=site_url('penjualan/per_obat') ?>">Data Penjualan Per obat</a></li>
                            <li><a href="<?=site_url('penjualan/form_invoice') ?>">Transaksi Penjualan</a></li>
                            <?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
                            <li><a href="<?=site_url('penjualan/laporan_penjualan_obat') ?>">Laporan Penjualan</a></li>
                            <?php } ?>
                        </ul>
                     </li>
                     <?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
                     <li><a>Pembelian<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        	<li class="sub_menu"><a href="<?=site_url('pembelian') ?>">Data Pembelian</a></li>
                            <li><a href="<?=site_url('pembelian/form_pembelian') ?>">Transaksi Pembelian</a></li>
                            
                            <li><a href="<?=site_url('pembelian/laporan_pembelian_obat') ?>">Laporan Pembelian</a></li>
                            
                        </ul>
                     </li>
                     <?php } ?>
				</ul>
			</li>
			<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
			<li><a><i class="fa fa-bar-chart-o"></i> Peramalan Penjualan <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
				<li><a href="<?=site_url('peramalan/data_ramal') ?>">Data Peramalan </a></li>
				<li><a href="<?=site_url('peramalan') ?>">Form Peramalan </a></li>
				<li><a href="<?=site_url('peramalan/index1') ?>">Form Peramalan test</a></li>
				</ul>
			</li>
			<?php } ?>
			<li><a><i class="fa fa-users"></i>Users <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="<?=site_url('user') ?>">Data Pegawai / Users</a></li>
				</ul>
			</li>
			
		</ul>
	</div>
</div>
