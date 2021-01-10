<a href="index?m=surat_keluar">Kembali</a><br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Pemanggilan Orang Tua</h1>
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
		    <label for="nama">Nama Siswa</label>
		    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
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
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="jam_mulai">Jam Mulai</label>
			    <input type="text" class="form-control" id="jam_mulai" name="jam_mulai" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="jam_selesai">Jam Selesai</label>
			    <input type="text" class="form-control" id="jam_selesai" name="jam_selesai" autocomplete="off" required>
			</div>
		</div>
		<div class="form-group">
		    <label for="lokasi">Lokasi</label>
		    <input type="text" class="form-control" id="lokasi" name="lokasi" autocomplete="off" required>
		</div>

		<div>
			<a href="index?m=surat_keluar" class="btn btn-outline-secondary">Batal</a>
			<button type="submit" class="btn btn-primary ml-2">Buat Surat</button>
		</div>
		</form>

	</div>
</div>