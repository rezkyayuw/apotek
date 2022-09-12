<div class="card">
	<div class="card-header">
		<b>Tambah Supplier</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/pemasok/proses_tambah/') ?>" method="post">
			<div class="row">
				<div class="col-md-12">
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Supplier</label>
						<input type="text" class="form-control" name="nama_pemasok" placeholder="Nama Supplier" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" placeholder="Alamat Supplier" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nomor Hp</label>
						<input type="number" class="form-control" name="phone" placeholder="Masukkan No. Hp" required>
						<small class="form-text text-muted">Gunakan angka 0-9 sebanyak 12 digit</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan</button>
		</form>
	</div>
</div>