<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Form Edit Data Obat</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>    
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php 
				$id = $this->uri->segment(3); 
				$data = $this->db->query("SELECT * FROM dataobat WHERE kd_obat = '$id'")->row_array();
				?>
				<form action="javascript:void(0)" method="post" class="form-horizontal form-label-left" autocomplete="off" id="form_editobat">
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kd_obat">Kode Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="hidden" value="<?= $data['obat_id'] ?>" id="obat_id" name="obat_id">
							<input class="form-control col-md-7 col-xs-12" data-validate-length-range="1"
								data-validate-words="1" name="kd_obat" id="kd_obat"
								value="<?= set_value('kd_obat', $data['kd_obat']) ?>" type="text" readonly="">
							<?= form_error('kd_obat'); ?>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nm_obat">Nama Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="nm_obat" name="nm_obat" value="<?= set_value('nm_obat', $data['nm_obat']) ?>"
								class="form-control col-md-7 col-xs-12">
							<?= form_error('nm_obat'); ?>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Kategori Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select name="category" id="category" class="select2_single form-control">
								<option value="">-- Pilih Kategori Obat --</option>
								<?php foreach($category as $ct){ ?>
								<option value="<?= $ct['category_id'] ?>"
									<?= $ct['category_id'] == $data['category_id'] ? "selected" : null ?>>
									<?= $ct['name'] ?> </option>
								<?php  }?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="bentuk">Bentuk Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select name="bentuk" id="bentuk" class="select2_single form-control">
								<option value="">-- Pilih Bentuk Obat --</option>
								<?php foreach($bentuk as $ct){ ?>
								<option value="<?= $ct['bentuk_id'] ?>"
									<?= $ct['bentuk_id'] == $data['bentuk_id'] ? "selected" : null ?>>
									<?= $ct['name'] ?> </option>
								<?php  }?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="satuan">Satuan Obat</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select name="unit" id="unit" class="select2_single form-control">
								<option value="">-- Pilih Satuan Obat --</option>
								<?php foreach($unit as $ct){ ?>
								<option value="<?= $ct['unit_id'] ?>"
									<?= $ct['unit_id'] == $data['unit_id'] ? "selected" : null ?>> <?= $ct['name'] ?>
								</option>
								<?php  }?>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hrg_beli">Harga Beli
							(Rp)</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" name="hrgbeli_obat" id="hrgbeli_obat" value="<?= set_value('hrgbeli_obat', $data['hrgbeli_obat']) ?>"
								data-validate-minmax="10,1000000" class="form-control col-md-7 col-xs-12"
								placeholder="Masukkan harga beli">
							<?= form_error('hrgbeli_obat'); ?>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="stk_minimal">Stok Minimal
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" id="stk_minimal" name="stk_minimal"  value="<?= $data['minstk_obat'] ?>"
								class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<?php
                        $id = $this->uri->segment(3); 	
						$xs = $this->db->query("SELECT * FROM stokexpobat WHERE kd_obat = '$id'");
						$no=1; foreach ($xs->result_array() as $key => $data): 
                    ?>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-2 " for="minstk_obat<?php echo $no++; ?>">Kedaluwarsa
						</label>
						<div class="col-md-2 col-sm-2 form-group">
							<input type="date" id="tgl_exp<?php echo $no++; ?>" name="tgl_exp[]" value="<?= $data['tgl_exp']; ?>"
								class="form-control col-md-2 col-xs-2">
							<input type="hidden" name="no_stok[]" id="no_stok<?php echo $no++; ?>" value="<?= $data['no_stok']; ?>" >	
						</div>

						<label class="control-label col-md-2 col-sm" for="minstk_obat<?php echo $no++; ?>">Stok
						</label>
						<div class="col-md-2 col-sm-2 form-group">
							<input type="number" id="stok<?php echo $no++; ?>" name="stok[]" value="<?= $data['stok'] ?>" class="form-control">
						</div>
					</div>
					<?php endforeach ?>
					<div class="ln_solid"></div> 
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<a href="<?=site_url('obat') ?>"><button type="button"
									class="btn btn-danger">Batal</button></a>
							<button type="submit" id="simpan_obat" name="simpan_obat" class="btn btn-success">Simpan
								Obat</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$("#simpan_obat").click(function () {
		var kode = $("#kd_obat").val();
		var nama = $("#nm_obat").val();
		var exp = $("#ip_expobat").val();
		var ktg = $("#category").val();
		var bentuk = $("#bentuk").val();
		var satuan = $("#unit").val();
		var harga = $("#hrgbeli_obat").val();
		// var stok = $("#stok").val();
		var min_stok = $("#stk_minimal").val();

		if (nama == "") {
			document.getElementById("nm_obat").focus();
			Swal.fire(
				'Data Belum Lengkap',
				'maaf, tolong isi nama obat',
				'warning'
			)
		} else if (exp == "") {
			document.getElementById("ip_expobat").focus();
			Swal.fire(
				'Data Belum Lengkap',
				'maaf, tolong isi tanggal kadaluarsa obat',
				'warning'
			)
		} else if (ktg == "") {
			document.getElementById("category").focus();
			Swal.fire(
				'Data Belum Lengkap',
				'maaf, tolong pilih kategori obat',
				'warning'
			)
		} else if (bentuk == "") {
			document.getElementById("bentuk").focus();
			Swal.fire(
				'Data Belum Lengkap',
				'maaf, tolong pilih bentuk obat',
				'warning'
			)
		} else if (satuan == "") {
			document.getElementById("unit").focus();
			Swal.fire(
				'Data Belum Lengkap',
				'maaf, tolong pilih satuan penjualan obat',
				'warning'
			)
		} else if (harga == "" || harga <= 0) {
			document.getElementById("hrgbeli_obat").focus();
			Swal.fire(
				'Data Belum Lengkap',
				'maaf, tolong isi harga obat',
				'warning'
			)
		} else if (min_stok == "" || min_stok <= 0) {
			document.getElementById("stk_minimal").focus();
			Swal.fire(
				'Data Belum Lengkap',
				'maaf, tolong isi jumlah minimal stok obat',
				'warning'
			)
		} else {
			Swal.fire({
				title: 'Apakah Anda Yakin?',
				text: 'anda akan merubah data obat',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya'
			}).then((ya) => {
				if (ya.value) {
					var data_form = $("#form_editobat").serialize();
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('obat/edit_data_obat'); ?>",
						data: data_form,
						success: function (hasil) {
							if (hasil == "berhasil") {
								Swal.fire({
									title: 'Berhasil',
									text: 'Data Berhasil Diubah',
									icon: 'success',
									confirmButtonColor: '#3085d6',
									confirmButtonText: 'OK'
								}).then((ok) => {
									if (ok.value) {
										window.location = '<?php echo site_url('obat'); ?>';
									}
								})
							} else if (hasil == "gagal") {
								Swal.fire(
									'Gagal',
									'Data Gagal Diubah',
									'error'
								)
							}
						}
					})
					console.log(data_form);
				}
			})
		}
	})

	// data: "nama="+nama+"&kode="+kode+"&exp="+exp+"&ktg="+ktg+"&satuan="+satuan+"&harga="+harga+"&stok="+stok+"&bentuk="+bentuk+"&min_stok="+min_stok+"&kode="+kode,

</script>

