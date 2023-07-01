<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Obat <small></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
                    <?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
					<a href=<?=site_url('obat/tambah_data_obat') ?> class="btn btn-primary btn-sm">
						<i class="fa fa-plus-circle"></i> Tambah Data Obat
					</a>
                    <?php } ?>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap "
					cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Obat</th>
							<th>Nama Obat</th>
							<th>Harga</th>
							<th>Stok</th>
                            <th>Satuan</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($row->result() as $key => $data): ?>
						<tr>
							<td style="width:5%;"><?= $no++; ?></td>
							<td><?= $data->kd_obat ?></td>
							<td><?= strtoupper($data->nm_obat); ?></td>
							<td><?= $data->hrg_obat ?></td>
							<td><?= $data->stk_obat ?></td>
							<td><?= strtoupper($data->unit_name);  ?></td>
							<td class="text-center" width="160px">
                                <a id="detail1" class="btn btn-primary btn-xs" 
                                    data-toggle="modal" data-target="#modal-detail"
                                    data-kd_obat="<?=$data->kd_obat ?>"
                                    data-nm_obat="<?=$data->nm_obat ?>"
                                    data-hrg_obat="Rp.<?=$data->hrg_obat ?>"
                                    data-stk_obat="<?=$data->stk_obat ?>"
                                    data-unit_name="<?=$data->unit_name ?>"
                                    data-category_name="<?=$data->category_name ?>"
                                    data-bentuk_name="<?=$data->bentuk_name ?>"
                                    data-hrgbeli_obat="Rp.<?=$data->hrgbeli_obat ?>"
                                    data-minstk_obat="<?=$data->minstk_obat ?>">
                                    <i class="fa fa-folder"></i> Details
                                </a> 
                                <?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?> 
								<a href="<?=site_url('obat/edit_obat/'.$data->kd_obat) ?>"
									class="btn btn-success btn-xs">
									<i class="fa fa-edit"></i> Edit 
                                </a>
								<!-- <a href="<?=site_url('obat/del/'.$data->obat_id) ?>" class="btn btn-danger btn-sm tombol-verifikasi"><i class="fa fa-trash"></i> Delete </a> -->
								<a href="#modalDelete" data-toggle="modal"
									onclick="$('#modalDelete #formDelete').attr('action', '<?=site_url('obat/deleteObat/'.$data->obat_id) ?>')"
									class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete 
                                </a>
                                <?php } ?>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Select Delete -->
<div class="modal fade" id="modalDelete">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center">Ingin Menghapus Data Ini?</h4>
			</div>
			<div class="modal-footer">
				<form id="formDelete" action="" method="post">
					<button class="btn btn-info" data-dismiss="modal">Tidak</button>
					<button class="btn btn-danger" type="submit">Hapus</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Akhir delete Modal SeLect -->

<!-- Modal Select Detail-->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">Detail Data Obat</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-dark">
                    <tbody>
                        <tr>
                            <th style="">Kode Obat</th>
                            <td> <span id="kd_obat"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Nama Obat</th>
                            <td> <span id="nm_obat"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Harga Obat</th>
                            <td> <span id="hrg_obat"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Stok Obat</th>
                            <td> <span id="stk_obat"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Satuan Jual</th>
                            <td> <span id="unit_name"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Bentuk</th>
                            <td> <span id="bentuk_name"> </span></td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold" style="">Kategori</th>
                            <td> <span id="category_name"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Harga Beli Obat</th>
                            <td> <span id="hrgbeli_obat"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Minimal Stok Obat</th>
                            <td> <span id="minstk_obat"> </span></td>
                        </tr>
                        <tr>
                            <th style="">Expired Obat (Stok)</th>
                            <td> <span id="exp_obat"> </span></td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div>
    </div>
</div>
<!-- Akhir Modal SeLect -->

<!-- Script Detail-->
<script>
$(document).ready(function() {
    $(document).on('click', '#detail1', function() {
        var kd_obat = $(this).data('kd_obat');
        var nm_obat = $(this).data('nm_obat');
        var hrg_obat = $(this).data('hrg_obat');
        var stk_obat = $(this).data('stk_obat');
        var unit_name = $(this).data('unit_name');
        var bentuk_name = $(this).data('bentuk_name');
        var category_name = $(this).data('category_name');
        var hrgbeli_obat = $(this).data('hrgbeli_obat');
        var minstk_obat = $(this).data('minstk_obat');

        $('#kd_obat').text(kd_obat);
        $('#nm_obat').text(nm_obat);
        $('#hrg_obat').text(hrg_obat);
        $('#stk_obat').text(stk_obat);
        $('#unit_name').text(unit_name);
        $('#bentuk_name').text(bentuk_name);
        $('#category_name').text(category_name);
        $('#hrgbeli_obat').text(hrgbeli_obat);
        $('#minstk_obat').text(minstk_obat);
        $('#exp_obat').text(" ");
        $.ajax({
        type: "GET",
        url: "<?php echo site_url('obat/ajax'); ?>",
        data: {
                'kd_obat': kd_obat
            },
        success: function(data_expstok) {
            //console.log(data_expstok);
            var objData = JSON.parse(data_expstok);
            $.each(objData, function(key, val) {
                $("#exp_obat").append(val.tgl_exp+" ("+val.stok+")<br>");
            })
        }
        });
        $('#modal-item').modal('hide');
    })
})
</script>