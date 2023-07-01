<div class="x_panel">
	<div class="x_title">
		<h2>Form Edit Data Users <small></small></h2>
		<ul class="nav navbar-right panel_toolbox">
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			</li>
			<li><a class="close-link"><i class="fa fa-close"></i></a>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<br>
		<form action="" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate
			class="form-horizontal form-label-left">

			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input type="hidden" name="user_id" value="<?= $row->user_id ?>">
				<input name="nama_peg" type="text"  value="<?= $this->input->post('nama_peg') ?? $row->nama_peg ?>"
					class="form-control has-feedback-left" id="inputSuccess2" placeholder="Name">
				<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
				<?= form_error('nama_peg'); ?>
			</div>
			
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="username" type="text" value="<?= $this->input->post('username') ?? $row->username ?>"
					class="form-control" id="inputSuccess3" placeholder="Username">
				<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
				<?= form_error('username'); ?>
			</div>
			<?php if($this->session->userdata('user_id') == $row->user_id ) { ?>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="password" type="password" value="<?= $this->input->post('password')?>"
					class="form-control has-feedback-left" id="inputSuccess2" placeholder="Password">
				<span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
				<?= form_error('password'); ?>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="passwordcon" type="password" value="<?= $this->input->post('passwordcon')?>"
					class="form-control" id="inputSuccess2" placeholder="Konfirmasi Password">
				<span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
				<?= form_error('passwordcon'); ?>
			</div>
			<?php } else { ?>
			<input name="password" type="hidden" value="<?= $this->input->post('password')?>"
				class="form-control has-feedback-left" id="inputSuccess2" placeholder="Password">
			<input name="passwordcon" type="hidden" value="<?= $this->input->post('passwordcon')?>"
				class="form-control" id="inputSuccess2" placeholder="Konfirmasi Password">
			<?php } ?>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<textarea class="form-control has-feedback-left" name="alamat_peg" rows="3"
					placeholder="Alamat"><?= $this->input->post('alamat_peg') ?? $row->alamat_peg ?></textarea>
				<span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
				<?= form_error('alamat_peg'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<select name="level" class="form-control">
					<?php $level = $this->input->post('level') ?? $row->level ?>
					<?php if($this->fungsi->user_login()-> level == 1 ) { ?>
					<option value="1" <?= $level == 1 ? "selected" : null ?>>Admin</option>
					<?php } ?>
					<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
					<option value="2" <?= $level == 2 ? "selected" : null ?>>Asisten Apoteker</option>
					<?php } ?>
					<option value="3" <?= $level == 3 ? "selected" : null ?>>Kasir</option>
				</select>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="hp_peg" type="text" value="<?= $this->input->post('hp_peg') ?? $row->hp_peg ?>"
					class="form-control has-feedback-left" id="inputSuccess5" placeholder="Phone">
				<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
				<?= form_error('hp_peg'); ?>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<select name="jk_peg" class="form-control">
					<?php $jk_peg = $this->input->post('jk_peg') ?? $row->jk_peg ?>
					<option value="1" <?= $jk_peg == 1 ? "selected" : null ?>>Laki-Laki</option>
					<option value="2" <?= $jk_peg == 2 ? "selected" : null ?>>Perempuan</option>
				</select>
				<?= form_error('jk_peg'); ?>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="email" value="<?= $this->input->post('email') ?? $row->email ?>" type="email"
					class="form-control" id="inputSuccess" placeholder="Email">
				<span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
				<?= form_error('email'); ?>
			</div>
			
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input type="text" name="lhr_peg" value="<?= $this->input->post('lhr_peg') ?? $row->lhr_peg ?>" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name"
					aria-describedby="inputSuccess2Status">
				<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
				<span id="inputSuccess2Status" class="sr-only">(success)</span>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="foto_peg" type="file" class="form-control" id="inputSuccess" placeholder="Foto">
				<input name="foto_lama" value="<?=$row->foto_peg ?>" type="hidden" class="form-control"
					id="inputSuccess" placeholder="Foto">
				<span class="fa fa-photo form-control-feedback right" aria-hidden="true"></span>
				<img src="<?php echo base_url() ?>assets/images/<?= $row->foto_peg; ?>" width="250" height="250">
			</div>

			<div class="form-group"></div>
			<div class="ln_solid"></div>
			<div class="form-group">
				<div class="col-md-6 btn-center col-sm-6 col-xs-6">
					<a href=<?=site_url('user') ?> class="btn btn-primary btn-sm"><i class="fa fa-backward"></i>
						Back</button> </a>
					<button type="submit" class="btn btn-success"> <i class="fa fa-paper-plane"></i> Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
