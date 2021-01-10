<a href="index?m=surat_keluar">Kembali</a><br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Keterangan Biasa</h1>
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
		    <label for="nisn">NISN</label>
		    <input type="text" class="form-control" id="nisn" name="nisn" autocomplete="off" required>
		</div>
		<div class="form-group">
		    <label for="nama">Nama</label>
		    <input type="text" class="form-control" id="nama" name="nama"  autocomplete="off" required>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="tempat_lahir">Tempat Lahir</label>
			    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="tgl_lahir">Tanggal Lahir</label>
			    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" autocomplete="off" required>
			</div>
		</div>
		<div class="form-group">
		    <label for="kelas">Kelas</label>
		    <input type="text" class="form-control" id="kelas" name="kelas" autocomplete="off" required>
		</div>
		<div class="form-group">
		    <label for="isi_surat">Isi</label>
		    <textarea name="isi_surat" id="isi_surat" rows="3" class="form-control" required autocomplete="off"></textarea>
		</div>
		<div>
			<a href="index?m=surat_keluar" class="btn btn-outline-secondary">Batal</a>
			<button type="submit" class="btn btn-primary ml-2">Buat Surat</button>
		</div>
		</form>

	</div>
</div>