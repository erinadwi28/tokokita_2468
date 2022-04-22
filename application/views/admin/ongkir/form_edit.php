<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Manajemen Ongkos Kirim</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('Adminpanel/dashboard'); ?>">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="<?= base_url('ongkir'); ?>">Ongkos Kirim</a></div>
				<div class="breadcrumb-item">Edit</div>
			</div>
		</div>
		<div class="section-body">
			<h2 class="section-title">Forms</h2>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<form method="POST" action="<?= base_url('ongkir/edit'); ?>" class="needs-validation" novalidate="">
					<input type="hidden" name="idBiayaKirim" value="<?= $ongkir->idBiayaKirim; ?>">
						<div class="card">
							<div class="card-header">
								<h4>Form Edit Ongkos Kirim</h4>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<label for="inputKurir" class="col-sm-3 col-form-label">Nama
										Kurir</label>
									<div class="col-sm-9">
										<select class="form-control" name="idKurir" id="idKurir" required>
											<?php foreach($kurir as $item) { ?>
											<option <?php if($ongkir->idKurir == $item->idKurir) { echo 'selected="selected"';} ?>
												value="<?= $item->idKurir; ?>"><?= $item->namaKurir; ?></option>

											<?php } ?>
										</select>
										<div class="invalid-feedback">
											Nama kurir tidak boleh kosong !
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="kotaAsal" class="col-sm-3 col-form-label">Kota
										Asal</label>
									<div class="col-sm-9">
										<select class="form-control" name="idKotaAsal" id="idKotaAsal" required>
											<?php foreach($kota as $item) { ?>
											<option
												<?php if($ongkir->idKotaAsal == $item->idKota) { echo 'selected="selected"';} ?>
												value="<?= $item->idKota; ?>"><?= $item->namaKota; ?></option>

											<?php } ?>
										</select>
										<div class="invalid-feedback">
											Kota asal tidak boleh kosong !
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="kotaTujuan" class="col-sm-3 col-form-label">Kota Tujuan</label>
									<div class="col-sm-9">
										<select class="form-control" name="idKotaTujuan" id="idKotaTujuan" required>
											<?php foreach($kota as $item) { ?>
											<option
												<?php if($ongkir->idKotaTujuan == $item->idKota) { echo 'selected="selected"';} ?>
												value="<?= $item->idKota; ?>"><?= $item->namaKota; ?></option>
											<?php } ?>
										</select>
										<div class="invalid-feedback">
											Kota tujuan tidak boleh kosong !
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputOngkir" class="col-sm-3 col-form-label">Ongkos Kirim</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="biaya" name="biaya" placeholder="Ongkos Kirim"
											value="<?= $ongkir->biaya; ?>" required>
											<div class="invalid-feedback">
											Ongkos kirim tidak boleh kosong !
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
