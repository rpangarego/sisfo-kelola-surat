<div class="row">
	<div class="col">
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link active" href="index?m=profil">Profil</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="index?m=ganti_password">Ganti Password</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="index?m=kelola_user">Kelola Pengguna</a>
		  </li>
		</ul>

		<h3 class="my-3">Profil</h3>
		<?php 
		// Ambil data pengguna dari tb_pengguna
		$user = $db->get_row("SELECT * FROM tb_pengguna WHERE id='$_SESSION[id_user]'");
		?>
		
		<div class="col-md-6">
			<?php if($_POST) include 'aksi.php'?>
			 <form method="POST">
			 <input type="hidden" name="id" value="<?= $_SESSION['id_user']; ?>">
			 <div class="form-group row">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>" autocomplete="off" required>
			 </div>
			 <div class="form-group row">
			    <label for="status">Status</label>
			    <input type="text" class="form-control" id="status" name="status" value="<?= ($user->level==1)? "Tata Usaha" : "Kepala Sekolah"; ?>" readonly>
			 </div>

			 <div class="float-right">
			 	<button type="submit" class="btn btn-primary">Simpan</button>
			 </div>
			 </form>
		</div>

		 
	</div>
</div>