<div class="main-content">
	<section class="section">

		<div class="section-header">
			<!-- <i class="fas fa-store fa-4x"></i> -->
			<h1>Keranjang</h1>
			<div class="section-header-breadcrumb">
				<!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div> -->
				<div class="breadcrumb-item">List Keranjang</div>
			</div>
		</div>

		<div class="section-body">
			<div class="row">

				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h4>Produk dalam keranjang saya</h4>

						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-md">
									<tr>
										<th>NO</th>
										<th>Nama Produk</th>
										<th>Gambar</th>
										<th>Harga</th>
										<th>qty</th>
										<th>Sub Total</th>
										<th>Aksi</th>
									</tr>
									<?php 
                              $total = 0;
                              $i = 1;
                              $cart = $this->cart->contents();
                              foreach($cart as $val){
                              $total = $total + $val['subtotal']; ?>

									   <tr>
										   <td><?= $i++; ?></td>
										   <td><?= $val['name']; ?></td>
										   <td><?= $val['gambar']; ?></td>

										   <td>Rp <?= rupiah($val['price']); ?></td>
										   <td><input type="number" min="1" value="<?= $val['qty']; ?>"></td>
										   <td>Rp <?= rupiah($val['price'] * $val['qty']); ?></td>
										   <td>
											   <a href="<?= base_url('frontend/hapus_cart/'.$val['rowid']); ?>"
												class="btn btn-danger">Hapus</a>
										   </td>
									   </tr>

									<?php } ?>

									<tr>
										<th>Total</th>
										<th>Rp <?= rupiah($total); ?></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th>
											<a href="<?= base_url('frontend/selesai_belanja'); ?>" class="btn btn-success">Selesai
												Belanja</a>
										</th>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
