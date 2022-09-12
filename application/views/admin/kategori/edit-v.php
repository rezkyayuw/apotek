<div class="card">
	<div class="card-header">
		<b>Detail Kategori</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/kategori/proses_edit/') ?>" method="post">
			<input type="hidden" name="id_kategori" value="<?php echo $detaildata->id_kategori ?>">
			<div class="row">
				<div class="col-md-12">
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Kategori</label>
						<input type="text" class="form-control" name="nama_kategori" value="<?php echo $detaildata->nama_kategori ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Deskirpsi Kategori</label>
						<input type="text" class="form-control" name="des_kategori" value="<?php echo $detaildata->des_kategori ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan / Ubah</button>
		</form>
	</div>
</div>