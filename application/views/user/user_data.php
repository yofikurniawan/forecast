<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Pegawai <small></small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<!-- Jika Level 1/Admin Maka Munculkan Tombol Tambah User -->
					<?php if($this->fungsi->user_login()-> level == 1 ) { ?>
					<a href=<?=site_url('user/add_user') ?> class="btn btn-primary btn-sm">
						<i class="fa fa-plus-circle"></i> Tambah Pegawai
					</a>
					<?php } ?>
					<!-- Penutup -->
					<?php if($this->fungsi->user_login()-> level == 1 ) { ?>
					<a target="_blank" href=<?=site_url('user/laporan_user') ?> class="btn btn-default btn-sm">
						<i class="fa fa-print"></i> Print
					</a>
					<?php } ?>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
					cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Name</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>Jabatan</th>
							<th>No HP</th>
							<th>Email</th>
							<th>Tanggal Lahir Pegawai</th>
							<th>Foto</th>
							<?php if($this->session->userdata('level') == 1 ) { ?>
							<!-- Level Admin -->
							<th>Actions</th>
							<!-- Akhir Level Admin -->
							<?php }else { ?>
								<th>Edit</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($user->result() as $key => $data): ?>
						<tr>
							<td style="width:5%;"><?= $no++; ?></td>
							<td><?= $data->username ?></td>
							<td><?= strtoupper($data->nama_peg) ?></td>
							<td><?= $data->jk_peg == 1 ? 'Laki-laki' : 'Perempuan' ?></td>
							<td><?= $data->alamat_peg ?></td>
							<td>
								<?php 
									if($data->level == 1) {
										echo"Admin/Pemilik";
										}else if($data->level == 2) {
											echo"Asisten Apoteker";
										}else if ($data->level == 3) {
											echo"Kasir";
										}else {
											echo"Tidak diketahui";
										}
								?>
							</td>
							<td><?= $data->hp_peg ?></td>
							<td><?= $data->email ?></td>
							<td><?= date_indo($data->lhr_peg) ?></td>
							<td><img src="<?php echo base_url() ?>assets/images/<?= $data->foto_peg; ?>" width="90" height="90">
							</td>
							<!-- Level Admin -->
							
							<td class="text-center" width="160px">
								<?php  if($data->user_id == $this->fungsi->user_login()->user_id OR $this->session->userdata('level') == 1 ) {  ?>
								<a href="<?=site_url('user/edit/'.$data->user_id) ?>" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i> Edit </a>
								<?php } ?>
								<!-- else -->
								<?php  if($data->user_id != $this->fungsi->user_login()->user_id AND $this->session->userdata('level') != 1 ) {  ?>
								<span class="label label-danger">Tidak Bisa Edit, Karena Bukan Data Anda !!!</span>
								<?php } ?>
								<!-- akhir -->
								<?php if($this->session->userdata('level') == 1 ) { ?>
								<a href="<?=site_url('user/del/'.$data->user_id) ?>"
									class="btn btn-danger btn-sm tombol-verifikasi"><i class="fa fa-trash"></i> Delete
								</a>
								<?php } ?>
							</td>
							<!-- Akhir Level admin -->
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
