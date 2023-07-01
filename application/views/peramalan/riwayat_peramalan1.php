<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Hasil Peramalan Data Obat <small></small></h2>
			<ul class="nav navbar-right panel_toolbox">
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th class="text-center">Periode Waktu</th>
						<th class="text-center">Volume Penjualan (Y)</th>
						<th class="text-center">Waktu (X)</th>
						<th class="text-center">$$ X^2 $$</th>
						<th class="text-center">XY</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 0; $oke = 1; $totaloke = 0;  $totalpenjualan = 0;  $totalwaktu = 0; $totalx2= 0;  $totalxy = 0;  foreach ($peramalan->result() as $key => $data): ?>
					<tr>
						<th scope="row"><?php $iya =$oke++; echo $iya; ?></th>
						<td class="text-right"><?= bulan_tahun($data->bulan_tahun) ?> </td>
						<td class="text-right"><?= $data->total; ?></td>
						<td class="text-right"><?= $no ?></td>
						<td class="text-right"><?= $no * $no ?></td>
						<td class="text-right"><?= $data->total * $no; ?> </td>
					</tr>
					<?php $totalpenjualan +=  $data->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $data->total * $no;  $no++; endforeach;  ?>
					<tr bgcolor="yellow">
						<th class="text-center" colspan="2" scope="row" style="color: black; font-weight: bold"> Total</th>
						<td class="text-right" style="color: black; font-weight: bold"><?= $totalpenjualan; ?></td>
						<td class="text-right" style="color: black; font-weight: bold"><?= $totalwaktu; ?></td>
						<td class="text-right" style="color: black; font-weight: bold"><?= $totalx2; ?></td>
						<td class="text-right" style="color: black; font-weight: bold"><?= $totalxy; ?></td>
					</tr>
				</tbody>
			</table>

			<!--  -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-square-o"></i> Metode Trend Moment</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<!-- modals -->
						<!-- Large modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal"
							data-target=".bs-example-modal-lg">Lihat Rumus</button>

						<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"
							style="display: none;">
							<div class="modal-dialog modal-md">
								<div class="modal-content">

									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span
												aria-hidden="true">×</span>
										</button>
										<h4 class="modal-title" id="myModalLabel">Penggunaan Rumus Metode Trend Moment
										</h4>
									</div>
									<div class="modal-body">
										<h4>Rumus Metode Trend Moment</h4>
										<p>𝑌 = 𝑎 + 𝑏𝑥.</p>
										<p>Persamaan (i) = ∑𝑦 = 𝑎. 𝑛 + 𝑏. ∑𝑥.</p>
										<p>Persamaan (ii) = ∑𝑥𝑦 = 𝑎. ∑𝑥 + 𝑏. ∑𝑥<sup>2</sup></p>
										<h4>Cara Pengerjaan</h4>
										<p>1. Tahun/bulan paling awal = Tahun/bulan dasar.</p>
										<p>2. X = selalu bertambah 1 setiap tahun/bulan nya.</p>
										<p>3. Masukan nilai X & Y ke dalam rumus.</p>
										<p>4. Kurangi persamaan (ii) dengan persamaan (i) untuk mencari nilai a atau b.
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default"
											data-dismiss="modal">Close</button>
									</div>

								</div>
							</div>
						</div>

						<!-- Small modal -->
						<!-- /modals -->
						<div class="container">
							<div class="x_panel row row-centered">
								<div class="content col-md-6 col-centered">
									<h2>Persamaan (I)</h2>
									<P> ∑𝑦 = 𝑎. 𝑛 + 𝑏. ∑𝑥. </P>
									<p> <?= $totalpenjualan; ?> = <?php echo $iya; ?> a + <?= $totalwaktu; ?> b &nbsp;
										&nbsp; &nbsp; [X 23] &nbsp; &nbsp; &nbsp;<?= $totalpenjualan*23; ?> =
										<?php echo $iya*23; ?> a + <?= $totalwaktu*23; ?> b </p>
								</div>
								<div class="content col-md-6 col-centered">
									<h2>Persamaan (II)</h2>
									<P> ∑𝑥𝑦 = 𝑎. ∑𝑥 + 𝑏. ∑𝑥<sup>2</sup> </P>
									<p> <?= $totalxy; ?> = <?= $totalwaktu; ?> a + <?= $totalx2; ?> b &nbsp; &nbsp;
										&nbsp; [X 2] &nbsp; &nbsp; &nbsp; <?= $totalxy * 2; ?> = <?= $totalwaktu * 2; ?>
										a + <?= $totalx2 * 2; ?> b </p>
								</div>
								<br>
							</div>

							<div class="x_panel row row-centered">
								<div class="content col-md-6 col-centered">
									<h2>Persamaan (II) - Persamaan (I)</h2>
									<p><?php $p1 = $totalpenjualan*23; echo $p1; ?> = <?php echo $iya*23; ?> a +
										<?php $ptw1 = $totalwaktu*23; echo $ptw1; ?> b </p>
									<P class="pt-2"><ins><?php $p2 = $totalxy * 2; echo  $p2; ?> =
											<?= $totalwaktu * 2; ?> a + <?php $ptw2 = $totalx2 * 2; echo $ptw2; ?> b
										</ins> -</P>
									<?php 
	                   					// jumlah p2 - p1 
				                   		$hasilptw = $ptw1 - $ptw2;
				                   		$hasil = $p1 - $p2;
			                   		?>
									<p><?php echo $hasil ?> = <?= $hasilptw; ?> b</p>
									<p>b = <?= $hasil ?> / <?= $hasilptw ?></p>
									<p class="" style="color: black; font-weight: bold;">b = <?php $nilaib = abs($hasil/$hasilptw); echo $nilaib; ?>
										(Nilai
										B) </p>
								</div>
								<div class="content col-md-6 col-centered">
									<h2>Mencari Nilai A</h2>
									<p><?= $totalpenjualan; ?> = <?php echo $iya; ?> a + <?= $totalwaktu; ?> b </p>
									<P class=""><?= $totalpenjualan; ?> = <?php echo $iya; ?> a + <?= $totalwaktu; ?>
										(<?= $nilaib ?>)</P>
									<p><?= $totalpenjualan; ?> = <?php echo $iya; ?> a + (<?= $totalwaktu * $nilaib ?>)
									</p>
									<p><?= $iya; ?> a = <?php echo $totalpenjualan; ?> -
										(<?php $xb = $totalwaktu * $nilaib; echo $xb; ?>)</p>
									<p><?= $iya; ?> a = <?php $jumlahb = $totalpenjualan-$xb; echo $jumlahb; ?></p>
									<p>a = <?= $jumlahb; ?> / <?= $iya; ?></p>
									<p class="" style="color: black; font-weight: bold;">a = <?php $nilaia = abs($jumlahb/$iya); ?><?= $nilaia; ?>
										(Nilai
										A)</p>
								</div>
							</div>

							<div class="x_panel row row-centered">
								<div class="content col-md-6 col-centered">
									<h4 class="text-center">Memasukan Nilai a dan b Kedalama Rumus Meode <i>Trend
											Moment</i></h4>
									<p>Y = a + b X</p>
									<p>Y = <?= $nilaia; ?> + (<?= $nilaib ?>) (X)</p>
									<p>Y = <?= $nilaia; ?> + (<?= $nilaib ?>) (0)</p>
									<p?>Y = <?= $nilaia; ?> + <?php $periodex =  $nilaib*0 ?>(<?= $periodex; ?>)</p>
										<p class="" style="color: black; font-weight: bold;">Y =
											<?php $hasilperamalan = abs($nilaia + $periodex); echo $hasilperamalan; ?>
										</p>
										<!-- NILAI FORECASTING -->
								</div>
								<div class="content col-md-6 col-centered">
									<h4 class="text-center">Menghitung Kesalahan <i>Mean Absoulute Percentace Error</i>
										(MAPE)</h4>
									<p>$$ {{ \Sigma\mid {{Y } - Y^1 }} \mid \over {Y} } 100 \% = $$</p>
									<p>$$
										{{ \Sigma\mid {{<?= $pmei2019->result()[0]->total ?> } - <?php $hasilformatperamalan = number_format($hasilperamalan,2); echo $hasilformatperamalan; ?> }}
										\mid \over {<?= $pmei2019->result()[0]->total ?>} } 100 \% = $$</p>
									<?php 
											$atas = abs($hasilformatperamalan-$pmei2019->result()[0]->total); 
											$hasil = @($atas/$pmei2019->result()[0]->total*100);
	                   				?>
									<p>$$ {{ \Sigma\mid {{<?= $atas ?> } }} \mid \over
										{<?= $pmei2019->result()[0]->total ?>} } 100 \% = <?= number_format($hasil,1) ?>
										\% $$</p>
								</div>
							</div>
						</div>

						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th class="text-center">Periode Waktu</th>
									<th class="text-center">Data Aktual / Volume Penjualan </th>
									<th class="text-center">Forecasting / Peramalan</th>
									<th class="text-center">$$ {{ \mid Y - Y^1 \mid }} $$</th>
									<th class="text-center">$$ {{ \Sigma\mid {{Y } - Y^1 }} \mid \over {Y} } 100 \% = $$
									</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 0; $oke = 1;    $totalmape = 0;  foreach($peramalan->result() as $key => $data): ?>
								<tr>
									<th scope="row"><?= $oke++ ?></th>
									<td class="text-right"><?= bulan_tahun($data->bulan_tahun) ?> </td>
									<td class="text-right"><?= $data->total; ?></td>
									<?php $periodex1 =  $nilaib*$no; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$data->total; ?>
									<?php $hasil = @($atas1/$data->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,4)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total;  ?>
								</tr>
								<?php $totalmape += $total * $no;  $no++; endforeach;  ?>
								<tr bgcolor="yellow">
									<td class="text-center" colspan="5" style="font-size: medium; font-weight: bold; ">Total </td>
									<?php $haha = array_sum($jumlah) ?>
									<td class="text-right"> <?php $fix = number_format($haha,3); echo $fix; ?></td>
								</tr>

								<?php $no = 24;  foreach($peramalan1->result() as $key => $data1): ?>
								<tr bgcolor="">
									<th scope="row"></th>
									<td class="text-right"><?= bulan_tahun($data1->bulan_tahun) ?> </td>
									<td class="text-right" style=""><?= $data1->total; ?></td>
									<?php $periodex1 =  $nilaib*$no; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$data1->total; ?>
									<?php $hasil = @($atas1/$data1->total*100); ?> 
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,4)); echo $total; ?> </td>
									<?php  ?>
								</tr>
								<?php $totalmape += $total * $no;  $no++; endforeach;  ?>

								<?php $periodex1 =  $nilaib*$no; ?>
								<?php $hasilperamalan = $nilaia + $periodex1; ?>
								<?php $atas1 = $hasilperamalan-$pall->result()[0]->total ?>
								<?php $hasil = @($atas1/$pall->result()[0]->total*100); ?>
							</tbody>
						</table>
						<div class="container">
							<div class="x_panel row row-centered">
								<div class="content col-md-12 col-centered">
									<div class="text-success">
										<h3><span class="label label-info">Jumlah Stok Kode Obat <?= $nama_obat; ?> yang akan diramalkan
											Bulan <?php echo tahun_bulan($bulan); ?> adalah
											<?= abs(number_format($hasilperamalan)); ?></span> </h3>
									</div>
									<h2 class="text-center">Rata - Rata Perhitungan MAPE Dan Akurasi</h2>
									<p class="text-left">$$ {{ \Sigma\mid {{Y } - Y^1 \over {Y} }} \mid \over {N} } 100
										\% = $$</p>
									<p><?php $akurasi = number_format($fix/$iya,1); ?></p>
									<p class="text-left">$$ {{ {<?= $fix ?> }} \over {<?= $iya; ?>} } = <?= $akurasi; ?>
										\% $$</p>
										<p></p>
								</div>
							</div>
						</div>
						<form action="<?= base_url() ?>peramalan/save_peramalan" method="post">
							<input type="hidden" name="kd_obat" value="<?= $nama_obat; ?>">
							<input type="hidden" name="ramal" value="<?= abs(number_format($hasilperamalan)); ?>">
							<input type="hidden" name="bulan"
								value="<?php echo tahun_bulan($bulan); ?>">
							<input type="hidden" name="tanggal" value="<?= date('Y-m-d') ?>">
							<input type="hidden" name="user" value="<?= $this->fungsi->user_login()->user_id ?>">
							<button name="submit"
								onclick="return confirm('Apakah Data yakin ingin menyimpan data peramalan Bulan <?php echo tahun_bulan($bulan); ?> ?');"
								class="btn btn-success"> Simpan Peramalan </button>
						</form>
					</div>
				</div>
			</div>
			<!--  -->
		</div>
	</div>
</div>

<div class="clearfix"></div>