<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Form Peramalan Data Obat</h2>
				<ul class="nav navbar-right panel_toolbox">
					<a href=<?=site_url('peramalan/data_ramal') ?> class="btn btn-primary btn-sm">
						<i class="fa fa-book"></i> Data Peramalan
					</a>
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<form action="<?= base_url() ?>peramalan/hasil_peramalan" method="post"
					class="form-horizontal form-label-left">
					<div class="item form-group">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Data Obat</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="kd_obat" id="kd_obat" class="select2_single form-control"
									required="required">
									<option value="">-- Pilih Obat --</option>
									<?php foreach($obat->result_array() as $ct){ ?>
									<option value="<?= $ct['kd_obat'] ?>"><?= $ct['nm_obat'] ?></option>
									<?php  }?>
								</select>
							</div>
						</div>
						<?php 
                            $bulan_ini = date("m");
                            $tahun_ini = date("Y");
                            if($bulan_ini=="12") {
                                $bulan_depan = 1;
                                $tahun_depan = $tahun_ini+1;
                            } else {
                                $bulan_depan = $bulan_ini+1;
                                $tahun_depan = $tahun_ini;
                            }
					    ?>
						<div class="item form-group">
							<label for="ip_periode" class="control-label col-md-3 col-sm-3 col-xs-12">Periode
								Peramalan </label>
							<div class="col-sm-9">
								<div class="form-check">
									<label class="form-check-label" style="font-weight: normal;">
										<input name="ip_periode" id="ip_periode2" type="radio" required="required" 
											class="form-check-input flat" value="<?php echo bulan_indo($bulan_depan)." ".$tahun_depan; ?>">
										Bulan depan (<?php echo bulan_indo($bulan_depan)." ".$tahun_depan; ?>)
									</label>
								</div>
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<a href="<?=site_url('peramalan') ?>"><button type="button"
										class="btn btn-danger">Batal</button></a>
								<button type="submit" name="add" class="btn btn-success">Simpan</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
