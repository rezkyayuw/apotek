<div class="card">
	<div class="card-header">
		<b>Detail User</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/users/proses_edit/') ?>" method="post">
			<input type="hidden" name="id" value="<?php echo $detaildata->id ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" value="<?php echo $detaildata->username ?>" required>
						<small class="form-text text-muted">Gunakan data unik</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="first_name" value="<?php echo $detaildata->first_name ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Belakang</label>
						<input type="text" class="form-control" name="last_name" value="<?php echo $detaildata->last_name ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="<?php echo $detaildata->email ?>" required>
						<small class="form-text text-muted">Gunakan Format Email yang benar</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Password saat ini</label>
						<div class="form-control border-success"><?php echo $detaildata->repassword; ?></div>
						<small class="form-text text-muted">Password yang sedang digunakan saat ini</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Ganti Password</label>
						<input type="password" class="form-control" name="password" placeholder="Ganti Password">
						<small class="form-text text-muted">Gunakan Format Email yang benar</small>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="jk">Jenis Kelamin</label><br/>
						<label><input type="radio" name="jk" value="l" checked=""> Laki-laki</label>
						<label><input type="radio" name="jk" value="p"> Perempuan</label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>No. Hp</label>
						<input type="number" class="form-control" name="phone" value="<?php echo $detaildata->phone ?>" required>
						<small class="form-text text-muted">Gunakan angka 0-9 sebanyak 12 digit</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Status </label><br/>
						<select class="form-control" name="active">
							<?php if ($detaildata->active =='1'): ?>
								<option value="1">-- Aktif --</option>
								<option value="0">Nonaktif</option>
							<?php else: ?>
								<option value="0">-- Nonaktif --</option>
								<option value="1">Aktif</option>
							<?php endif ?>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group" style="margin-top: 5px;">
						<label class="control-label">Groups</label><br/>
						<?php foreach ($groups as $gg): ?>
							<input type="checkbox" name="groups[]" value="<?php echo $gg->id; ?>" 
							<?php foreach ($usergroups as $us): ?>
								<?php if ($gg->id==$us){echo('checked');} ?>
							<?php endforeach ?>
							> <?php echo $gg->name; ?>
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan / Ubah</button>
		</form>
	</div>
</div>