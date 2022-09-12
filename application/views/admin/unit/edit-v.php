<div class="card">
	<div class="card-header">
		<b>Detail Unit</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/unit/proses_edit/') ?>" method="post">
			<input type="hidden" name="id_unit" value="<?php echo $detaildata->id_unit ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Unit</label>
						<input type="text" class="form-control" name="unit" value="<?php echo $detaildata->unit ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan / Ubah</button>
		</form>
	</div>
</div>