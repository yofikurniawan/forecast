<div class="x_panel">
	<div class="x_title">
		<h2>Form Tambah Data Users <small></small></h2>
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
		<form action="<?= site_url('user/add_user') ?>" method="post" enctype="multipart/form-data" id="demo-form2"
			data-parsley-validate class="form-horizontal form-label-left">
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="nama_peg" type="text" value="<?= set_value('nama_peg')?>"
					class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nama Pegawai * ">
				<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
				<?= form_error('nama_peg'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="username" type="text" value="<?= set_value('username')?>" class="form-control"
					id="inputSuccess3" placeholder="Username *">
				<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
				<?= form_error('username'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="password" type="password" value="<?= set_value('password')?>"
					class="form-control has-feedback-left" id="inputSuccess2" placeholder="Password *">
				<span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
				<?= form_error('password'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="passwordcon" type="password" value="<?= set_value('passwordcon')?>" class="form-control"
					id="inputSuccess2" placeholder="Konfirmasi Password *">
				<span class="glyphicon glyphicon-repeat form-control-feedback right" aria-hidden="true"></span>
				<?= form_error('passwordcon'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<textarea class="form-control has-feedback-left" name="alamat_peg" rows="3"
					placeholder="Alamat *"><?= set_value('alamat_peg')?></textarea>
				<span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
				<?= form_error('alamat_peg'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<select name="level" class="form-control">
					<option value="">Pilih Level * </option>
					<option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
					<option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Asisten Apoteker</option>
					<option value="3" <?= set_value('level') == 3 ? "selected" : null ?>>Kasir</option>
				</select>
				<?= form_error('level'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="hp_peg" type="text" value="<?= set_value('hp_peg')?>" class="form-control"
					id="inputSuccess5" placeholder="Phone *">
				<span class="fa fa-phone form-control-feedback right" aria-hidden="true"> </span>
				<?= form_error('hp_peg'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<select name="jk_peg" class="form-control">
					<option value="">Pilih Jenis Kelamin *</option>
					<option value="1" <?= set_value('jk_peg') == 1 ? "selected" : null ?>>Laki-Laki</option>
					<option value="2" <?= set_value('jk_peg') == 2 ? "selected" : null ?>>Perempuan</option>
				</select>
				<?= form_error('jk_peg'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="email" value="<?= set_value('email')?>" type="email" class="form-control" id="inputSuccess"
					placeholder="Email *">
				<span class="glyphicon glyphicon-envelope form-control-feedback right" aria-hidden="true"></span>
				<?= form_error('email'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input type="text" name="lhr_peg" class="form-control has-feedback-left" id="single_cal1" placeholder="First Name"
					aria-describedby="inputSuccess2Status">
				<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
				<span id="inputSuccess2Status" class="sr-only">(success)</span>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
				<input name="foto_peg" value="<?= set_value('foto_peg')?>" type="file" class="form-control"
					id="inputSuccess" placeholder="Foto">
				<span class="fa fa-photo form-control-feedback right" aria-hidden="true"> * </span>
				<?= form_error('foto_peg'); ?>
			</div>
			<div class="form-group"></div>
			<div class="ln_solid"></div>
			<div class="form-group">
				<div class="col-md-6 btn-center col-sm-6 col-xs-6">
					<a href=<?=site_url('user') ?> class="btn btn-primary btn-sm"><i class="fa fa-backward"></i>
						Back</button> </a>
					<button class="btn btn-default" type="reset"><i class="fa fa-times-circle"></i>Reset</button>
					<button type="submit" class="btn btn-success"> <i class="fa fa-paper-plane"></i> Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
