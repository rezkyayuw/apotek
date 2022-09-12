<div class="card">
	<div class="card-header"><b>Tambah User</b></div>
	<div class="card-body">
		<?php if ($this->session->flashdata('message')): ?>
			<div class="alert alert-success alert-dismissible" role="alert" style="margin-top:65px;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<i class="fa fa-check-circle"></i> <strong><?php echo $this->session->flashdata('message');?></strong>
			</div>
		<?php endif ?>
		<form action="<?php echo base_url('index.php/users/proses_create'); ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Nama Depan</label>
						<input type="text" class="form-control" name="first_name" placeholder="Nama Depan" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Nama Belakang</label>
						<input type="text" class="form-control" name="last_name"  placeholder="Nama Belakang" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">Email</label>
						<input type="text" class="form-control" name="email" placeholder="Email" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="jk">Jenis Kelamin</label><br/>
						<label><input type="radio" name="jk" value="l" checked=""> Laki-laki</label>
						<label><input type="radio" name="jk" value="p"> Perempuan</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label">No. Hp</label>
						<input type="number" class="form-control" name="phone" placeholder="No. Hp" required>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group" style="margin-top: 5px;">
					<label class="control-label">Groups</label><br/>
					<?php foreach ($groups as $gg): ?>
						<?php if ($gg->id=='2'): ?>
							<input type="checkbox" name="groups" value="<?php echo $gg->id; ?>" checked> <?php echo $gg->name; ?>
						<?php else: ?>
							<input type="checkbox" name="groups[]" value="<?php echo $gg->id; ?>"> <?php echo $gg->name; ?>
						<?php endif ?>
					<?php endforeach ?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-12">
				<button class="btn btn-success" style="width:100%">Create User</button>
			</div>
		</form>
	</div>
</div>