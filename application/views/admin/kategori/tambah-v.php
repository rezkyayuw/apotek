<div class="card">
	<div class="card-header">
		<b>Tambah Kategori</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/kategori/proses_tambah/') ?>" method="post">
			<div class="row">
				<div class="col-md-12">
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Kategori</label>
						<input type="text" class="form-control" name="nama_kategori" placeholder="Kategori" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Deskirpsi Kategori</label>
						<input type="text" class="form-control" name="des_kategori" placeholder="Deskripsi Kategori" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan</button>
		</form>
	</div>
</div>