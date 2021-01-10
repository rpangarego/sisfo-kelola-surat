<div class="row">
	<div class="col">
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link" href="index?m=profil">Profil</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="index?m=ganti_password">Ganti Password</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link active" href="index?m=kelola_user">Kelola Pengguna</a>
		  </li>
		</ul>

		<h3 class="my-4">Kelola Pengguna</h3>

		<?php 
			$rows = $db->get_results("SELECT * FROM tb_pengguna");
		?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
        	  <div class="row mb-3">
        		<div class="col">
        			<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addUserModal">
					  Tambah User
					</button>
        		</div>
        	  </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php if (count($rows) < 1): ?>
                  		<tr>
	                      <td colspan="4" class="text-center">Tidak ada data</td>
	                    </tr>	
                  	<?php else: ?>
	                  	<?php foreach ($rows as $row): ?>
	                  	<tr>
	                      <th><?= ++$i; ?></th>
	                      <td><?= $row->username; ?></td>
	                      <td><?= ($row->level=='1') ? 'Tata Usaha' : 'Kepala Sekolah'; ?></td>
	                      <td>
	                      	<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#editUserModal<?= $row->id ?>">Edit</button>
	                      	<a href="aksi?act=user_hapus&id=<?= $row->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus user <?= $row->username; ?>?')">Hapus</a>
	                      </td>
	                    </tr>	

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col">
			<?php if($_POST) include 'aksi.php'?>
			 <form method="POST">
			 <input type="hidden" name="id" value="<?= $row->id; ?>">
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
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        	</form>
      </div>
    </div>
  </div>
</div>
	                  	<?php endforeach ?>
                  	<?php endif ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

	</div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col">
			<?php if($_POST) include 'aksi.php'?>
			 <form method="POST">
			 <div class="form-group row">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>" autocomplete="off" required>
			 </div>
			 <div class="form-group row">
			    <label for="password1">Password</label>
			    <input type="password" class="form-control" id="password1" name="password1" autocomplete="off" required>
			 </div>
			 <div class="form-group row">
			    <label for="password2">Konfirmasi Password</label>
			    <input type="password" class="form-control" id="password2" name="password2" autocomplete="off" required>
			 </div>

			 <div class="form-group row">
			    <label for="level">Level</label>
			    <select name="level" id="level" class="form-control">
			    	<option value="1">Tata Usaha</option>
			    	<option value="2">Kepala Sekolah</option>
			    </select>
			 </div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        	</form>
      </div>
    </div>
  </div>
</div>