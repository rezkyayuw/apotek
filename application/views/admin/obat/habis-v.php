<div class="card">
	<div class="card-header">
		<b>Daftar Obat Habis</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/obat/habis/') ?>" method="post">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
					    <label>Pencarian</label>
					    <?php if (!empty($post['string'])): ?>
					    	<input type="text" class="form-control" name="string" value="<?php echo $post['string'] ?>">
					    <?php else: ?>
					    	<input type="text" class="form-control" name="string" placeholder="Lakukan Pencarian">
					    <?php endif ?>
					    <small class="form-text text-muted">Tekan enter untuk melakukan pencarian</small>
					  </div>
				</div>
				<div class="col-md-3">
					<label>Kategori</label>
					<select class="form-control" name="nama_kategori">
						<option value="">Semua Kategori</option>
						<?php foreach ($getkategori as $data): ?>
							<option value="<?php echo $data->id_kategori ?>"><?php echo $data->nama_kategori; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-md-2">
					<label>Unit</label>
					<select class="form-control" name="unit">
						<option value="">Semua Unit</option>
						<?php foreach ($getunit as $data): ?>
							<option value="<?php echo $data->id_unit ?>"><?php echo $data->unit; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-md-3">
					<label>Supplier</label>
					<select class="form-control" name="nama_pemasok">
						<option value="">Semua Supplier</option>
						<?php foreach ($getpemasok as $data): ?>
							<option value="<?php echo $data->id_pemasok ?>"><?php echo $data->nama_pemasok; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-md-1">
					<label>&nbsp;</label><br/>
					<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Cari</button>
				</div>
			</div>
		</form>
			
		<div class="table-responsive">
			<table class="table">
				<tr>
					<th>No</th>
					<th>Kode Obat</th>
					<th>Nama Obat</th>
					<th>Penyimpanan</th>
					<th>Stok</th>
					<th>Unit</th>
					<th>Kategori</th>
					<th>Kedaluwarsa</th>
					<th>Harga Jual</th>
					<th>Nama Supplier</th>
				</tr>
				<?php $no=1+$row ?>
				<?php foreach ($result as $data): ?>
					<?php if ($data['stok']<=0): ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['kode_obat'] ; ?></td>
							<td><?php echo $data['nama_obat'] ; ?></td>
							<td><?php echo $data['penyimpanan'] ; ?></td>
							<td><?php echo $data['stok'] ; ?></td>
							<td><?php echo $data['unit'] ; ?></td>
							<td><?php echo $data['nama_kategori'] ; ?></td>
							<td><?php echo date('d F Y',strtotime($data['kedaluwarsa'])) ; ?></td>
							<td><?php echo 'Rp.'. number_format($data['harga_jual']) ; ?></td>
							<td><?php echo $data['nama_pemasok'] ; ?></td>
						</tr>
						<?php $no++ ?>
					<?php endif ?>
				<?php endforeach ?>
			</table>
			<div class="row">
			<div class="col"><?php echo $pagination; ?></div>
		</div>
		</div>
	</div>
</div>