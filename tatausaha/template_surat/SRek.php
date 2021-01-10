<a href="index?m=surat_keluar">Kembali</a><br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Rekomendasi</h1>
<hr>

	
<?php include 'generate_noSurat.php'; ?>

<div class="row">
	<div class="col col-md-6">
		<?php if($_POST) include 'aksi.php'; ?>
		<form method="POST">
		<div class="form-group">
		    <label for="no_surat">No Surat</label>
		    <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $surat; ?>" readonly>
		</div>
		<div class="form-group">
		    <label for="nama_pemberi">Nama Pemberi</label>
		    <input type="text" class="form-control" id="nama_pemberi" name="nama_pemberi" autocomplete="off" required>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="nip_pemberi">NIP Pemberi</label>
			    <input type="text" class="form-control" id="nip_pemberi" name="nip_pemberi" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="jabatan_pemberi">Jabatan Pemberi</label>
			    <input type="text" class="form-control" id="jabatan_pemberi" name="jabatan_pemberi" autocomplete="off" required>
			</div>	
		</div>
		<hr>

		<div class="form-row">
			<div class="form-group col-md-8">
			    <label for="nama_siswa">Nama Siswa</label>
			    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" autocomplete="off" required>
			</div>
			<div class="form-group col-md-4">
			    <label for="kelas">Kelas</label>
			    <input type="text" class="form-control" id="kelas" name="kelas" autocomplete="off" required>
			</div>
		</div>

		<div class="form-group">
		    <label for="nama_ortu">Nama Orang Tua/Wali</label>
		    <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" autocomplete="off" required>
		</div>
		<div class="form-group">
		    <label for="alamat">Alamat</label>
		    <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" required>
		</div>

		<div class="form-group">
		    <label for="isi">Isi</label>
		    <textarea name="isi" id="isi" rows="2" class="form-control" required autocomplete="off"></textarea>
		</div>

		<div>
			<a href="index?m=surat_keluar" class="btn btn-outline-secondary">Batal</a>
			<button type="submit" class="btn btn-primary ml-2">Buat Surat</button>
		</div>
		</form>

	</div>
</div>