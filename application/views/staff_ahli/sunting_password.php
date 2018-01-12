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
					<h3 class="panel-title">Sunting Password</h3>
				</div>
				<div class="panel-body">
					<?= $this->session->flashdata('msg') ?>
					<div class="row">
						<div class="col-md-12">
							<?= form_open('staff-ahli/sunting-password') ?>
								<div class="form-group">
									<label for="password_lama">Password Lama</label>
									<input type="password" name="password_lama" class="form-control">
								</div>
								<div class="form-group">
									<label for="password_baru">Password Baru</label>
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