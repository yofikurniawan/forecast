<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?= ucfirst($page) ?> unit <small></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />

				<form action="<?= site_url('unit/process') ?>" method="post" id="demo-form2" data-parsley-validate
					class="form-horizontal form-label-left">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name unit <span
								class="required text-danger">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="hidden" name="id" value="<?= $row->unit_id?>">
							<input type="text" name="name" value="<?= $row->name ?>" id="first-name" required="required"
								class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<a href="<?php echo base_url('unit') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
							<button type="submit" name="<?=$page?>" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
