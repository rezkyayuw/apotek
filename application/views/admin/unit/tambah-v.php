<div class="card">
	<div class="card-header">
		<b>Tambah Unit</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/unit/proses_tambah/') ?>" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Unit</label>
						<input type="text" class="form-control" name="unit" placeholder="Unit" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan</button>
		</form>
	</div>
</div>