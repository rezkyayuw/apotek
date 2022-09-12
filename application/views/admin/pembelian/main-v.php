<div class="card">
	<div class="card-header">
		<b>Daftar Pembelian</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/pembelian/index/') ?>" method="post">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <label>Pencarian</label>
					    <?php if (!empty($post['string'])): ?>
					    	<input type="text" class="form-control" name="string" value="<?php echo $post['string'] ?>">
					    <?php else: ?>
					    	<input type="text" class="form-control" name="string" placeholder="Lakukan Pencarian">
					    <?php endif ?>
					    <small class="form-text text-muted">Tekan enter untuk melakukan pencarian</small>
					  </div>
				</div>
				<div class="col-md-5">
					<label>Supplier</label>
					<select class="form-control" name="nama_pemasok">
						<option value="">Semua Supplier</option>
						<?php foreach ($getpemasok as $data): ?>
							<option value="<?php echo $data->id_pemasok ?>"><?php echo $data->nama_pemasok; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-md-1">
					<label>&nbsp;</label><br/>
					<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Cari</button>
				</div>
			</div>
		</form>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Referensi</th>
				<th>Nama User</th>
				<th>Nama Supplier</th>
				<th>Tgl Beli</th>
				<th>Status</th>
				<th>Verif</th>
				<th>Aksi</th>
			</tr>
			<?php if ($result == TRUE): ?>
				<?php $no=1+$row ?>
				<?php foreach ($result as $data): ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['ref'] ; ?></td>
						<td><?php echo $data['first_name'] ; ?></td>
						<td>
							<?php if ($data['nama_pemasok'] == TRUE): ?>
								<?php echo $this->Pembelian_m->detailpem($data['nama_pemasok'])->nama_pemasok ; ?>
							<?php else: ?>
								<span class="label label-inverse">Belum Diatur</span>
							<?php endif ?>
						</td>
						<td><?php echo date('d F Y',strtotime($data['tgl_beli'])) ; ?></td>
						<td>
							<?php if ($data['id_status'] == TRUE): ?>
								<span class="label label-success">Lunas</span>
							<?php else: ?>
								<span class="label label-warning">Belum bayar</span>
							<?php endif ?>
						</td>
						<td>
							<?php if ($data['verifikasi'] == TRUE): ?>
								<span class="label label-success">Sudah verifikasi</span>
							<?php else: ?>
								<span class="label label-warning">Belum verifikasi</span>
							<?php endif ?>
						</td>
						<td><a href="<?php echo base_url('index.php/pembelian/detail/'.$data['ref']) ?>" class="label label-info" >Edit</a>
							<a href="<?php echo base_url('index.php/pembelian/delete/'.$data['id_pembelian']) ?>" class="label label-danger" >Hapus</a></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td colspan="7" align="center">Belum ada pembelian</td>
				</tr>
			<?php endif ?>		
		</table>
		<div class="row">
			<div class="col"><?php echo $pagination; ?></div>
		</div>
	</div>
</div>