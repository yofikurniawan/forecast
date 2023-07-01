<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Hasil Peramalan Data Obat <?= $pmei2019->result()[0]->nm_obat; ?> <small></small></h2>
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
					<?php 
					$no = 0;
					$oke = 1;
					$totaloke = 0;
					$totalpenjualan = 0;
					$totalwaktu = 0;
					$totalx2= 0;
					$totalxy = 0; 
				?>
					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pmei2019->result()[0]->tgl_penjualan ?>
							<?= $pmei2019->result()[0]->tahun ?></td>
						<td><?= $pmei2019->result()[0]->total ?></td>
						<td><?php echo $no; ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pmei2019->result()[0]->total * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pmei2019->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pmei2019->result()[0]->total * $no; $no++;  ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pjuni2019->result()[0]->tgl_penjualan ?>
							<?= $pjuni2019->result()[0]->tahun ?></td>
						<td><?= $pjuni2019->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pjuni2019->result()[0]->total  * $no ?> </td>
					</tr>
					<?php    $totalpenjualan += $pjuni2019->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pjuni2019->result()[0]->total * $no; $no++;  ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pjuli2019->result()[0]->tgl_penjualan ?>
							<?= $pjuli2019->result()[0]->tahun ?></td>
						<td><?= $pjuli2019->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pjuli2019->result()[0]->total  * $no ?> </td>
					</tr>
					<?php    $totalpenjualan += $pjuli2019->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pjuli2019->result()[0]->total * $no; $no++;  ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $paugust2019->result()[0]->tgl_penjualan ?>
							<?= $paugust2019->result()[0]->tahun ?></td>
						<td><?= $paugust2019->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $paugust2019->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $paugust2019->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $paugust2019->result()[0]->total * $no; $no++;   ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pseptember2019->result()[0]->tgl_penjualan ?>
							<?= $pseptember2019->result()[0]->tahun ?></td>
						<td><?= $pseptember2019->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pseptember2019->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pseptember2019->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pseptember2019->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $poctober2019->result()[0]->tgl_penjualan ?>
							<?= $poctober2019->result()[0]->tahun ?></td>
						<td><?= $poctober2019->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $poctober2019->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $poctober2019->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $poctober2019->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pnovember2019->result()[0]->tgl_penjualan ?>
							<?= $pnovember2019->result()[0]->tahun ?></td>
						<td><?= $pnovember2019->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pnovember2019->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pnovember2019->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pnovember2019->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pdesember2019->result()[0]->tgl_penjualan ?>
							<?= $pdesember2019->result()[0]->tahun ?></td>
						<td><?= $pdesember2019->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pdesember2019->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pdesember2019->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pdesember2019->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pjanuari2020->result()[0]->tgl_penjualan ?>
							<?= $pjanuari2020->result()[0]->tahun ?></td>
						<td><?= $pjanuari2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pjanuari2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pjanuari2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pjanuari2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pfebruari2020->result()[0]->tgl_penjualan ?>
							<?= $pfebruari2020->result()[0]->tahun ?></td>
						<td><?= $pfebruari2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pfebruari2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pfebruari2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pfebruari2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pmaret2020->result()[0]->tgl_penjualan ?>
							<?= $pmaret2020->result()[0]->tahun ?></td>
						<td><?= $pmaret2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pmaret2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pmaret2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pmaret2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $papril2020->result()[0]->tgl_penjualan ?>
							<?= $papril2020->result()[0]->tahun ?></td>
						<td><?= $papril2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $papril2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $papril2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $papril2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pmei2020->result()[0]->tgl_penjualan ?>
							<?= $pmei2020->result()[0]->tahun ?></td>
						<td><?= $pmei2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pmei2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pmei2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pmei2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pjuni2020->result()[0]->tgl_penjualan ?>
							<?= $pjuni2020->result()[0]->tahun ?></td>
						<td><?= $pjuni2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pjuni2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pjuni2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pjuni2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pjuli2020->result()[0]->tgl_penjualan ?>
							<?= $pjuli2020->result()[0]->tahun ?></td>
						<td><?= $pjuli2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pjuli2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pjuli2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pjuli2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pagustust2020->result()[0]->tgl_penjualan ?>
							<?= $pagustust2020->result()[0]->tahun ?></td>
						<td><?= $pagustust2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pagustust2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pagustust2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pagustust2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pseptember2020->result()[0]->tgl_penjualan ?>
							<?= $pseptember2020->result()[0]->tahun ?></td>
						<td><?= $pseptember2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pseptember2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pseptember2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pseptember2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $poktober2020->result()[0]->tgl_penjualan ?>
							<?= $poktober2020->result()[0]->tahun ?></td>
						<td><?= $poktober2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $poktober2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $poktober2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $poktober2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pnovember2020->result()[0]->tgl_penjualan ?>
							<?= $pnovember2020->result()[0]->tahun ?></td>
						<td><?= $pnovember2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pnovember2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pnovember2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pnovember2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pdesember2020->result()[0]->tgl_penjualan ?>
							<?= $pdesember2020->result()[0]->tahun ?></td>
						<td><?= $pdesember2020->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pdesember2020->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pdesember2020->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pdesember2020->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pjanuari2021->result()[0]->tgl_penjualan ?>
							<?= $pjanuari2021->result()[0]->tahun ?></td>
						<td><?= $pjanuari2021->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pjanuari2021->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pjanuari2021->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pjanuari2021->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pfebruari2021->result()[0]->tgl_penjualan ?>
							<?= $pfebruari2021->result()[0]->tahun ?></td>
						<td><?= $pfebruari2021->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pfebruari2021->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pfebruari2021->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pfebruari2021->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?= $oke++ ?></th>
						<td class="text-right"><?= $pmaret2021->result()[0]->tgl_penjualan ?>
							<?= $pmaret2021->result()[0]->tahun ?></td>
						<td><?= $pmaret2021->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $pmaret2021->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $pmaret2021->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $pmaret2021->result()[0]->total * $no;   $no++; ?>

					<tr>
						<th scope="row"><?php $iya = $oke++; echo $iya; ?></th>
						<td class="text-right"><?= $papril2021->result()[0]->tgl_penjualan ?>
							<?= $papril2021->result()[0]->tahun ?></td>
						<td><?= $papril2021->result()[0]->total ?></td>
						<td><?php echo $no;   ?></td>
						<td><?= $no * $no ?></td>
						<td><?= $papril2021->result()[0]->total  * $no ?> </td>
					</tr>
					<?php   $totalpenjualan += $papril2021->result()[0]->total; $totalwaktu += $no; $totalx2 += $no * $no; $totalxy += $papril2021->result()[0]->total * $no;  $no++; ?>


					<tr>
						<th scope="row"> Total</th>
						<td class="text-right"></td>
						<td class="text-right" id=""><?= $totalpenjualan; ?></td>
						<td class="text-right"><?= $totalwaktu; ?></td>
						<td class="text-right"><?= $totalx2; ?></td>
						<td class="text-right"><?= $totalxy; ?></td>
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
									<p class="text-danger">b = <?php $nilaib = abs($hasil/$hasilptw); echo $nilaib; ?>
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
									<p class="text-danger">a = <?php $nilaia = abs($jumlahb/$iya); ?><?= $nilaia; ?>
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
										<p class="text-danger">Y =
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
								<?php 
								$oke1 = 1;
								$totalmape = 0;
								$no = 0;
								$totalwaktu = 0;
							?>
								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pmei2019->result()[0]->tgl_penjualan ?>
										<?= $pmei2019->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pmei2019->result()[0]->total ?></td>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>
								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pjuni2019->result()[0]->tgl_penjualan ?>
										<?= $pjuni2019->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pjuni2019->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*1; ?>
									<?php $hasilperamalan1 = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan1-$pjuni2019->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pjuni2019->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan1,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pjuli2019->result()[0]->tgl_penjualan ?>
										<?= $pjuli2019->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pjuli2019->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*2; ?>
									<?php $hasilperamalan1 = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan1-$pjuli2019->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pjuli2019->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan1,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $paugust2019->result()[0]->tgl_penjualan ?>
										<?= $paugust2019->result()[0]->tahun ?></td>
									<td class="text-right"><?= $paugust2019->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*3; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$paugust2019->result()[0]->total; ?>
									<?php $hasil = @($atas1/$paugust2019->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pseptember2019->result()[0]->tgl_penjualan ?>
										<?= $pseptember2019->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pseptember2019->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*4; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pseptember2019->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pseptember2019->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $poctober2019->result()[0]->tgl_penjualan ?>
										<?= $poctober2019->result()[0]->tahun ?></td>
									<td class="text-right"><?= $poctober2019->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*5; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$poctober2019->result()[0]->total; ?>
									<?php $hasil = @($atas1/$poctober2019->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pnovember2019->result()[0]->tgl_penjualan ?>
										<?= $pnovember2019->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pnovember2019->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*6; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pnovember2019->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pnovember2019->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pdesember2019->result()[0]->tgl_penjualan ?>
										<?= $pdesember2019->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pdesember2019->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*7; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pdesember2019->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pdesember2019->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pjanuari2020->result()[0]->tgl_penjualan ?>
										<?= $pjanuari2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pjanuari2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*8; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pjanuari2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pjanuari2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pfebruari2020->result()[0]->tgl_penjualan ?>
										<?= $pfebruari2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pfebruari2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*9; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pfebruari2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pfebruari2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pmaret2020->result()[0]->tgl_penjualan ?>
										<?= $pmaret2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pmaret2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*10; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pmaret2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pmaret2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $papril2020->result()[0]->tgl_penjualan ?>
										<?= $papril2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $papril2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*11; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$papril2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$papril2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pmei2020->result()[0]->tgl_penjualan ?>
										<?= $pmei2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pmei2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*12; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pmei2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pmei2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pjuni2020->result()[0]->tgl_penjualan ?>
										<?= $pjuni2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pjuni2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*13; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pjuni2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pjuni2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pjuli2020->result()[0]->tgl_penjualan ?>
										<?= $pjuli2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pjuli2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*14; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pjuli2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pjuli2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pagustust2020->result()[0]->tgl_penjualan ?>
										<?= $pagustust2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pagustust2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*15; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pagustust2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pagustust2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pseptember2020->result()[0]->tgl_penjualan ?>
										<?= $pseptember2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pseptember2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*16; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pseptember2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pseptember2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $poktober2020->result()[0]->tgl_penjualan ?>
										<?= $poktober2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $poktober2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*17; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$poktober2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$poktober2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pnovember2020->result()[0]->tgl_penjualan ?>
										<?= $pnovember2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pnovember2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*18; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pnovember2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pnovember2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pdesember2020->result()[0]->tgl_penjualan ?>
										<?= $pdesember2020->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pdesember2020->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*19; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pdesember2020->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pdesember2020->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pjanuari2021->result()[0]->tgl_penjualan ?>
										<?= $pjanuari2021->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pjanuari2021->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*20; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pjanuari2021->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pjanuari2021->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pfebruari2021->result()[0]->tgl_penjualan ?>
										<?= $pfebruari2021->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pfebruari2021->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*21; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pfebruari2021->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pfebruari2021->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $pmaret2021->result()[0]->tgl_penjualan ?>
										<?= $pmaret2021->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pmaret2021->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*22; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pmaret2021->result()[0]->total; ?>
									<?php $hasil = @($atas1/$pmaret2021->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"><?= $oke1++ ?></th>
									<td class="text-right"><?= $papril2021->result()[0]->tgl_penjualan ?>
										<?= $papril2021->result()[0]->tahun ?></td>
									<td class="text-right"><?= $papril2021->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*23; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$papril2021->result()[0]->total; ?>
									<?php $hasil = @($atas1/$papril2021->result()[0]->total*100); ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?php $total = abs(number_format($hasil,5)); echo $total; ?>
									</td>
									<?php $jumlah[] = $total; $totalwaktu += $no; $no++; ?>
								</tr>

								<tr>
									<th scope="row"></th>
									<td class="text-right">Total </td>
									<td class="text-right"></td>
									<td class="text-right"></td>
									<td class="text-right"></td>
									<?php $haha = array_sum($jumlah) ?>
									<td class="text-right"> <?php $fix = number_format($haha,3); echo $fix; ?></td>
								</tr>

								 <!-- <tr bgcolor="yellow">
									<th scope="row"></th>
									<td class="text-right"><?= $pmei2021->result()[0]->tgl_penjualan ?>
										<?= $pmei2021->result()[0]->tahun ?></td>
									<td class="text-right"><?= $pmei2021->result()[0]->total ?></td>
									<?php $periodex1 =  $nilaib*25; ?>
									<?php $hasilperamalan = $nilaia + $periodex1; ?>
									<?php $atas1 = $hasilperamalan-$pmei2021->result()[0]->total ?>
									<?php $hasil = @($atas1/$pmei2021->result()[0]->total*100); ?>
									<?= $nilaib; ?>
									<td class="text-right"><?= abs(number_format($hasilperamalan,2)); ?> </td>
									<td class="text-right"><?= abs(number_format($atas1,2)); ?> </td>
									<td class="text-right"><?= $total = abs(number_format($hasil,1)); echo $total; ?> </td>
									<?php  ?>
								</tr>   -->
								<?php $periodex1 =  $nilaib*$no; ?>
								<?php $hasilperamalan = $nilaia + $periodex1; ?>
								<?php $atas1 = $hasilperamalan-$pmei2021->result()[0]->total ?>
								<?php $hasil = @($atas1/$pmei2021->result()[0]->total*100); ?>
							</tbody>
						</table>
						<div class="container">
							<div class="x_panel row row-centered">
								<div class="content col-md-12 col-centered">
									<div class="text-success">
										<h3><span class="label label-info">Jumlah Stok Obat <?= $pmei2019->result()[0]->nm_obat; ?> yang akan diramalkan
											Bulan <?php echo $bulan; ?> adalah
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
							<input type="hidden" name="kd_obat" value="<?= $pmei2019->result()[0]->kd_obat; ?>">
							<input type="hidden" name="ramal" value="<?= abs(number_format($hasilperamalan)); ?>">
							<input type="hidden" name="bulan"
								value="<?= $pmei2019->result()[0]->tgl_penjualan; ?> <?= $pmei2021->result()[0]->tahun ?>">
							<input type="hidden" name="tanggal" value="<?= date('Y-m-d') ?>">
							<input type="hidden" name="user" value="<?= $this->fungsi->user_login()->user_id ?>">
							<button name="submit"
								onclick="return confirm('Apakah Data yakin ingin menyimpan data peramalan Bulan <?php echo $bulan; ?> ?');"
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
