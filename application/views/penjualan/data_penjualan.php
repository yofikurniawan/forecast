<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Penjualan<small>Obat</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
					cellspacing="4" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>No Penjualan</th>
							<th>Tanggal Penjualan</th>
							<th>Pegawai</th>
							<th>Total Penjualan</th>
							<th class="text-center">Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($obat->result() as $key => $data_pjl): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data_pjl->no_penjualan ?></td>
							<td><?php echo $data_pjl->tgl_penjualan ?></td>
							<td><?php echo $data_pjl->nama_peg ?></td>
							<td class="text-right">Rp <?php echo number_format($data_pjl->total_penjualan,0,".","."); ?>
							</td>
							<td class="td-opsi text-center">
								<button class="btn-transition btn btn-default btn-sm" title="detail penjualan"
									id="tombol_detail" name="tombol_detail"
									data-nopjl="<?php echo  $data_pjl->no_penjualan ?>"
									data-tglpjl="<?php echo date_indo($data_pjl->tgl_penjualan); ?>"
									data-nmpeg="<?php echo $data_pjl->nama_peg ?>"
									data-tunai="<?php echo $data_pjl->tunai ?>"
									data-kembali="<?php echo $data_pjl->kembali ?>" data-toggle="modal"
									data-target="#detail_penjualan">
									<i class="fa fa-info-circle"></i>
								</button>
								<a href="<?=site_url("penjualan/laporan_penjualan/$data_pjl->no_penjualan") ?>"
									target="_blank">
									<button class="btn-transition btn btn-success btn-sm" title="cetak"
										id="tombol_cetak" name="tombol_cetak">
										<i class="fa fa-print"></i>
									</button>
								</a>
								<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
								<button class="btn-transition btn btn-danger btn-sm" title="hapus" id="tombol_hapus"
									name="tombol_hapus" data-nopjl="<?php echo $data_pjl->no_penjualan ?>">
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
                            <td>
                                
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
</div>


<div class="modal fade" id="detail_penjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Data Detail Penjualan Obat</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover">
					<tr>
						<th>No Penjualan</th>
						<td id="no_penjualandetail">PJL00001</td>
						<th>Tanggal</th>
						<td id="tgl_penjualandetail">20/11/19</td>
					</tr>
					<tr>
						<th>Nama Pegawai</th>
						<td id="nama_pegdetail">Yofi  Kurniawan</td>
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
					<tbody id="data_detailpjl">
						<!-- diisi dengan ajax jquery -->
					</tbody>
					<tfoot>
						<tr>
							<th colspan="4" class="text-right">Total :<br>Tunai :<br>Kembali :</th>
							<th class="text-right">
								<span id="total_penjualandetail"></span><br>
								<span id="tunai_penjualandetail"></span><br>
								<span id="kembali_penjualandetail"></span>
							</th>
						</tr>
						<!-- <tr>
						<th colspan="4" class="text-right">Tunai :</th>
						<th class="text-right">
							<span id="tunai_penjualandetail"></span>
						</th>
					</tr> -->
					</tfoot>
				</table>
			</div>
			<div class="modal-footer">
        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Close</button>
        </div>
		</div>
	</div>
</div>



<script>
	$("button[name='tombol_detail']").click(function () {
		var no_pjl = $(this).data("nopjl");
		var tgl_pjl = $(this).data("tglpjl");
		var nm_peg = $(this).data("nmpeg");
		var tunai = $(this).data("tunai");
		var kembali = $(this).data("kembali");
		$("#no_penjualandetail").html(no_pjl);
		$("#tgl_penjualandetail").html(tgl_pjl);
		$("#nama_pegdetail").html(nm_peg);
		$("#tunai_penjualandetail").html(tunai);
		$("#kembali_penjualandetail").html(kembali);
		$("#data_detailpjl").html("");
		$.ajax({
			type: "GET",
			url: "<?php echo site_url('penjualan/detail'); ?>",
			data: {'no_pjl': no_pjl},
			success: function (data) {
				// console.log(data);
				var total_penjualan = 0;
				var objData = JSON.parse(data);
				$.each(objData, function (key, val) {
					// $("#data_detailpjl").append(val.nm_obat+"/"+val.hrg_jual+"/"+val.jml_jual+"/"+val.sat_jual+"/"+val.subtotal+"<br>");
					var baris_baru = '';
					baris_baru += '<tr>';
					baris_baru += '<td>' + val.nm_obat + '</td>';
					baris_baru += '<td >' + val.hrg_jual + '</td>';
					baris_baru += '<td class="text-center">' + val.jml_jual + '</td>';
					baris_baru += '<td>' + val.sat_jual + '</td>';
					baris_baru += '<td class="text-right">' + val.subtotal + '</td>';
					baris_baru += '</tr>';

					total_penjualan = total_penjualan + Number(val.subtotal);
					$("#data_detailpjl").append(baris_baru);
					$("#total_penjualandetail").html(total_penjualan);
				})
			}
		});
	});

	$("button[name='tombol_hapus']").click(function () {
		var no_pjl = $(this).data("nopjl");
		Swal.fire({
			title: 'Apakah Anda Yakin?',
			text: 'anda akan menghapus data penjualan ' + no_pjl +
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
					url: "<?php echo site_url('penjualan/hapus_penjualan_obat'); ?>",
					data: {
               			'id': no_pjl
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
								location.reload();
							}
						})
					}
				})
			}
		})
	});
</script>
