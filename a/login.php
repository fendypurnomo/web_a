<div class="container-fluid">
	<div class="row justify-content-center pt-5 pb-5">
		<div class="col-sm-8 col-md-6 col-lg-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Apps</h5>
					<h6 class="card-subtitle mb-3 text-muted">Silahkan masuk</h6>
					<div id="error"></div>
					<form class="form-horizontal" id="login" name="login" method="post" action="periksa">
						<div class="form-group">
							<label for="nama">Nama atau Email</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama pengguna atau email" autofocus>
							<div id="error-username"></div>
						</div>
						<div class="form-group">
							<label for="sandi">Sandi</label>
							<input type="password" class="form-control" id="sandi" name="sandi" placeholder="Kata sandi">
							<div id="error-password"></div>
						</div>
						<div class="form-group custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="ingat" name="ingat" value="1">
							<label class="custom-control-label" for="ingat">Ingat saya</label>
						</div>
						<button type="submit" class="btn btn-primary btn-block waves-effect waves-light" id="masuk">MASUK</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
