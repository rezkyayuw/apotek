<div class="card">
	<div class="card-header">
		<b>Tambah Pembelian</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/pembelian/proses_tambah/') ?>" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Referensi</label>
						<input type="text" class="form-control" name="ref" placeholder="Referensi" required>
						<small class="form-text text-muted">Gunakan data unik</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama User</label>
						<input type="text" class="form-control" name="id_user" placeholder="Nama User" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Tanggal Beli</label>
						<input type="date" class="form-control" name="tgl_beli" placeholder="Tanggal Beli" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan</button>
		</form>
	</div>
</div>