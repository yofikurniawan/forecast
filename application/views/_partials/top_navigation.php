<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i>
				</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
						aria-expanded="false">
						<img src="<?php echo base_url() ?>assets/images/<?= $this->fungsi->user_login()->foto_peg ?>"
							alt=""><?= $this->fungsi->user_login()->nama_peg ?>
						<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li><a href="<?=site_url('dashboard/visidanmisi') ?>"> Visi dan Misi Apotek</a></li>
						<li>
							<a href="<?=site_url('dashboard/profile') ?>">
								<span>Profile</span>
							</a>
						</li>
						<li><a href="<?=site_url('dashboard/panduan_pelayanan') ?>" target="_blank">Panduan
								Pelayanan</a></li>
						<li><a href="javascript:void" id="tombol_keluar"><i class="fa fa-sign-out pull-right"></i> Log
								Out</a></li>

					</ul>
				</li>
			</ul>
			</li>
			</ul>
		</nav>
	</div>
</div>
<script type="text/javascript">
	$("#tombol_keluar").click(function(){
        Swal.fire({
          title: 'Apakah Anda Yakin?',
          text: 'anda akan keluar dari aplikasi ini <?= $this->fungsi->user_login()->nama_peg ?>',
          icon: 'warning',
          showClass: {
    	  popup: 'animate__animated animate__fadeInDown'
  			},
		  hideClass: {
		    popup: 'animate__animated animate__fadeOutUp'
		  },
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya'
        }).then((tes) => {
          if (tes.value) {
            $.ajax({
              type: "POST",
              url: "<?=site_url('auth/logout') ?>",
              success: function(hasil) {
                window.location="<?=site_url('auth/login') ?>";
              }
            })  
          }
        })
      });
</script>