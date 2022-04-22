<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Manajemen Kurir</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('Adminpanel/dashboard'); ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('kurir'); ?>">Kurir</a></div>
				<div class="breadcrumb-item">Tambah</div>
			</div>
		</div>
		<div class="section-body">
			<h2 class="section-title">Forms</h2>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<form method="POST" action="<?= base_url('kurir/save'); ?>" class="needs-validation" novalidate="">
						<div class="card">
							<div class="card-header">
								<h4>Form Tambah Kurir</h4>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<label for="inputKurir" class="col-sm-3 col-form-label">Nama
										Kurir</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputKurir" name="namaKurir"
											placeholder="Nama Kurir" required>
											<div class="invalid-feedback">
											Nama kurir tidak boleh kosong !
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer text-right">
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>
</section>
</div>
