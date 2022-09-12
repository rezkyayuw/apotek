<div class="card">
	<div class="card-header">
		<b>Daftar Supplier</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/pemasok/index/') ?>" method="post">
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
				<th>Nama Supplier</th>
				<th>Alamat</th>
				<th>No. Hp</th>
				<th>Aksi</th>
			</tr>
			<?php $no=1+$row ?>
			<?php foreach ($result as $data): ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nama_pemasok'] ; ?></td>
					<td><?php echo $data['alamat'] ; ?></td>
					<td><?php echo $data['phone'] ; ?></td>
					<td><a href="<?php echo base_url('index.php/pemasok/detail/'.$data['id_pemasok']) ?>" class="label label-info" >Edit</a>
						<a href="<?php echo base_url('index.php/pemasok/delete/'.$data['id_pemasok']) ?>" class="label label-danger" >Hapus</a></td>
				</tr>
				<?php $no++ ?>
			<?php endforeach ?>
		</table>
		<div class="row">
			<div class="col"><?php echo $pagination; ?></div>
		</div>
	</div>
</div>