<div class="card">
	<div class="card-header">
		<b>Detail Supplier</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/pemasok/proses_edit/') ?>" method="post">
			<input type="hidden" name="id_pemasok" value="<?php echo $detaildata->id_pemasok ?>">
			<div class="row">
				<div class="col-md-12">
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Supplier</label>
						<input type="text" class="form-control" name="nama_pemasok" value="<?php echo $detaildata->nama_pemasok ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?php echo $detaildata->alamat ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nomor Hp</label>
						<input type="text" class="form-control" name="phone" value="<?php echo $detaildata->phone ?>" required >
						<small class="form-text text-muted">Gunakan angka 0-9 sebanyak 12 digit</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan / Ubah</button>
		</form>
	</div>
</div>