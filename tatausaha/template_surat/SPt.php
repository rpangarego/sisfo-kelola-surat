<a href="index?m=surat_keluar">Kembali</a><br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Perintah Tugas</h1>
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
		    <label for="nama">Nama</label>
		    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="nip">NIP</label>
			    <input type="text" class="form-control" id="nip" name="nip" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="unit">Unit</label>
			    <input type="text" class="form-control" id="unit" name="unit" autocomplete="off" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="jabatan">Jabatan</label>
			    <input type="text" class="form-control" id="jabatan" name="jabatan" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="golongan">Golongan</label>
			    <input type="text" class="form-control" id="golongan" name="golongan" autocomplete="off" required>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="hari">Hari</label>
			    <input type="text" class="form-control" id="hari" name="hari" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="tgl">Tanggal</label>
			    <input type="date" class="form-control" id="tgl" name="tgl" autocomplete="off" required>
			</div>
		</div>
		<div class="form-group">
		    <label for="kegiatan">Kegiatan</label>
		    <textarea name="kegiatan" id="kegiatan" rows="2" class="form-control" required autocomplete="off"></textarea>
		</div>
		
		<div>
			<a href="index?m=surat_keluar" class="btn btn-outline-secondary">Batal</a>
			<button type="submit" class="btn btn-primary ml-2">Buat Surat</button>
		</div>
		</form>

	</div>
</div>