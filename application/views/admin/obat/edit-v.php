<div class="card">
	<div class="card-header">
		<b>Detail Obat</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/obat/proses_edit/') ?>" method="post">
			<input type="hidden" name="id_obat" value="<?php echo $detaildata->id_obat ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Kode Obat</label>
						<input type="text" class="form-control" name="kode_obat" value="<?php echo $detaildata->kode_obat ?>" required>
						<small class="form-text text-muted">Gunakan data unik</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Obat</label>
						<input type="text" class="form-control" name="nama_obat" value="<?php echo $detaildata->nama_obat ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Penyimpanan</label>
						<input type="text" class="form-control" name="penyimpanan" value="<?php echo $detaildata->penyimpanan ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Stok</label>
						<input type="number" class="form-control" name="stok" value="<?php echo $detaildata->stok ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Unit</label>
						<select class="form-control" name="unit" required>
							<option value="<?php echo $detaildata->unit ?>">--<?php echo $this->Obat_m->detailunit($detaildata->unit)->unit; ?>--</option>
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
							<option value="<?php echo $detaildata->nama_kategori ?>">--<?php echo $this->Obat_m->detailkat($detaildata->nama_kategori)->nama_kategori; ?>--</option>
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
						<input type="date" class="form-control" name="kedaluwarsa" value="<?php echo $detaildata->kedaluwarsa ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan format tanggal</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Harga Jual</label>
						<input type="number" class="form-control" name="harga_jual" value="<?php echo $detaildata->harga_jual ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Harga Beli</label>
						<input type="number" class="form-control" name="harga_beli" value="<?php echo $detaildata->harga_beli ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Lead Time</label>
						<input type="number" class="form-control" name="lead_times" placeholder="Lead Time" value="<?php echo $detaildata->lead_times?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Jumlah Unit</label>
						<input type="number" class="form-control" name="pcs" placeholder="Jumlah Unit" value="<?php echo $detaildata->pcs?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Supplier</label>
						<select class="form-control" name="nama_pemasok" required>
							<option value="<?php echo $detaildata->nama_pemasok ?>">--<?php echo $this->Obat_m->detailpem($detaildata->nama_pemasok)->nama_pemasok; ?>--</option>
							<?php foreach ($getpemasok as $data): ?>
								<option value="<?php echo $data->id_pemasok ?>"><?php echo $data->nama_pemasok; ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan / Ubah</button>
		</form>
	</div>
</div>