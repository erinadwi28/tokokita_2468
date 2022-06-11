<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Toko Kita - <?= $title ?></title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/dist') ?>/modules/chocolat/dist/css/chocolat.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/dist') ?>/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/admin/dist') ?>/css/components.css">
</head>

<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<a href="http://localhost/tokokita/index.php" class="navbar-brand sidebar-gone-hide">Tokokita</a>
				<div class="navbar-nav">
					<a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
				</div>
				<div class="nav-collapse">
					<a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
						<i class="fas fa-ellipsis-v"></i>
					</a>
					<ul class="navbar-nav">
					<li class="nav-item active"><a href="<?= base_url('beranda') ?>" class="nav-link">Beranda</a></li>
					<li class="nav-item"><a href="<?= base_url('keranjang') ?>" class="nav-link">Keranjang</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
						<li class="nav-item"><a href="#" class="nav-link">Hubungi Kami</a></li>
					</ul>
				</div>
				<form class="form-inline ml-auto">
					<ul class="navbar-nav">
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
									class="fas fa-search"></i></a></li>
					</ul>
					<div class="search-element">
						<select data-width="150" class="form-control">
							<option class="form-control">Baju Laki-laki</option>
							<option class="form-control">Celana Cowok</option>
							<option class="form-control">Baju Cewek</option>
						</select>
						<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="300">
						<button class="btn" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</form>
				<ul class="navbar-nav navbar-right ml-4">
					<li>
						<?php if ($this->session->userdata('username')){ ?>
						<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<figure class="avatar mr-2 avatar-sm">
								<img alt="image" src="<?= base_url('assets/admin/dist') ?>/img/avatar/avatar-1.png"
									class="rounded-circle mr-1">
								<i class="avatar-presence online"></i>
							</figure>

							<div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('username'); ?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="<?= base_url('dashboard-member') ?>" class="dropdown-item has-icon">
								<i class="fas fa-tachometer-alt"></i> Dashboard
							</a>
							<a href="#" class="dropdown-item has-icon">
								<i class="fas fa-user"></i> Profil Saya
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>


						<?php } else { ?>
						<a href="<?= base_url('login') ?>" class="btn btn-outline-light">Masuk</a>
						&nbsp; &nbsp; &nbsp;
						<a href="<?= base_url('daftar') ?>" class="btn btn-outline-light">Daftar</a>
						<?php } ?>

					</li>

				</ul>


			</nav>

			<nav class="navbar navbar-secondary navbar-expand-lg">
				<div class="container">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="#" class="nav-link"><span>Baju Laki-laki</span></a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><span>Celana Cowok</span></a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><span>Baju Cewek</span></a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- Main Content -->

			<?= $contents ?>

			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2022 <div class="bullet"></div> Made with &hearts; By Erina Dwi Utami
				</div>
				<div class="footer-right">
					v.1.1
				</div>
			</footer>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= base_url('assets/admin/dist') ?>/js/stisla.js"></script>

	<!-- JS Libraies -->
	<!-- JS Libraies -->
	<script src="<?= base_url('assets/admin/dist') ?>/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
	<script src="<?= base_url('assets/admin/dist') ?>/modules/jquery-ui/jquery-ui.min.js"></script>
	<!-- Page Specific JS File -->

	<!-- Template JS File -->
	<script src="<?= base_url('assets/admin/dist') ?>/js/scripts.js"></script>
	<script src="<?= base_url('assets/admin/dist') ?>/js/custom.js"></script>
</body>

</html>
