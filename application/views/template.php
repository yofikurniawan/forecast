<!DOCTYPE html>
<html lang="en">

<head>
	<!-- top navigation -->
	<?php $this->load->view('_partials/header') ?>
	<!-- /top navigation -->
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="javascript:;" class="site_title"><i class="fa fa-hospital-o"></i>
							<span><?php 
							if($this->fungsi->user_login()->level == 1){
								echo"Admin";
							}elseif($this->fungsi->user_login()->level == 2) {
								echo"Asisten Apoteker";
							}elseif ($this->fungsi->user_login()->level == 3) {
								echo"Kasir";
							}else {
								echo"Tidak diketahui";
							}
							?></span>
							Apotek</a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="<?php echo base_url() ?>assets/images/<?= $this->fungsi->user_login()->foto_peg ?>"
								alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?= $this->fungsi->user_login()->nama_peg ?></h2>
							<span class="text-white" id="jam"></span></h5> 
						</div>
						<!-- <h5><span class="text-white col-md-6" id="tanggal"><?=date('d M Y'); ?></span> -->
						
					</div>
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
					<?php $this->load->view('_partials/side_bar') ?>

					<!-- /sidebar menu -->
				</div>
			</div>
			<!-- /side menu -->
			<!-- top navigation -->
			<?php $this->load->view('_partials/top_navigation') ?>
			<!-- /top navigation -->
			<!-- Flash Data -->
			<?php if($this->session->flashdata('flash')) { ?>
			<div class="flash-data" data-flashdatasucces="<?= $this->session->flashdata('flash'); ?>"></div>
			<?php }elseif ($this->session->flashdata('flash-info')) { ?>
			<div class="flash-data" data-flashdatainfo="<?= $this->session->flashdata('flash-info'); ?>"></div>
			<?php }elseif ($this->session->flashdata('flash-delete')) { ?>
			<div class="flash-data" data-flashdatadelete="<?= $this->session->flashdata('flash-delete'); ?>"></div>
			<?php }elseif ($this->session->flashdata('flash-error')) { ?>
			<div class="flash-data"
				data-flashdataerror="<?= strip_tags(str_replace('</p>', '', $this->session->flashdata('flash-error'))); ?>">
			</div>
			<?php } ?>
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left mb-2 w-100">
							<h3>
								<?php echo $judul; ?>
								<small><?php echo $sub_judul; ?></small>
							</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<?php echo $contents; ?>
					<br />
				</div>
			</div>
			<?php $this->load->view('_partials/footer') ?>
			<!-- /footer content -->
		</div>
	</div>
	<!-- javascript -->
	<?php $this->load->view('_partials/javascript') ?>
	<!-- /javascript -->

	<!-- Realtime Jam -->
	<script type="text/javascript">
		function checkTime(i) {
			if (i < 10) {
				i = "0" + i;
			}
			return i;
		}

		function startTime() {
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			// add a zero in front of numbers<10
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
			t = setTimeout(function () {
				startTime()
			}, 500);
		}
		startTime();

	</script>
	<!-- End -->

</body>
</html>
