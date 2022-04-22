<div class="main-content">
	<section class="section">
		<div class="row">
			<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
				<div class="card card-primary">
					<div class="card-header">
						<h4>Daftar Akun Pengguna</h4>
					</div>

					<div class="card-body">
					<?php if ($this->session->flashdata('success')) { ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('success') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php } elseif ($this->session->flashdata('error')) { ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('error') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php } ?>

						<form method="POST" action="<?= base_url('aksi-daftar') ?>" class="needs-validation"
							novalidate="">
							<div class="row">
								<div class="form-group col-6">
									<label for="namaKonsumen">Nama Lengkap</label>
									<input id="namaKonsumen" type="text" class="form-control" name="namaKonsumen" autofocus required>
									<div class="invalid-feedback">
										Nama lengkap tidak boleh kosong !
									</div>
								</div>
								<div class="form-group col-6">
									<label for="email">Email</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Email tidak boleh kosong !
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="username">Username</label>
								<input id="username" type="text" class="form-control" name="username" required>
								<div class="invalid-feedback">
									Username tidak boleh kosong !
								</div>
							</div>

							<div class="row">
								<div class="form-group col-6">
									<label for="password" class="d-block">Password</label>
									<input id="password" type="password" class="form-control pwstrength"
										data-indicator="pwindicator" name="password" required>
									<div class="invalid-feedback">
										Password tidak boleh kosong !
									</div>
									<div id="pwindicator" class="pwindicator">
										<div class="bar"></div>
										<div class="label"></div>
									</div>
								</div>
								<div class="form-group col-6">
									<label for="password2" class="d-block">Password Confirmation</label>
									<input id="password2" type="password" class="form-control" name="password_confirm" required>
									<div class="invalid-feedback">
										Password Confirmation tidak boleh kosong !
									</div>
								</div>
							</div>

							<div class="form-divider">
								Alamat Anda
							</div>
							<div class="row">
								<div class="form-group col-12">
									<label for="alamat">Alamat</label>
									<input id="alamat" type="text" class="form-control" name="alamat" required>
									<div class="invalid-feedback">
										Alamat tidak boleh kosong !
									</div>
								</div>
								<div class="form-group col-6">
									<label>Kota</label>
									<select class="form-control" name="idKota" id="idKota" required>
										<option value="">pilih kota</option>
										<?php foreach($kota as $item) { ?>
										<option value="<?= $item->idKota;?>"><?= $item->namaKota;?>
										</option>
										<?php } ?>
									</select>
									<div class="invalid-feedback">
										Kota tidak boleh kosong !
									</div>
								</div>
								<div class="form-group col-6">
									<label>No Telpon</label>
									<input type="text" class="form-control" name="tlpn" required>
									<div class="invalid-feedback">
										No Telepon tidak boleh kosong !
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg btn-block">
									Daftar
								</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>
