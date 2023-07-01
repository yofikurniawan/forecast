<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Supplier <small></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
					<a href=<?=site_url('supplier/add_supplier') ?> class="btn btn-primary btn-sm">
						<i class="fa fa-plus-circle"></i> Tambah Data Supplier
					</a>
					<?php } ?>
					<a target="_blank" href=<?=site_url('supplier/laporan_supplier') ?> class="btn btn-default btn-sm">
						<i class="fa fa-print"></i> Print
					</a>
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
							<th>Nama Supplier</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>Contact Person</th>
							<th>Deskripsi</th>
							<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
							<th>Actions</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($row->result() as $key => $data): ?>
						<tr>
							<td style="width:5%;"><?= $no++; ?></td>
							<td><?= $data->name ?></td>
							<td><?= $data->alamat ?></td>
							<td><?= $data->email ?></td>
							<td><?= $data->phone ?></td>
							<td><?= $data->deskripsi  ?></td>
							<?php if($this->fungsi->user_login()-> level == 1 OR $this->fungsi->user_login()-> level == 2 ) { ?>
							<td class="text-center" width="160px">
								<a href="<?=site_url('supplier/edit_supplier/'.$data->supplier_id) ?>"
									class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i> Edit </a>
								<!-- <a href="<?=site_url('supplier/del/'.$data->supplier_id) ?>" class="btn btn-danger btn-sm tombol-verifikasi"><i class="fa fa-trash"></i> Delete </a> -->

								<a href="#modalDelete" data-toggle="modal"
									onclick="$('#modalDelete #formDelete').attr('action', '<?=site_url('supplier/del/'.$data->supplier_id) ?>')"
									class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>
							</td>
							<?php } ?>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal Select -->
<div class="modal fade" id="modalDelete">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Ingin Menghapus Data Ini?</h4>
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
<!-- Akhir Modal SeLect -->
