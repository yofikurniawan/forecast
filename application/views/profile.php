<div class="col-md12 col-sm-12 col-xs-12 profile_details">
	<div class="well profile_view">
		<div class="col-sm-12">
			<h4 class="brief"><i>Profile Akun <?= $this->fungsi->user_login()->nama_peg ?> </i></h4>
			<div class="profile_pic">
				<img src="<?php echo base_url() ?>assets/images/<?= $this->fungsi->user_login()->foto_peg ?>" alt="..."
					class="img-circle profile_img">
			</div>
			<div class="left col-xs-7">
				<h2><?= $this->fungsi->user_login()->nama_peg ?></h2>
				<p><strong>Jenis Kelamin: </strong> <?php if($this->fungsi->user_login()->jk_peg = 1) {
                    echo "Laki-Laki";
                }else {
                    echo"Perempuan";
                } ?> </p>
				<ul class="list-unstyled">
					<li><i class="fa fa-building"></i> Alamat #: <?= $this->fungsi->user_login()->alamat_peg ?> </li>
					<li><i class="fa fa-sitemap"></i> Jabatan #:
						<?php 
							if($this->fungsi->user_login()->level == 1){
								echo"Admin";
							}elseif($this->fungsi->user_login()->level == 2) {
								echo"Manager";
							}elseif ($this->fungsi->user_login()->level == 3) {
								echo"Kasir";
							}elseif ($this->fungsi->user_login()->level == 4) {
								echo"Apoteker";
							}else {
								echo"Tidak diketahui";
							}
							?>
					</li>
					<li><i class="fa fa-phone"></i> Phone #:<?= $this->fungsi->user_login()->hp_peg ?> </li>
					<li><i class="fa fa-google-plus"></i> Email #: <?= $this->fungsi->user_login()->email ?> </li>
					<li><i class="fa fa-eye"></i> Tanggal Lahir #:
						<?= date_indo($this->fungsi->user_login()->lhr_peg) ?> </li>
				</ul>
			</div>
		</div>
		<div class="col-xs-12 bottom text-center">
			<div class="col-xs-12 col-sm-6 emphasis">
				<p class="ratings">
					<a>4.0</a>
					<a href="#"><span class="fa fa-star"></span></a>
					<a href="#"><span class="fa fa-star"></span></a>
					<a href="#"><span class="fa fa-star"></span></a>
					<a href="#"><span class="fa fa-star"></span></a>
					<a href="#"><span class="fa fa-star-o"></span></a>
				</p>
			</div>
			<div class="col-xs-12 col-sm-6 emphasis">
				<a href="<?=site_url('user/edit/'.$this->fungsi->user_login()->user_id) ?>"
					class="btn btn-success btn-sm">
					<i class="fa fa-user"> </i> Edit Profile </a>
			</div>
		</div>
	</div>
</div>
