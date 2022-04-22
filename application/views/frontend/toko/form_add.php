<div class="main-content">
	<section class="section">

		<div class="section-header">
			<h1>Toko</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('list-toko-saya'); ?>">List Toko</a></div>
              <div class="breadcrumb-item">Buat Toko</div>
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
							<h4>Buat Toko</h4>
							<div class="card-header-action">
								<a href="<?= base_url('list-toko-saya'); ?>" class="btn btn-danger">
									Kembali
								</a>
							</div>
						</div>
						<div class="card-body">
							<form method="POST" enctype="multipart/form-data" action="<?= base_url('frontend/save_toko'); ?>" class="needs-validation"
								novalidate="">
								<div class="form-group row">
									<label for="inputToko" class="col-sm-3 col-form-label">Nama
										Toko</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputToko" name="namaToko"
											placeholder="Nama Toko" required>
										<div class="invalid-feedback">
											Nama toko tidak boleh kosong !
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputDeskripsi" class="col-sm-3 col-form-label">Deskripsi
										Toko</label>
									<div class="col-sm-9">
										<textarea name="deskripsi" id="inputDeskripsi" placeholder="Deskripsi Toko" required
											class="form-control" rows="3"></textarea>
										<div class="invalid-feedback">
											Deskripsi toko tidak boleh kosong !
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputLogo" class="col-sm-3 col-form-label">Logo
										Toko</label>
									<div class="col-sm-9">
										<div class="form-group-upload">
											<div class="custom-file">
												<label class="custom-file-label" for="file-upload">pilih file...</label>
												<input type="file" class="custom-file-input" id="file-upload" name="berkas" value=""
													required>
												<div class="invalid-feedback">
													Logo toko tidak boleh kosong !
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="text-center mb-2">
									<button type="submit" class="btn btn-success mt-4">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>
