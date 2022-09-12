<div class="card">
	<div class="card-header">
		<b>Daftar Penjualan</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/penjualan/index/') ?>" method="post">
			<div class="row">
				<div class="col-md-12">
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
			</div>
		</form>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Referensi</th>
				<th>Nama User</th>
				<th>Nama Pembeli</th>
				<th>Tanggal Beli</th>
				<th>Grand Total</th>
				<th>Status</th>
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
							<?php if ($data['nama_pembeli'] == TRUE): ?>
								<?php echo $data['nama_pembeli']; ?>
							<?php else: ?>
								<span class="label label-primary">Tidak diisi</span>
							<?php endif ?>
						</td>
						<td><?php echo date('d F Y',strtotime($data['tgl_beli'])) ; ?></td>
						<td><?php echo 'Rp.'. number_format($data['grandtotal']) ; ?></td>
						<td>
							<?php if ($data['id_status'] == TRUE): ?>
								<span class="label label-success">Lunas</span>
							<?php else: ?>
								<span class="label label-warning">Belum bayar</span>
							<?php endif ?>
						</td>
						<td><a href="<?php echo base_url('index.php/penjualan/detail/'.$data['ref']) ?>" class="label label-info" >Edit</a>
							<a href="<?php echo base_url('index.php/penjualan/delete/'.$data['id_penjualan']) ?>" class="label label-danger" >Hapus</a></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td colspan="7" align="center">Belum ada penjualan</td>
				</tr>
			<?php endif ?>
				
		</table>
		<div class="row">
			<div class="col"><?php echo $pagination; ?></div>
		</div>
	</div>
</div>