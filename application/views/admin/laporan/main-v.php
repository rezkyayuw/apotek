<div class="card">
	<div class="card-header">
		<b>Laporan</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/laporan/detail/') ?>" method="post">
			<div class="row">
				<div class="col-md-12">
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Tanggal Awal Perhitungan</label>
						<input type="date" class="form-control" name="tgl_awal" value="<?php echo date('Y-m-d') ?>" placeholder="Masukkan Tanggal" >
						<small class="form-text text-muted">Pilih format tanggal</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Tanggal Akhir Perhitungan</label>
						<input type="date" class="form-control" name="tgl_akhir" value="<?php echo date('Y-m-d') ?>" placeholder="Masukkan Tanggal">
						<small class="form-text text-muted">Pilih format tanggal</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Rekap Data</button>
		</form>
	</div>
</div>