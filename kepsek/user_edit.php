<div class="row">
	<div class="col">
		<h3 class="my-4">Kelola Pengguna</h3>

		<?php 
			$row = $db->get_row("SELECT * FROM tb_pengguna WHERE id=$_GET[id]");
		?>

		<div class="col-md-4">
			<?php if($_POST) include 'aksi.php'?>
			 <form method="POST">
			 <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
			 <div class="form-group row">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" id="username" name="username" value="<?= $row->username; ?>" autocomplete="off" required>
			 </div>
			 <div class="form-group row">
			    <label for="level">Level</label>
			    <select name="level" id="level" class="form-control">
			    	<option hidden value="<?= $row->level; ?>"><?= ($row->level==1) ? 'Tata Usaha' : 'Kepala Sekolah'; ?></option>
			    	<option value="1">Tata Usaha</option>
			    	<option value="2">Kepala Sekolah</option>
			    </select>
			 </div>

			 <div class="btn-actions float-right">
			 	<a href="index?m=kelola_user" class="btn btn-outline-secondary">Batal</a>
			 	<button type="submit" class="btn btn-primary">Ubah</button>
			 </div>
			 </form>
		</div>

	</div>
</div>
