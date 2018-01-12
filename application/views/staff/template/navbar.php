<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand" style="font-size: 20px;">
				<a href="<?= base_url('admin') ?>"><b>PT. Mitra Ogan</b></a>
			</div>
			<div class="container-fluid">
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- <img src="assets/img/user.png" class="img-circle" alt="Avatar"> --> <span><?= $nip ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('staff/profile') ?>"><i class="lnr lnr-user"></i> Profile</a></li>
								<li><a href="<?= base_url('staff/sunting-password') ?>"><i class="fa fa-key"></i> Sunting Password</a></li>
								<li><a href="<?= base_url('logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->