<div class="row">
	<div class="col">
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link" href="index?m=profil">Profil</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link active" href="index?m=ganti_password">Ganti Password</a>
		  </li>
		</ul>

		<h3 class="my-4">Ganti Password</h3>
		<div class="col-md-6">
			<?php if($_POST) include 'aksi.php'; ?>
			<form method="POST">
				 <div class="form-group row">
				    <label for="password_old" class="col-sm-4 col-form-label">Password Lama</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password_old" name="password_old">
				    </div>
				 </div>
				 <div class="form-group row">
				    <label for="password_baru" class="col-sm-4 col-form-label">Password Baru</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password_baru" name="password_baru">
				    </div>
				 </div>
				 <div class="form-group row">
				    <label for="password_confirm" class="col-sm-4 col-form-label">Konfirmasi Password</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password_confirm" name="password_confirm">
				    </div>
				 </div>
				 <div class="float-right">
				 	<button type="submit" class="btn btn-primary">Simpan</button>
				 </div>
			</form>
		</div>
	</div>
</div>