<div class="row">
	<div class="col-md-3">
		<div class="card bg-c-yellow update-card">
			<div class="card-block">
				<div class="row align-items-end">
					<div class="col-12">
						<h4 class="text-white"><?php echo $totalobat; ?></h4>
						<h6 class="text-white m-b-0">Jumlah Obat</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-c-green update-card">
			<div class="card-block">
				<div class="row align-items-end">
					<div class="col-12">
						<h4 class="text-white"><?php echo $totalkategori; ?></h4>
						<h6 class="text-white m-b-0">Jumlah Kategori</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-c-blue update-card">
			<div class="card-block">
				<div class="row align-items-end">
					<div class="col-12">
						<h4 class="text-white"><?php echo $totalunit; ?></h4>
						<h6 class="text-white m-b-0">Jumlah Unit</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-c-pink update-card">
			<div class="card-block">
				<div class="row align-items-end">
					<div class="col-12">
						<h4 class="text-white"><?php echo $totalpemasok; ?></h4>
						<h6 class="text-white m-b-0">Jumlah Supplier</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-c-blue update-card">
			<div class="card-block">
				<div class="row align-items-end">
					<div class="col-12">
						<h4 class="text-white"><?php echo $totalpembelian; ?></h4>
						<h6 class="text-white m-b-0">Jumlah Pembelian</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-c-pink update-card">
			<div class="card-block">
				<div class="row align-items-end">
					<div class="col-12">
						<h4 class="text-white"><?php echo $totalpenjualan; ?></h4>
						<h6 class="text-white m-b-0">Jumlah Penjualan</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-c-yellow update-card">
			<div class="card-block">
				<div class="row align-items-end">
					<div class="col-12">
						<h4 class="text-white"><?php echo $totalobathabis; ?></h4>
						<h6 class="text-white m-b-0">Jumlah Obat Habis</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card bg-c-green update-card">
			<div class="card-block">
				<div class="row align-items-end">
					<div class="col-12">
						<h4 class="text-white"><?php echo $totalobatkedaluwarsa; ?></h4>
						<h6 class="text-white m-b-0">Jumlah Obat Kedaluwarsa</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header"><b>Reoder Point</b></div>
	<div class="card-body">
		<table class="table table-stiped">
			<tr>
				<th>No</th>
				<th>Nama Obat</th>
				<th>Tanggal Peringatan</th>
				<th>Stok Saat ini</th>
				<th>Reorder Point</th>
				<th>Unit</th>
				<th>Tanggal Pesan</th>
				<th>Aksi</th>
			</tr>
			<?php $no = 1 ?>
			<?php foreach ($reoderpoint as $data): ?>
				<?php $cekobat = $this->Admin_m->cekobat($data->id_obat) ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data->nama_obat; ?></td>
					<td><?php echo date('d F Y',strtotime($data->tgl_reorder_point)); ?></td>
					<td><?php echo $data->stok; ?></td>
					<td><?php echo $data->jml_aman; ?></td>
					<td><?php $pcs =$data->jml_aman/$data->pcs; echo ceil($pcs).' '.$data->nm_unit ?></td>
					<td>
						<?php if ($cekobat == TRUE): ?>
							<?php echo date('d F Y',strtotime($cekobat->tgl_beli)); ?>
						<?php endif ?>
					</td>
					<td>
						<?php if ($cekobat == FALSE): ?>
							<a href="<?php echo base_url('index.php/pembelian/addformreoderpoint/'.$data->id_obat.'/'.$data->jml_aman) ?>" class="label label-success">Order Sekarang</a>
						<?php else: ?>
							<span class="label label-danger">Dalam Proses</span>
						<?php endif ?>
					</td>
				</tr>
				<?php $no++ ?>
			<?php endforeach ?>
		</table>
		
	</div>
</div>