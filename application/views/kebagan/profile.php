<style type="text/css">
	small i {
		color: green;
		opacity: 0.7;
	}
</style>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Profile</h3>
				</div>
				<div class="panel-body">
					<?= $this->session->flashdata('msg') ?>
					<div class="row">
						<div class="col-md-4">
							<img src="<?= base_url('assets/img/user/' . $nip . '.jpg') ?>" width="210" height="240">
						</div>
						<div class="col-md-8">
							<?= form_open_multipart('kebagan/profile') ?>
								<div class="form-group">
									<label for="nip">NIP</label>
									<input type="text" name="nip" value="<?= $user->nip ?>" class="form-control">
								</div>
								<div class="form-group">
									<label for="nama">Nama</label>
									<input type="text" name="nama" value="<?= $user->nama ?>" class="form-control">
								</div>
								<!-- <div class="form-group">
									<label for="jabatan">Jabatan</label>
									<input type="text" name="jabatan" value="<?= $user->jabatan ?>" class="form-control">
								</div> -->
								<div class="form-group">
									<label for="bagian">Bagian</label>
									<input type="text" name="bagian" value="<?= $user->bagian ?>" class="form-control">
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" value="<?= $user->email ?>" class="form-control">
								</div>
								<div class="form-group">
									<label for="no_hp">No. HP</label>
									<input type="text" name="no_hp" value="<?= $user->no_hp ?>" class="form-control">
								</div>
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea class="form-control" name="alamat"><?= $user->alamat ?></textarea>
								</div>
								<div class="form-group">
									<label for="foto">Foto Profile <small><i>(Lengkapi form ini jika ingin mengubah foto profile dalam format jpg/jpeg)</i></small></label>
									<input type="file" name="foto" class="form-control" accept="image/jpeg">
								</div>
								<div class="form-group">
									<label for="password_lama">Password Lama <small><i>(Lengkapi form ini jika ingin mengubah password)</i></small></label>
									<input type="password" name="password_lama" class="form-control">
								</div>
								<div class="form-group">
									<label for="password_baru">Password Baru <small><i>(Lengkapi form ini jika ingin mengubah password)</i></small></label>
									<input type="password" name="password_baru" class="form-control">
								</div>
								<div class="form-group">
									<label for="password_lagi">Password Lagi <small><i>(Form ini harus sama dengan password baru)</i></small></label>
									<input type="password" name="password_lagi" class="form-control">
								</div>
								<input type="submit" class="btn btn-success" name="submit" value="Submit">
							<?= form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>