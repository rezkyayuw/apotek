<script src="<?php echo base_url('assets/js/') ?>jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url('assets/grafik/') ?>code/highcharts.js"></script>
<script src="<?php echo base_url('assets/grafik/') ?>code/modules/data.js"></script>
<script src="<?php echo base_url('assets/grafik/') ?>code/modules/drilldown.js"></script>
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header"><b>Grafik Penghasilan Harian</b></div>
			<div class="card-body">
				<div id="container2"></div>
				<script type="text/javascript">
					Highcharts.chart('container2', {
						chart: {
							type: 'column'
						},
						title: {
							text: 'Grafik Penghasilan Harian'
						},
						credits: {
							enabled: false
						},
						subtitle: {
							text: 'Sumber : database Penjualan'
						},
						xAxis: {
							type: 'category',
							labels: {
								rotation: -45,
								style: {
									fontSize: '13px',
									fontFamily: 'Verdana, sans-serif'
								}
							}
						},
						yAxis: {
							min: 0,
							title: {
								text: 'Rupiah (Rp.)'
							}
						},
						legend: {
							enabled: false
						},
						tooltip: {
							pointFormat: '<b>Rp.{point.y:.0f}</b>'
						},
						colors: ['#01a9ac'],
						series: [{
							name: 'Tanggal Pencarian',
							data: [
							<?php foreach ($gettgl as $data): ?>
								<?php echo '['."'".date('d F Y',strtotime($data['tgl_beli']))."'".','.$data['grandtotal'].'],'; ?>
							<?php endforeach ?>
							],
							dataLabels: {
								enabled: true,
								rotation: -90,
								color: '#FFFFFF',
								align: 'right',
                            format: '{point.y:.0f}', // one decimal
                            y: 10, // 10 pixels down from the top
                            style: {
                            	fontSize: '13px',
                            	fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
                });
            </script>
        </div>
    </div>
</div>
<div class="col-md-6">
	<div class="card">
		<div class="card-header"><b>Obat Terjual</b></div>
		<div class="card-body">
			<table class="table">
				<tr>
					<td>No</td>
					<td>Nama Obat</td>
					<td>Jml</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($getobat as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['nama_obat']; ?></td>
						<td><?php echo $data['banyak']; ?></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
</div>
<div class="card">
	<div class="card-header"><b>Laporan Penjualan</b></div>
	<div class="card-body">
		<table class="table">
			<tr>
				<th>No</th>
				<th>Referensi</th>
				<th>Nama User</th>
				<th>Nama Pembeli</th>
				<th>Tanggal Beli</th>
				<th>Grand Total</th>
				<th>Status</th>
			</tr>
			<?php if ($getpenjualan == TRUE): ?>
				<?php $no=1 ?>
				<?php foreach ($getpenjualan as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><a href="<?php echo base_url('index.php/penjualan/detail/'.$data['ref']) ?>"><?php echo $data['ref'] ; ?></a></td>
						<td><?php echo $data['first_name'] ; ?></td>
						<td>
							<?php if ($data['nama_pembeli'] == TRUE): ?>
								<?php echo $data['nama_pembeli']; ?>
								<?php else: ?>
									<span class="label label-primary">Tidak diisi</span>
								<?php endif ?>
							</td>
							<td><?php echo date('d F Y',strtotime($data['tgl_beli'])) ; ?></td>
							<td><?php echo 'Rp.'. number_format($data['grandtotal']) ; ?></td>
							<td>
								<?php if ($data['id_status'] == TRUE): ?>
									<span class="label label-success">Lunas</span>
									<?php else: ?>
										<span class="label label-warning">Belum bayar</span>
									<?php endif ?>
								</td>
							</tr>
							<?php $no++ ?>
						<?php endforeach ?>
						<?php else: ?>
							<tr>
								<td colspan="7" align="center">Belum ada penjualan</td>
							</tr>
						<?php endif ?>
					</table>
				</div>
			</div>


			<div class="card">
				<div class="card-header"><b>Laporan Pembelian</b></div>
				<div class="card-body">
					<table class="table">
						<tr>
							<th>No</th>
							<th>Referensi</th>
							<th>Nama User</th>
							<th>Nama Supplier</th>
							<th>Tgl Beli</th>
							<th>Status</th>
						</tr>
						<?php if ($getpembelian == TRUE): ?>
							<?php $no=1?>
							<?php foreach ($getpembelian as $data): ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><a href="<?php echo base_url('index.php/pembelian/detail/'.$data['ref']) ?>"><?php echo $data['ref'] ; ?></a></td>
									<td><?php echo $data['first_name'] ; ?></td>
									<td>
										<?php if ($data['nama_pemasok'] == TRUE): ?>
											<?php echo $this->Pembelian_m->detailpem($data['nama_pemasok'])->nama_pemasok ; ?>
											<?php else: ?>
												<span class="label label-inverse">Belum Diatur</span>
											<?php endif ?>
										</td>
										<td><?php echo date('d F Y',strtotime($data['tgl_beli'])) ; ?></td>
										<td>
											<?php if ($data['id_status'] == TRUE): ?>
												<span class="label label-success">Lunas</span>
												<?php else: ?>
													<span class="label label-warning">Belum bayar</span>
												<?php endif ?>
											</td>
										</tr>
										<?php $no++ ?>
									<?php endforeach ?>
									<?php else: ?>
										<tr>
											<td colspan="7" align="center">Belum ada pembelian</td>
										</tr>
									<?php endif ?>

								</table>
								<td colspan="7">
									<a href="<?php echo base_url('index.php/laporan/cetak/'.$post['tgl_awal'].'/'.$post['tgl_akhir']) ?>" target="_blank" class="btn btn-primary w-100" >
										Cetak
									</a>

								</td>
							</div>
						</div>