<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<?php $oke = $this->expired_m->exp30()->num_rows(); ?>
				<h2>Info Kedaluwarsa<small>Jumlah <span class="badge"><?= $oke; ?></span></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<?php if ($oke > 0) {
            echo"
                <div class='alert alert-info col-lg-12 ' role='alert'>
					<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
					<span class='sr-only'>Info:</span>
					Kadaluarsa Obat Kurang Dari 30 Hari - 10 Hari
				</div>";
            } ?>
			<div class="x_content">
				<table class="table table-bordered table-striped">
					<thead>
						<tr class="bg-primary">
							<th>#</th>
							<th>Kode Obat</th>
							<th>Nama Obat</th>
							<th>Expired Obat</th>
							<th>Stok</th>
							<th>Satuan</th>
							<th>Kategori</th>
							<th>Sisa Hari</th>
							<?php if($this->session->userdata('level') == 1 OR $this->session->userdata('level') == 2 ) { ?>
							<th class="text-center">Kosongkan</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($Tigapuluh->result() as $key => $data): 
                        $exp = date_create($data->tgl_exp);
					    $today = date_create(date("Y-m-d"));
					    $sisa = date_diff($today,$exp);
					    $sisa_hari = $sisa->format("%a");
                        ?>
						<tr>
							<td style="width:5%;"><?= $no++; ?></td>
							<td style=""><?= $data->kd_obat ?></td>
							<td style=""><?= strtoupper($data->nm_obat) ?></td>
							<td style=""><?= date_indo($data->tgl_exp) ?></td>
							<td style=""><?= $data->stok ?></td>
							<td style=""><?= strtoupper($data->unit_name) ?></td>
							<td style=""><?= strtoupper($data->category_name) ?></td>
							<td style=""><?= $sisa_hari ?> Hari</td>
							<?php if($this->session->userdata('level') == 1 OR $this->session->userdata('level') == 2 ) { ?>
							<td class="text-center" width="">
								<button class="btn btn-danger btn-xs" title="kosongkan"
									id="tombol_kosongkan<?php echo $data->kd_obat; ?>" name="tombol_kosongkan"
									data-kd_obat="<?php echo $data->kd_obat; ?>"
									data-tgl_exp="<?php echo $data->tgl_exp; ?>"
									data-nm_obat="<?php echo $data->nm_obat ?>" data-stok="<?php echo $data->stok ?>">
									<i class="fa fa-trash"></i>
								</button>
							</td>
							<?php } ?>
						</tr>
						<?php endforeach ?>
						<?php 
                        if ($this->expired_m->exp30()->num_rows() < 1) {
                            echo"
                            <tr class='odd'>
							<td valign='top' colspan='10' class='dataTables_empty'>Data Expired Obat yang Kurang Dari 30 - 10 Hari Tidak Ada.</td>
						</tr>";
                        }
                        ?>
					</tbody>
				</table>
				<div class="container-fluid mt-3">
					<b>Pemberitahuan :</b>
					<table>
						<tr>
							<td width="100px">
								Status
							</td>
							<td>
								Untuk mengkosongkan stok obat harap melaporkan dulu ke pemliki apotek atau Asisten
								apotek.
							</td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td></td>
						</tr>
					</table>
				</div>

			</div>
		</div>
	</div>
	<!--  -->

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<?php $ok = $this->expired_m->exp10()->num_rows(); ?>
				<h2>Info Kedaluwarsa < 10 Hari<small>Jumlah <span class="badge"><?= $ok; ?></span></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<?php if ($ok > 0) {
            echo"
                <div class='alert alert-warning' role='alert'>
					<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
					<span class='sr-only'>Error:</span>
					Kadaluarsa Obat Kurang Dari 10 Hari
				</div>";
            } ?>
			<div class="x_content">
				<table class="table table-striped">
					<thead>
						<tr class="bg-warning">
							<th>#</th>
							<th>Kode Obat</th>
							<th>Nama Obat</th>
							<th>Expired Obat</th>
							<th>Stok</th>
							<th>Satuan</th>
							<th>Kategori</th>
							<th>Sisa Hari</th>
							<?php if($this->session->userdata('level') == 1 OR $this->session->userdata('level') == 2 ) { ?>
							<th class="text-center">Kosongkan</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($sepuluh->result() as $key => $ok): 
                        $exp = date_create($ok->tgl_exp);
					    $today = date_create(date("Y-m-d"));
					    $sisa = date_diff($today,$exp);
					    $sisa_hari = $sisa->format("%a");
                        ?>
						<tr>
							<td style="width:5%;"><?= $no++; ?></td>
							<td style=""><?= $ok->kd_obat ?></td>
							<td style=""><?= strtoupper($ok->nm_obat) ?></td>
							<td style=""><?= date_indo($ok->tgl_exp) ?></td>
							<td style=""><?= $ok->stok ?></td>
							<td style=""><?= strtoupper($ok->unit_name) ?></td>
							<td style=""><?= strtoupper($ok->category_name) ?></td>
							<td style=""><?= $sisa_hari ?> Hari</td>
							<?php if($this->session->userdata('level') == 1 OR $this->session->userdata('level') == 2 ) { ?>
							<td class="text-center" width="">
								<button class="btn btn-danger btn-xs" title="kosongkan"
									id="tombol_kosongkan<?php echo $ok->kd_obat; ?>" name="tombol_kosongkan"
									data-kd_obat="<?php echo $ok->kd_obat; ?>"
									data-tgl_exp="<?php echo $ok->tgl_exp; ?>" data-nm_obat="<?php echo $ok->nm_obat ?>"
									data-stok="<?php echo $ok->stok ?>">
									<i class="fa fa-trash"></i>
								</button>
							</td>
							<?php } ?>
						</tr>
						<?php endforeach ?>
						<?php 
                        if ($this->expired_m->exp10()->num_rows() < 1) {
                            echo"
                            <tr class='odd'>
							<td valign='top' colspan='10' class='dataTables_empty text-danger'>Data Expired Obat yang Kurang Dari 10 Hari Tidak Ada.</td>
						</tr>";
                        }
                        ?>
					</tbody>
				</table>
				<div class="container-fluid mt-3">
					<b>Pemberitahuan :</b>
					<table>
						<tr>
							<td width="100px">
								Status
							</td>
							<td>
								Untuk mengkosongkan stok obat harap melaporkan dulu ke pemliki apotek atau Asisten
								apotek.
							</td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<?php $exp = $this->expired_m->expired()->num_rows(); ?>
				<h2>Info Kedaluwarsa<small>Jumlah <span class="badge"><?= $exp; ?></span></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<?php if ($exp > 0) {
            echo"
                <div class='alert alert-danger'>
                    <h4><i class='fa fa-warning'></i> Peringatan!</h4> Obat sudah kedaluwarsa. Harap Mengkosongkan Stok Obat Tersebut.
                </div> ";
            } ?>
			<div class="x_content">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
					cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Obat</th>
							<th>Nama Obat</th>
							<th>Expired Obat</th>
							<th>Stok</th>
							<th>Satuan</th>
							<th>Kategori</th>
							<th>Lama Kadaluarsa</th>
							<?php if($this->session->userdata('level') == 1 OR $this->session->userdata('level') == 2 ) { ?>
							<th class="text-center">Kosongkan</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($expired->result() as $key => $data): 
                        $exp = date_create($data->tgl_exp);
					    $today = date_create(date("Y-m-d"));
					    $sisa = date_diff($today,$exp);
					    $sisa_hari1 = $sisa->format("%a");
                    ?>
						<tr>
							<th scope="row"><?= $no++ ?></th>
							<td style=""><?= $data->kd_obat ?></td>
							<td style=""><?= strtoupper($data->nm_obat) ?></td>
							<td style=""><?= date_indo($data->tgl_exp) ?></td>
							<td style=""><?= $data->stok ?></td>
							<td style=""><?= strtoupper($data->unit_name) ?></td>
							<td style=""><?= strtoupper($data->category_name) ?></td>
							<td style=""><?= $sisa_hari1 ?> Hari</td>
							<?php if($this->session->userdata('level') == 1 OR $this->session->userdata('level') == 2) { ?>
							<td class="text-center" width="">
								<button class="btn btn-danger btn-xs" title="kosongkan"
									id="tombol_kosongkan<?php echo $data->kd_obat; ?>" name="tombol_kosongkan"
									data-kd_obat="<?php echo $data->kd_obat; ?>"
									data-tgl_exp="<?php echo $data->tgl_exp; ?>"
									data-nm_obat="<?php echo $data->nm_obat ?>" data-stok="<?php echo $data->stok ?>">
									<i class="fa fa-trash"></i>
								</button>
							</td>
							<?php } ?>
						</tr>
					</tbody>
					<?php endforeach ?>
				</table>
				<div class="container-fluid mt-3">
					<b>Pemberitahuan :</b>
					<table>
						<tr>
							<td width="100px">
								Status
							</td>
							<td>
								Untuk mengkosongkan stok obat harap melaporkan dulu ke pemliki apotek atau Asisten
								apotek.
							</td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="clearfix"></div>

</div>
</div>

<script>
	$(" [name='tombol_kosongkan']").click(function () {
		var kd_obat = $(this).data('kd_obat');
		var nm_obat = $(this).data('nm_obat');
		var tgl_exp = $(this).data('tgl_exp');
		var stok = $(this).data('stok');
		Swal.fire({
			title: 'Apakah Anda Yakin?',
			text: 'Anda akan mengosongkan stok ' + nm_obat + ' dengan tanggal kadaluarsa ' + tgl_exp +
				'. Tindakan ini tidak akan dapat diubah kembali',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya'
		}).then((hapus) => {
			if (hapus.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('expired/kosongkan_stok'); ?>",
					data: " &kd_obat=" + kd_obat + "&tgl_exp=" + tgl_exp + "&stok=" + stok,
					success: function (hasil) {
						console.log(hasil);
						Swal.fire({
							title: 'Berhasil',
							text: 'Stok ' + nm_obat +
								' untuk tanggal kadaluarsa ' + tgl_exp +
								' tersebut telah kosong',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'OK'
						}).then((ok) => {
							if (ok.value) {
								window.location = '<?php echo site_url('expired'); ?>';
							}
						})
					}
				})
			}
		})
	});
</script>