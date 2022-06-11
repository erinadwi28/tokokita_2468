<div class="main-content">
	<section class="section">

		<div class="section-header">
			<h1>Dashboard</h1>
			<div class="section-header-breadcrumb">
				<!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div> -->
				<div class="breadcrumb-item">Dashboard</div>
			</div>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">
							<h4>Menu</h4>
						</div>
						<div class="card-body">
							<ul class="nav nav-pills flex-column">
								<li class="nav-item"><a href="<?= base_url('dashboard-member') ?>" class="nav-link active">Beranda</a>
								</li>
								<li class="nav-item"><a href="<?= base_url('list-toko-saya') ?>" class="nav-link">Toko</a></li>
								<li class="nav-item"><a href="<?= base_url('list-produk') ?>" class="nav-link">Produk</a></li>
								<li class="nav-item"><a href="<?= base_url('list-pesanan') ?>" class="nav-link">Pesanan</a></li>
								<li class="nav-item"><a href="<?= base_url('laporan') ?>" class="nav-link">Laporan</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card card-primary">
						<div class="card-header">
							<h4>Total Data</h4>
							<!-- <div class="card-header-action">
								<a href="<?= base_url('buat-toko-saya'); ?>" class="btn btn-primary">
									Buat Toko
								</a>
							</div> -->
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6 col-12">
									<div class="card card-statistic-1">
										<div class="card-icon bg-primary">
											<i class="far fa-user"></i>
										</div>
										<div class="card-wrap">
											<div class="card-header">
												<h4>Total Toko</h4>
											</div>
											<?php foreach($jml_toko as $jml) { ?>
											<div class="card-body">
												<?= $jml->total_toko; ?>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-6 col-12">
									<div class="card card-statistic-1">
										<div class="card-icon bg-danger">
											<i class="far fa-newspaper"></i>
										</div>
										<div class="card-wrap">
											<div class="card-header">
												<h4>Total Produk</h4>
											</div>
											<?php foreach($jml_produk as $jml) { ?>
											<div class="card-body">
												<?= $jml->total_produk; ?>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-6 col-12">
									<div class="card card-statistic-1">
										<div class="card-icon bg-warning">
											<i class="far fa-file"></i>
										</div>
										<div class="card-wrap">
											<div class="card-header">
												<h4>Total Pesanan</h4>
											</div>
											<?php foreach($jml_pesanan as $jml) { ?>
											<div class="card-body">
												<?= $jml->total_pesanan; ?>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>
