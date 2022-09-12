<div class="card">
	<div class="card-header">
		<b>Daftar User</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/users/index/') ?>" method="post">
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
				<th>Username</th>
				<th>Nama</th>
				<th>Jk</th>
				<th>Apotek</th>
				<th>No. Hp</th>
				<th>Lvl</th>
				<th>Status</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php $no=1+$row ?>
			<?php foreach ($result as $data): ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['username'] ; ?></a></td>
					<td><?php echo $data['first_name'] ; ?></td>
					<td><?php echo strtoupper($data['jk']); ?></td>
					<td><?php echo strtoupper($data['nama_perusahaan']); ?></td>
					<td><?php echo strtoupper($data['phone']); ?></td>
					<td>
						<?php 
							$usergoups = $this->Users_m->getgroup($data['id']);
							foreach ($usergoups as $gg) {
								echo "<label class='label label-info'>".$this->Users_m->detailgroup($gg->group_id)->name."</label>";
							}
						 ?>
					</td>
					<td>
						<?php if ($data['active'] =='1'): ?>
							<span class="label label-success">Aktif</span>
						<?php else: ?>
							<span class="label label-danger">Nonaktif</span>
						<?php endif ?>
					</td>
					<td>
						<?php if ($data['id'] =='1'): ?>
							<a href="<?php echo base_url('index.php/users/detail/'.$data['id']) ?>" class="label label-info" >Edit</a>
							<span class="label label-inverse">Hapus</span>
						<?php else: ?>
							<a href="<?php echo base_url('index.php/users/detail/'.$data['id']) ?>" class="label label-info" >Edit</a>
							<a href="<?php echo base_url('index.php/users/delete/'.$data['id']) ?>" class="label label-danger">Hapus</a>
						<?php endif ?>
					</td>
				</tr>
				<?php $no++ ?>
			<?php endforeach ?>
		</table>
		<div class="row">
			<div class="col"><?php echo $pagination; ?></div>
		</div>
	</div>
</div>