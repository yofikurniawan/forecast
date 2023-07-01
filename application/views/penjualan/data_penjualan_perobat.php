<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Penjualan<small>Per Obat</small></h2>
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
					cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Obat </th>
							<th>Nama Obat</th>
							<th>Satuan</th>
							<th>Jumlah Terjual</th>
							<th class="text-center">Pemasukan</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($perobat->result() as $key => $oke): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $oke->kd_obat ?></td>
							<td><?php echo $oke->nm_obat ?></td>
							<td><?php echo $oke->name ?></td>
							<td><?php echo $oke->jml_terjual ?></td>
							<td class="text-right">Rp <?php echo number_format($oke->keuntungan,0,".","."); ?>
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
