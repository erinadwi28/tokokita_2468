<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Manajemen Kategori</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#">Components</a></div>
				<div class="breadcrumb-item">Form</div>
			</div>
		</div>
		<div class="section-body">
			<h2 class="section-title">Forms</h2>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<form method="POST" action="<?= base_url('kategori/edit'); ?>">
					<input type="hidden" name="id" value="<?= $kategori->idKat; ?>">
						<div class="card">
							<div class="card-header">
								<h4>Form Edit Kategori</h4>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<label for="inputKategori" class="col-sm-3 col-form-label">Nama
										Kategori</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="inputKategori" name="namaKategori"
											placeholder="Nama Kategori" value="<?= $kategori->namakat; ?>">
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
