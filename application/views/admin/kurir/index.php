<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Manajemen Kurir</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('Adminpanel/dashboard'); ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Kurir</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Data Kurir</h2>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card">
						<div class="card-header">
							<h4>Data Kurir</h4> <a href="<?= base_url('kurir/add'); ?>" class="btn btn-primary">Tambah
								Kurir</a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-md">
									<tr>
										<th>#</th>
										<th>Nama Kurir</th>
										<th>Action</th>
									</tr>
									<?php 
                           $no = 1;
                           foreach($kurir as $item) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $item->namaKurir; ?></td>
										<td><a href="<?= base_url('kurir/getid/' . $item->idKurir); ?>"
												class="btn btn-warning">Edit</a>
											<a href="<?= base_url('kurir/deleteKurir/' . $item->idKurir); ?>"
												class="btn btn-danger">Hapus</a>
										</td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>
						<div class="card-footer text-right">
							<nav class="d-inline-block">
								<ul class="pagination mb-0">
									<li class="page-item disabled">
										<a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1 <span
												class="sr-only">(current)</span></a></li>
									<li class="page-item">
										<a class="page-link" href="#">2</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item">
										<a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				
			</div>

		</div>
	</section>
</div>
