<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Peramalan Obat <small></small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap "
					cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Kode Obat</th>
							<th>Bulan Tahun Ramal</th>
							<th>Data Peramalan</th>
							<th>Tanggal Meramal</th>
							<th>User</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($ramal->result() as $key => $data): ?>
						<tr>
							<td style="width:5%;"><?= $no++; ?></td>
							<td><?= $data->kd_obat; ?></td>
							<td class="text-right"><?= $data->bulan_tahun; ?></td>
							<td class="text-right"><?= $data->data_ramal; ?></td>
							<td><?= date_indo($data->tanggal); ?></td>
							<?php 
							if($data->level == 1){
								$oke="Admin";
							}else {
								$oke ="Asisten Apotek";
							}
							?>
							Apotek</a>
							<td><?= $data->nama_peg; ?> (<?=  ($oke); ?>)</td>
							<td class="text-center" width="160px">
								<a href="#modalDelete" data-toggle="modal"
									onclick="$('#modalDelete #formDelete').attr('action', '<?=site_url('peramalan/del/'.$data->id_peramalan) ?>')"
									class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>
							</td>
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
