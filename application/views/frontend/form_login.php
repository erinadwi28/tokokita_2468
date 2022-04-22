<div class="main-content">
	<section class="section">

		<div class="row">
			<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

				<div class="card card-primary">
					<div class="card-header">
						<h4>Login</h4>
					</div>

					<div class="card-body">
						<form method="POST" action="<?= base_url('loginmember/aksi_login') ?>"
							class="needs-validation" novalidate="">
							<div class="form-group">
								<label for="username">Username</label>
								<input id="username" type="text" class="form-control" name="username" tabindex="1" required
									autofocus>
								<div class="invalid-feedback">
									Username tidak boleh kosong !
								</div>
							</div>

							<div class="form-group">
								<div class="d-block">
									<label for="password" class="control-label">Password</label>
									<!-- <div class="float-right">
												<a href="auth-forgot-password.html" class="text-small">
													Forgot Password?
												</a>
											</div> -->
								</div>
								<input id="password" type="password" class="form-control" name="password" tabindex="2" required>
								<div class="invalid-feedback">
									Password tidak boleh kosong !
								</div>
							</div>


							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
									Login
								</button>
							</div>
						</form>

					</div>
				</div>

			</div>

		</div>
	</section>
</div>
