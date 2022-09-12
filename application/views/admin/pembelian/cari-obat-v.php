<div class="card">
	<div class="card-header">
		<b> Cari Obat</b>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('index.php/pembelian/cariobat/') ?>" method="post">
			<div class="row">
				<div class="col-md-5">
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
						<label>Kategori</label>
						<select class="form-control" name="kategori">
							<option value="">Semua Kategori</option>
							<?php foreach ($getkategori as $data): ?>
								<option value="<?php echo $data->id_kategori ?>"><?php echo $data->nama_kategori; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="col-md-1">
						<label>&nbsp;</label><br/>
						<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Cari</button>
					</div>
				</div>
			</form>

			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>No</th>
						<th>Referensi</th>
						<th>Kode</th>
						<th>Nama Obat</th>
						<th>Banyak</th>
						<th>Unit</th>
						<th>Total</th>
						<th>Lead Time</th>
						<th>Tanggal Tiba</th>
					</tr>
					<?php $no=1+$row ?>
					<?php foreach ($result as $obat): ?>
						
						<tr>
							
							<td><?php echo $no; ?></td>
							<td><a href="<?php echo base_url('index.php/pembelian/detail/'.$obat['ref']) ?>"><?php echo $obat['ref'] ; ?></a></td>
							<td><?php echo $obat['kode_obat']; ?></td>
							<td><?php echo $obat['nama_obat'] ?></td>
							<td>
								<?php echo $obat['banyak']; ?>
							</td>
							<td>
								<?php $pcs = $obat['banyak']/$obat['pcs'];echo ceil($pcs).' '.$obat['nm_unit']; ?>
							</td>
							<td>
								<?php echo 'Rp.'. number_format($obat['grandtotal']) ; ?>
							</td>
							<td>
								<?php echo $obat['lead_times']; ?>
							</td>
							<td>
								<?php if ($obat['id_status'] =='0'): ?>
									<span class="label label-danger">
												Belum Selesai
											</span>
										<?php else: ?>
											<span class="label label-success">
												<?php echo date('d F Y',strtotime($obat['tgl_dtng'])); ?>
											</span>
										<?php endif ?>
									</td>
								</form>


							</tr>
							<?php $no++ ?>
						<?php endforeach ?>
					</table>
					<div class="row">
						<div class="col"><?php echo $pagination; ?></div>
					</div>
					
				</div>
			</div>