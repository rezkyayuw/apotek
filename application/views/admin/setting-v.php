<script src="<?php echo base_url('assets/js/') ?>jquery-3.2.1.min.js"></script>
<div class="card">
	<div class="card-header">
		<b>Detail Apotek</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/setting/proses_edit/') ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_perusahaan" value="<?php echo $perusahaan->id_perusahaan ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="media">
						<img id="preview" class="align-self-center mr-3 rounded-circle border border-info" src="<?php echo base_url('assets/img/'.$perusahaan->logo) ?>" width="50px" alt="Generic placeholder image">
						<div class="media-body">
							<h5 class="mt-0">Logo Apotek</h5>
							<div class="custom-file">
								<input type="file" name="logo" id="uploadBtn" lang="es">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Pemilik</label>
						<input type="text" class="form-control" name="nama_pemilik" value="<?php echo $perusahaan->nama_pemilik ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Kode Apotek</label>
						<input type="text" class="form-control" name="kode_perusahaan" value="<?php echo $perusahaan->kode_perusahaan ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Apotek</label>
						<input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $perusahaan->nama_perusahaan ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Alamat Apotek</label>
						<input type="text" class="form-control" name="alamat_perusahaan" value="<?php echo $perusahaan->alamat_perusahaan ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>No. SIPA</label>
						<input type="text" class="form-control" name="no_sipa" value="<?php echo $perusahaan->no_sipa ?>" required>
						<small class="form-text text-muted">Hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="submit" value="submit">Simpan / Ubah</button>
		</form>
	</div>
</div>
<script type="text/javascript">
	document.getElementById("uploadBtn").onchange = function () {
		document.getElementById("uploadFile").value = this.value;
	};
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#preview').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#uploadBtn").change(function(){
		readURL(this);
	});
</script>