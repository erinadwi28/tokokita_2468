<div class="main-content">
	<section class="section">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="card-body">
						<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100"
										src="<?= base_url(); ?>assets/member/banner/banner_1.png"
										alt="First slide">
									<div class="carousel-caption d-none d-md-block">
										<!-- <h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua.</p> -->
									</div>
								</div>
								<div class="carousel-item">
									<img class="d-block w-100"
										src="<?= base_url(); ?>assets/member/banner/banner_2.png"
										alt="Second slide">
									<div class="carousel-caption d-none d-md-block">
										<!-- <h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua.</p> -->
									</div>
								</div>
								<!-- <div class="carousel-item">
									<img class="d-block w-100"
										src="http://localhost/tokokita_fj/assets/admin/assets/img/news/tiga.jpg"
										alt="Third slide">
									<div class="carousel-caption d-none d-md-block">
										<h5>Heading</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div> -->
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
								data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
								data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Produk Terbaru</h2>
			<p class="section-lead">Ragam produk baru yang hadir untuk Anda.</p>

			<div class="row">
			<?php foreach($produk_terbaru as $item) { ?>
				<div class="col-12 col-sm-6 col-md-6 col-lg-3">
					<article class="article">
						<div class="article-header">
							<div class="article-image"
								data-background="<?= base_url(); ?>assets/member/produk/<?= $item->foto; ?>">
							</div>
							<div class="article-title">

								<h2><a href="#"><?= $item->namaProduk; ?></a></h2>
							</div>
						</div>

						<div class="article-details">

							<p><?= character_limiter($item->deskripsiProduk, 20); ?></p>
							<p>Rp <?= rupiah($item->harga); ?></p>
							<div class="article-cta">
								<a href="<?= base_url('frontend/cart_tambah/' . $item->idProduk); ?>"
									class="btn btn-primary">Add
									to cart</a>
							</div>
						</div>

					</article>
				</div>
			<?php } ?>


			</div>

			<h2 class="section-title">Produk Terlaris</h2>
			<p class="section-lead">Ragam produk best seller untuk Anda.</p>
			
			<div class="row">
			<?php foreach($produk as $item) { ?>
				<div class="col-12 col-sm-6 col-md-6 col-lg-3">
					<article class="article">
						<div class="article-header">
							
							<div class="article-image" data-background="<?= base_url(); ?>assets/member/produk/<?= $item->foto; ?>">
							</div>
							<div class="article-title">
								<h2><a href="#"><?= $item->namaProduk; ?></a></h2>
							</div>
						</div>
						<div class="article-details">
							<p><?= character_limiter($item->deskripsiProduk, 20); ?></p>
							<p>Rp <?= rupiah($item->harga); ?></p>
							<div class="article-cta">
							<a href="<?= base_url('frontend/cart_tambah/' . $item->idProduk); ?>"
									class="btn btn-primary">Add
									to cart</a>
							</div>
						</div>
					</article>
				</div>
				<?php } ?>
			</div>
			
		</div>
	</section>
</div>
