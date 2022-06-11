<div class="main-content">
	<section class="section">

		<div class="section-header">
		<!-- <i class="fas fa-store fa-4x"></i> -->
			<h1>Produk</h1>
			<div class="section-header-breadcrumb">
				<!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div> -->
				<div class="breadcrumb-item">List Produk</div>
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
								<li class="nav-item"><a href="<?= base_url('dashboard-member') ?>" class="nav-link ">Beranda</a></li>
								<li class="nav-item"><a href="<?= base_url('list-toko-saya') ?>" class="nav-link">Toko</a></li>
								<li class="nav-item"><a href="<?= base_url('list-produk') ?>" class="nav-link active">Produk</a></li>
								<li class="nav-item"><a href="<?= base_url('list-pesanan') ?>" class="nav-link">Pesanan</a></li>
								<li class="nav-item"><a href="<?= base_url('laporan') ?>" class="nav-link">Laporan</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card card-primary">
						<div class="card-header">
							<h4>List Produk Toko Saya</h4>
							<div class="card-header-action">
								<a href="<?= base_url('buat-produk'); ?>" class="btn btn-primary">
									Tambah Produk
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-md">
									<tr>
										<th>#</th>
										<th>Nama Toko</th>
                              <th>Nama Produk</th>
                              <th>Kategori</th>
                              <th>Stok</th>
                              <th>Harga</th>
										<th width="180">Action</th>
									</tr>
									<?php 
									$no = 1;
									foreach($produk as $item) { ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $item->namaToko; ?></td>
										<td><?= $item->namaProduk; ?></td>
										<td><?= $item->namakat; ?></td>
										<td><?= $item->stok; ?></td>
										<td><?= $item->harga; ?></td>
										<td><a href="<?= base_url('edit-produk/' . $item->idProduk); ?>"
												class="btn btn-sm btn-primary mr-2">Detail<a>
                                    <a href="<?= base_url('hapus-produk/' . $item->idProduk); ?>"
												class="btn btn-sm btn-danger mr-2">Hapus<a>
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
