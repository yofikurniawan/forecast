<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Form Tambah Obat Baru</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<form action="<?=site_url('obat/proses_add_obat') ?>" method="post" class="form-horizontal form-label-left">
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kd_obat">Kode Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input class="form-control col-md-7 col-xs-12" data-validate-length-range="1"
								data-validate-words="1" name="kd_obat" value="<?= set_value('kd_obat')?>" type="text">
							<?= form_error('kd_obat'); ?>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nm_obat">Nama Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="nm_obat" name="nm_obat" value="<?= set_value('nm_obat')?>" 
								class="form-control col-md-7 col-xs-12">
							<?= form_error('nm_obat'); ?>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Kategori Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select name="category" id="category" class="select2_single form-control" 
								required="required">
								<option>-- Pilih Kategori Obat --</option>
								<?php foreach($category as $ct){ ?>
								<option value="<?= $ct['category_id'] ?>"><?= $ct['name'] ?></option>
								<?php  }?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="bentuk">Bentuk Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select name="bentuk" class="select2_single form-control" 
								required="required">
								<option value="">-- Pilih Bentuk Obat --</option>
								<?php foreach($bentuk as $ct){ ?>
								<option value="<?= $ct['bentuk_id'] ?>"><?= $ct['name'] ?></option>
								<?php  }?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="satuan">Satuan Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select name="unit" class="select2_single form-control"
								required="required">
								<option value="">-- Pilih Satuan Obat --</option>
								<?php foreach($unit as $ct){ ?>
								<option value="<?= $ct['unit_id'] ?>"><?= $ct['name'] ?></option>
								<?php  }?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kedaluwarsa">Tanggal
							Kedaluwarsa</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class='input-group date' id='myDatepicker2'>
								<input type="text" name="exp_obat" id="single_cal1" class="form-control" required>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga_beli">Harga Beli
							(Rp)</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number"  name="hrg_obat" value="<?= set_value('hrg_obat')?>"
								data-validate-minmax="10,1000000"  class="form-control col-md-7 col-xs-12" placeholder="Masukkan harga beli">
							<?= form_error('hrg_obat'); ?>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="stok">Stok
							</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number"  name="stok"  value="<?= set_value('stok')?>"
								class="form-control col-md-7 col-xs-12">
							<?= form_error('stok'); ?>	
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="stk_minimal">Stok Minimal
							</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number"  name="stk_minimal" value="<?= set_value('stk_minimal')?>"
								class="form-control col-md-7 col-xs-12">
							<?= form_error('stk_minimal'); ?>
						</div>
					</div>

					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<a href="<?=site_url('obat') ?>"><button type="button"class="btn btn-danger">Batal</button></a>
							<button type="submit" name="add" class="btn btn-success">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
