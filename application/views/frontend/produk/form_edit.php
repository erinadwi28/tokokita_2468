<div class="main-content">
	<section class="section">

		<div class="section-header">
			<h1>Produk</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('list-produk'); ?>">List Produk</a></div>
				<div class="breadcrumb-item">Edit Produk</div>
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
								<li class="nav-item"><a href="<?= base_url('list-toko-saya') ?>" class="nav-link">Toko</a></li>
								<li class="nav-item"><a href="<?= base_url('list-produk') ?>"
										class="nav-link  active">Produk</a></li>
								<li class="nav-item"><a href="<?= base_url('list-pesanan') ?>" class="nav-link">Pesanan</a></li>
								<li class="nav-item"><a href="<?= base_url('laporan') ?>" class="nav-link">Laporan</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card card-primary">
						<div class="card-header">
							<h4>Edit Produk</h4>
							<div class="card-header-action">
								<a href="<?= base_url('list-produk'); ?>" class="btn btn-danger">
									Kembali
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-9">
									<form method="POST" enctype="multipart/form-data"
										action="<?= base_url('frontend/editProduk'); ?>" class="needs-validation" novalidate="">
										<input type="hidden" name="idProduk" value="<?= $produk->idProduk; ?>">
										<div class="form-group row">
											<label for="inputNamaProduk" class="col-sm-3 col-form-label">Nama
												Produk</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="inputNamaProduk" name="namaProduk"
													placeholder="Nama Produk" value="<?= $produk->namaProduk; ?>" required>
												<div class="invalid-feedback" >
													Nama produk tidak boleh kosong !
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label for="inputKurir" class="col-sm-3 col-form-label">Kategori</label>
											<div class="col-sm-9">
												<select class="form-control" name="idKat" id="idKat" required>
													<?php foreach($kategori as $item) { ?>
													<option
														<?php if($produk->idKat == $item->idKat) { echo 'selected="selected"';} ?>
														value="<?= $item->idKat; ?>"><?= $item->namakat; ?></option>
													<?php } ?>
												</select>
												<div class="invalid-feedback">
													Kategori tidak boleh kosong !
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label for="inputToko" class="col-sm-3 col-form-label">Toko</label>
											<div class="col-sm-9">
												<select class="form-control" name="idToko" id="idToko" required>
													<?php foreach($toko as $item) { ?>
													<option
														<?php if($produk->idToko == $item->idToko) { echo 'selected="selected"';} ?>
														value="<?= $item->idToko; ?>"><?= $item->namaToko; ?></option>
													<?php } ?>
												</select>
												<div class="invalid-feedback">
													Toko tidak boleh kosong !
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="inputHargaProduk" class="col-sm-6 col-form-label">Harga</label>
												<div class="col-sm-12">
													<input type="number" class="form-control" id="inputHargaProduk" name="harga"
														placeholder="Harga Produk" value="<?= $produk->harga; ?>" required>
													<div class="invalid-feedback">
														Harga produk tidak boleh kosong !
													</div>
												</div>
											</div>

											<div class="form-group col-md-4">
												<label for="inputStokProduk" class="col-sm-6 col-form-label">Stok</label>
												<div class="col-sm-12">
													<input type="number" class="form-control" id="inputStokProduk" name="stok"
														placeholder="Stok Produk" value="<?= $produk->stok; ?>" required>
													<div class="invalid-feedback">
														Stok produk tidak boleh kosong !
													</div>
												</div>
											</div>

											<div class="form-group col-md-4">
												<label for="inputBeratProduk" class="col-sm-6 col-form-label">Berat</label>
												<div class="col-sm-12">
													<input type="number" class="form-control" id="inputBeratProduk" name="berat"
														placeholder="Berat Produk" value="<?= $produk->berat; ?>" required>
													<div class="invalid-feedback">
														Berat produk tidak boleh kosong !
													</div>
												</div>
											</div>
										</div>


										<div class="form-group row">
											<label for="inputDeskripsi" class="col-sm-3 col-form-label">Deskripsi
												Produk</label>
											<div class="col-sm-9">
												<textarea name="deskripsiProduk" id="inputDeskripsi" placeholder="Deskripsi Produk"
													required class="form-control"
													rows="3"><?= $produk->deskripsiProduk; ?></textarea>
												<div class="invalid-feedback">
													Deskripsi produk tidak boleh kosong !
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label for="inputImage" class="col-sm-3 col-form-label">Gambar
												Produk</label>
											<div class="col-sm-9">
												<div class="form-group-upload">
													<div class="custom-file">
														<label class="custom-file-label" for="file-upload">pilih file...</label>
														<input type="file" class="custom-file-input" id="file-upload" name="berkas"
															value="">
														
													</div>
												</div>
											</div>
										</div>

										<div class="mb-2">
											<button type="submit" class="btn btn-success mt-4">Simpan</button>
										</div>
									</form>
								</div>

								<div class="col-md-3">
									<div class="mb-2 text-muted text-center">Click image !</div>
									<div class="chocolat-parent">
										<a href="<?= base_url(); ?>assets/member/produk/<?= $produk->foto; ?>" class="chocolat-image"
											title="Gambar Produk">
											<div data-crop-image="285">
												<img alt="image" src="<?= base_url(); ?>assets/member/produk/<?= $produk->foto; ?>"
													class="img-fluid">
											</div>
										</a>
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
