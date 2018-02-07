<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Profile</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<center>
						<img src="<?= base_url( 'assets/img/user/' . $user->nip . '.jpg' ) ?>" class="img-thumbnail" style="width: 200px; height: 220px !important;">
					</center>
				</div>
				<div class="col-lg-8">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="table table-striped table-hover table-bordered">
								<tr>
									<td>
										<strong>NIP</strong>
									</td>
									<td>
										<?= $user->nip ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Nama</strong>
									</td>
									<td>
										<?= $user->nama ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Jabatan</strong>
									</td>
									<td>
										<?= $user->jabatan ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Bagian</strong>
									</td>
									<td>
										<?= $user->bagian ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Email</strong>
									</td>
									<td>
										<?= $user->email ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>No. HP</strong>
									</td>
									<td>
										<?= $user->no_hp ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Alamat</strong>
									</td>
									<td>
										<?= $user->alamat ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Jumlah Tacit</strong>
									</td>
									<td>
										<?= count($tacit) . ' buah' ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Jumlah Explicit</strong>
									</td>
									<td>
										<?= count($explicit) . ' buah' ?>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>