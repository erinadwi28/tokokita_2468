<div class="main-content">
	<section class="section">

		<div class="section-header">
		<!-- <i class="fas fa-store fa-4x"></i> -->
			<h1>Toko</h1>
			<div class="section-header-breadcrumb">
				<!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div> -->
				<div class="breadcrumb-item">List Toko</div>
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
								<li class="nav-item"><a href="<?= base_url('frontend') ?>" class="nav-link ">Beranda</a></li>
								<li class="nav-item"><a href="<?= base_url('list-toko-saya') ?>" class="nav-link active">Toko</a></li>
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
							<h4>Toko Saya</h4>
							<div class="card-header-action">
								<a href="<?= base_url('buat-toko-saya'); ?>" class="btn btn-primary">
									Buat Toko
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-md">
									<tr>
										<th>#</th>
										<th>Nama Toko</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									<?php 
									$no = 1;
									foreach($toko as $item) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $item->namaToko; ?></td>
										<!-- status -->
										<?php if ($item -> statusAktif == 'Y'){ ?>
										<td>
											<div class="badge badge-pill badge-success mb-1 ">Aktif</div>
										</td>
										<?php } else { ?>
										<td>
											<div class="badge badge-pill badge-danger mb-1 ">Tidak Aktif</div>
										</td>
										<?php } ?>
										<td><a href="<?= base_url('edit-toko-saya/' . $item->idToko); ?>"
												class="btn btn-sm btn-primary mr-2">Detail<a>
											<!-- btn aktif/non aktif -->
											<?php if ($item -> statusAktif == 'Y'){ ?>

											<a href="<?= base_url('frontend/nonAktifToko/' . $item->idToko); ?>"
												class="btn btn-sm btn-warning">Non Aktif</a>

											<?php } else { ?>

											<a href="<?= base_url('frontend/aktifToko/' . $item->idToko); ?>"
												class="btn btn-sm btn-primary">Aktif</a>

											<?php } ?>
										</td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>
