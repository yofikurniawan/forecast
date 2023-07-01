<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Pembelian Obat Lunas<small><span class="badge"><?= $lunas; ?></span></small></h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap tabel-data"
			cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>No Faktur</th>
					<th>Tanggal</th>
					<th>Supplier</th>
					<th>Total</th>
					<th>Status</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $no = 1;
                foreach($querylunas->result_array() as $dlunas):
            ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?php echo $dlunas['no_faktur']; ?></td>
					<td class="text-center"><?php echo $dlunas['tgl_pembelian']; ?></td>
					<td><?php echo $dlunas['name']; ?></td>
					<td class="text-right"><?php echo $dlunas['total_pembelian']; ?></td>
					<td class="text-center"><span
							class="badge alert-success"><?php echo $dlunas['status_byr']; ?></span>
					</td>
					<td class="td-opsi text-center">
						<form action="<?php echo site_url('pembelian/nota_pembelian') ?>/<?php echo $dlunas['no_faktur']; ?>" method="post" target="_blank">
							<input type="hidden" name="no_faktur" value="<?php echo $dlunas['no_faktur']; ?>">
							<button class="btn-transition btn btn-dark btn-sm" title="cetak" id="tombol_cetak"
								name="tombol_cetak">
								<i class="fa fa-print"></i>
							</button>
						</form>
						<button class="btn-transition btn btn-primary btn-sm" title="detail obat" id="tombol_detail"
							name="tombol_detail" data-toggle="modal" data-target="#detail_pembelian"
							data-no_faktur="<?php echo $dlunas['no_faktur']; ?>"
							data-tgl_pembelian="<?php echo tgl_indo($dlunas['tgl_pembelian']); ?>"
							data-nama_supp="<?php echo $dlunas['name']; ?>"
							data-status_byr="<?php echo $dlunas['status_byr']; ?>">
							<i class="fa fa-info-circle"></i>
						</button>

						<?php if($this->session->userdata('level') == 1 OR $this->session->userdata('level') == 2 ) { ?>
						<button class="btn-transition btn btn-danger btn-sm" title="hapus" id="tombol_hapus"
							name="tombol_hapus" data-no_faktur="<?php echo $dlunas['no_faktur']; ?>">
							<i class="fa fa-trash"></i>
						</button>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<div class="container-fluid mt-3">
			<b>Pemberitahuan :</b>
				<table>
						<tr>
							<td width="100px">
								Status
							</td>
							<td class="text-left">
								
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

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Pembelian Obat Utang<small><span class="badge"><?= $utang; ?></span></small></h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap tabel-data"
			cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>No Faktur</th>
					<th>Tanggal</th>
					<th>Supplier</th>
					<th>Total</th>
					<th>Status</th>
					<th>Jth Tempo</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $no = 1;
                foreach($queryutang->result_array() as $dutang):
            ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $dutang['no_faktur']; ?></td>
					<td class="text-center"><?php echo $dutang['tgl_pembelian']; ?></td>
					<td><?php echo $dutang['name']; ?></td>
					<td class="text-right"><?php echo $dutang['total_pembelian']; ?></td>
					<td class="text-center"><span
							class="badge alert-danger"><?php echo $dutang['status_byr']; ?></span>
					</td>
					<td class="text-center"><?php echo $dutang['jth_tempo']; ?></td>
					<td class="td-opsi text-center">
						<button class="btn-transition btn btn-primary btn-sm" title="detail obat" id="tombol_detail"
							name="tombol_detail" data-toggle="modal" data-target="#detail_pembelian"
							data-no_faktur="<?php echo $dutang['no_faktur']; ?>"
							data-tgl_pembelian="<?php echo tgl_indo($dutang['tgl_pembelian']); ?>"
							data-nama_supp="<?php echo $dutang['name']; ?>"
							data-status_byr="<?php echo $dutang['status_byr']; ?>">
							<i class="fa fa-info-circle"></i>
						</button>
						<!-- <a href="laporan/?page=nota_pembelian&no_faktur=" target="_blank">
                                    <button class="btn-transition btn btn-outline-dark btn-sm" title="cetak" id="tombol_cetak" name="tombol_cetak">
                                        <i class="fa fa-print"></i>
                                    </button>
                                    </a>-->
						<?php if($this->session->userdata('level') == 1 OR $this->session->userdata('level') == 2 ) { ?>
						<button class="btn-transition btn btn-success btn-sm" title="pelunasan" id="tombol_pelunasan"
							name="tombol_pelunasan" data-no_faktur="<?php echo $dutang['no_faktur']; ?>"
							data-nama_supp="<?php echo $dutang['name']; ?>">
							<i class="fa fa-check-square"></i>
						</button>
						<button class="btn-transition btn btn-danger btn-sm" title="hapus" id="tombol_hapus"
							name="tombol_hapus" data-no_faktur="<?php echo $dutang['no_faktur']; ?>">
							<i class="fa fa-trash"></i>
						</button>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		</div>
		<div class="container-fluid mt-3">
			<b>Pemberitahuan :</b>
				<table>
						<tr>
							<td width="100px">
								Status
							</td>
							<td class="text-left">
								Untuk melakukan pelunasan pembelian obat harap melaporkan dulu ke asisten apotek atau pemilik
								apotek.
							</td>
						</tr>
						<tr>
							<td>&nbsp</td>
							<td></td>
						</tr>
				</table>
		</div>
		<div class="clearfix"></div>
	</div>
</div>


<div class="modal fade" id="detail_pembelian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Detail Obat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table">
					<tr>
						<th>No Faktur</th>
						<td id="no_fakturdetail">PJL00001</td>
						<th>Tanggal</th>
						<td id="tgl_pembeliandetail">20/11/19</td>
					</tr>
					<tr>
						<th>Supplier</th>
						<td id="nm_supplierdetail">Yofi Kurniawan</td>
						<th>Status</th>
						<td id="status_pembeliandetail">Lunas</td>
					</tr>
				</table>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nama Obat</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Satuan</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody id="data_detailpembelian">
						<!-- diisi dengan ajax jquery -->
					</tbody>
					<tfoot>
						<tr>
							<th colspan="4" class="text-right">Total :</th>
							<th class="text-right">
								<span id="total_pembeliandetail"></span>
							</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div> -->
		</div>
	</div>
</div>


<script>
	$("button[name='tombol_detail']").click(function () {
		var no_faktur = $(this).data("no_faktur");
		var tgl_pembelian = $(this).data("tgl_pembelian");
		var nama_supp = $(this).data("nama_supp");
		var status_byr = $(this).data("status_byr");
		$("#no_fakturdetail").html(no_faktur);
		$("#tgl_pembeliandetail").html(tgl_pembelian);
		$("#nm_supplierdetail").html(nama_supp);
		$("#status_pembeliandetail").html(status_byr);

		$("#data_detailpembelian").html("");
		$.ajax({
			type: "GET",
			url: "<?php echo site_url('pembelian/detail'); ?>",
			data: {
				'no_faktur': no_faktur
			},
			success: function (data) {
				console.log(data);
				var total_pembelian = 0;
				var objData = JSON.parse(data);
				$.each(objData, function (key, val) {
					// $("#data_detailpjl").append(val.nm_obat+"/"+val.hrg_jual+"/"+val.jml_jual+"/"+val.sat_jual+"/"+val.subtotal+"<br>");
					var baris_baru = '';
					baris_baru += '<tr>';
					baris_baru += '<td>' + val.nm_obat + '</td>';
					baris_baru += '<td class="">' + val.hrg_beli + '</td>';
					baris_baru += '<td class="text-center">' + val.jml_beli + '</td>';
					baris_baru += '<td>' + val.sat_beli + '</td>';
					baris_baru += '<td class="text-right">' + val.subtotal + '</td>';
					baris_baru += '</tr>';
					total_pembelian = total_pembelian + Number(val.subtotal);
					$("#data_detailpembelian").append(baris_baru);
					$("#total_pembeliandetail").html(total_pembelian);
				})
			}
		});
	});

	$("button[name='tombol_hapus']").click(function () {
		var no_faktur = $(this).data("no_faktur");
		Swal.fire({
			title: 'Apakah Anda Yakin?',
			text: 'anda akan menghapus data pembelian ' + no_faktur +
				', anda tidak dapat mengembalikan data yang telah dihapus.',
			icon: 'warning',
			showCancelButton: true,
			cancelButtonColor: '#d33',
			confirmButtonColor: '#3085d6',
			cancelButtonText: 'Tidak',
			confirmButtonText: 'Hapus'
		}).then((hapus) => {
			if (hapus.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('pembelian/hapus'); ?>",
					data: {
						'id': no_faktur
					},
					success: function (hasil) {
						Swal.fire({
							title: 'Berhasil',
							text: 'Data Berhasil Dihapus',
							icon: 'success',
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'OK'
						}).then((ok) => {
							if (ok.value) {
								window.location = '';
							}
						})
					}
				})
			}
		})
	});

	$("button[name='tombol_pelunasan']").click(function () {
				var no_faktur = $(this).data("no_faktur");
				var nama_supp = $(this).data("nama_supp");
				Swal.fire({
					title: 'Apakah Anda Yakin?',
					text: 'anda telah melunasi pembelian ' + no_faktur + ' dengan pihak ' + nama_supp +
						', data ini tidak dapat dirubah kembali.',
					icon: 'warning',
					showCancelButton: true,
					cancelButtonColor: '#d33',
					confirmButtonColor: '#28A745',
					cancelButtonText: 'Tidak',
					confirmButtonText: 'Lunas'
				}).then((lunas) => {
						if (lunas.value) {
							$.ajax({
									type: "POST",
									url: "<?php echo site_url('pembelian/pelunasan'); ?>",
									data: {
										'no_faktur': no_faktur
									},
									success: function (hasil2) {
										Swal.fire({
											title: 'Berhasil',
											text: 'Pembelian Telah Lunas',
											icon: 'success',
											confirmButtonColor: '#3085d6',
											confirmButtonText: 'OK'
										}).then((ok_lunas) => {
												if (ok_lunas.value) {
													window.open(
														"<?= site_url('pembelian/nota_pembelian')?>/"+no_faktur);
														window.location = '';
													}
												})
										}
									})
							}
						})
				});
</script>
