<div class="card">
	<div class="card-header">
		<b>Daftar Unit</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/unit/index/') ?>" method="post">
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
				<th>Unit</th>
				<th>Aksi</th>
			</tr>
			<?php $no=1+$row ?>
			<?php foreach ($result as $data): ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['unit'] ; ?></td>
					<td><a href="<?php echo base_url('index.php/unit/detail/'.$data['id_unit']) ?>" class="label label-info" >Edit</a>
						<a href="<?php echo base_url('index.php/unit/delete/'.$data['id_unit']) ?>" class="label label-danger" >Hapus</a></td>
				</tr>
				<?php $no++ ?>
			<?php endforeach ?>
		</table>
		<div class="row">
			<div class="col"><?php echo $pagination; ?></div>
		</div>
	</div>
</div>