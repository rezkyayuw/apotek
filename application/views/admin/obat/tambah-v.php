<div class="card">
	<div class="card-header">
		<b>Tambah Obat</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/obat/proses_tambah/') ?>" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Kode Obat</label>
						<input type="text" class="form-control" name="kode_obat" placeholder="Kode Obat" required>
						<small class="form-text text-muted">Gunakan data unik</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Obat</label>
						<input type="text" class="form-control" name="nama_obat" placeholder="Nama Obat" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Penyimpanan</label>
						<input type="text" class="form-control" name="penyimpanan" placeholder="Penyimpanan" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Stok</label>
						<input type="number" class="form-control" name="stok" placeholder="Masukan Jumlah Stok" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Unit</label>
						<select class="form-control" name="unit" required>
							<?php foreach ($getunit as $data): ?>
								<option value="<?php echo $data->id_unit ?>"><?php echo $data->unit; ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="nama_kategori" required>
							<?php foreach ($getkategori as $data): ?>
								<option value="<?php echo $data->id_kategori ?>"><?php echo $data->nama_kategori; ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Kedaluwarsa</label>
						<input type="date" class="form-control" name="kedaluwarsa" value="<?php echo date('Y-m-d') ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan format tanggal</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Harga Jual</label>
						<input type="number" class="form-control" name="harga_jual" placeholder="Harga Jual" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Harga Beli</label>
						<input type="number" class="form-control" name="harga_beli" placeholder="Harga Beli" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Lead Time</label>
						<input type="number" class="form-control" name="lead_times" placeholder="Lead Time" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Jumlah Unit</label>
						<input type="number" class="form-control" name="pcs" placeholder="Jumlah Unit" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Supplier</label>
						<select class="form-control" name="nama_pemasok" required>
							<?php foreach ($getpemasok as $data): ?>
								<option value="<?php echo $data->id_pemasok ?>"><?php echo $data->nama_pemasok; ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan</button>
		</form>
	</div>
</div>