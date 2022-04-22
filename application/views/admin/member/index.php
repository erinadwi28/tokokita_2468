<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Manajemen Member</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('Adminpanel/dashboard'); ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Member</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Data Member</h2>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Data Member</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-md">
									<tr>
										<th>#</th>
										<th>Username</th>
										<th>Nama Konsumen</th>
										<th>Alamat</th>
										<th>Email</th>
										<th>Telepon</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									<?php 
									$no = 1;
									foreach($member as $item) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $item->username; ?></td>
										<td><?= $item->namaKonsumen; ?></td>
										<td><?= $item->alamat; ?></td>
										<td><?= $item->email; ?></td>
										<td><?= $item->tlpn; ?></td>
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
										<!-- button action -->
										<?php if ($item -> statusAktif == 'Y'){ ?>
										<td>
											<a href="<?= base_url('member/nonAktif/' . $item->idKonsumen); ?>" class="btn btn-sm btn-warning">Non Aktif</a>
										</td>
										<?php } else { ?>
										<td>
										<a href="<?= base_url('member/aktif/' . $item->idKonsumen); ?>" class="btn btn-sm btn-primary">Aktif</a>
										</td>
										<?php } ?>
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
