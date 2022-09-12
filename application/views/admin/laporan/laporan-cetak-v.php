<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
	<!-- Required Fremwork -->
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/adminty/') ?>files\bower_components\bootstrap\css\bootstrap.min.css">
</head>
<body onload="window.print()">
<div class="card">
		<div class="card-header"><b>Obat Terjual</b></div>
		<div class="card-body">
			<table class="table">
				<tr>
					<td class="px-1 py-0">No</td>
					<td class="px-1 py-0">Nama Obat</td>
					<td class="px-1 py-0">Jml</td>
				</tr>
				<?php $no=1 ?>
				<?php foreach ($getobat as $data): ?>
					<tr>
						<td class="px-1 py-0"><?php echo $no; ?></td>
						<td class="px-1 py-0"><?php echo $data['nama_obat']; ?></td>
						<td class="px-1 py-0"><?php echo $data['banyak']; ?></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
<div class="card mt-4">
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
						<td class="px-1 py-0"><?php echo $no; ?></td>
						<td class="px-1 py-0"><?php echo $data['ref'] ; ?></td>
						<td class="px-1 py-0"><?php echo $data['first_name'] ; ?></td>
						<td class="px-1 py-0">
							<?php if ($data['nama_pembeli'] == TRUE): ?>
								<?php echo $data['nama_pembeli']; ?>
								<?php else: ?>
									<span class="label label-primary">Tidak diisi</span>
								<?php endif ?>
							</td>
							<td class="px-1 py-0"><?php echo date('d-m-Y',strtotime($data['tgl_beli'])) ; ?></td>
							<td class="px-1 py-0"><?php echo 'Rp.'. number_format($data['grandtotal']) ; ?></td>
							<td class="px-1 py-0">
								<?php if ($data['id_status'] == TRUE): ?>
									<span class="label label-success">Lunas</span>
									<?php else: ?>
										<span class="label label-warning">Belum</span>
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


			<div class="card mt-4">
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
						<td class="px-1 py-0"><?php echo $no; ?></td>
						<td class="px-1 py-0"><?php echo $data['ref'] ; ?></td>
						<td class="px-1 py-0"><?php echo $data['first_name'] ; ?></td>
						<td class="px-1 py-0">
							<?php if ($data['nama_pemasok'] == TRUE): ?>
								<?php echo $this->Pembelian_m->detailpem($data['nama_pemasok'])->nama_pemasok ; ?>
							<?php else: ?>
								<span class="label label-inverse">Belum Diatur</span>
							<?php endif ?>
						</td>
						<td class="px-1 py-0"><?php echo date('d-m-Y',strtotime($data['tgl_beli'])) ; ?></td>
						<td class="px-1 py-0">
							<?php if ($data['id_status'] == TRUE): ?>
								<span class="label label-success">Lunas</span>
							<?php else: ?>
								<span class="label label-warning">Belum</span>
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
		</div>
			</div>
</body>
</html>

