<a href="index?m=surat_keluar">Kembali</a><br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Pengantar</h1>
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
		    <label for="kepada">Kepada</label>
		    <input type="text" class="form-control" id="kepada" name="kepada" autocomplete="off" required>
		</div>
		<div class="form-group">
		    <label for="dikirim">Dikirim</label>
		    <input type="text" class="form-control" id="dikirim" name="dikirim" autocomplete="off" required>
		</div>
		<div class="form-group">
		    <label for="banyak">Banyak</label>
		    <input type="text" class="form-control" id="banyak" name="banyak" autocomplete="off" required>
		</div>
		<div class="form-group">
		    <label for="keterangan">Keterangan</label>
		    <textarea name="keterangan" id="keterangan" rows="2" class="form-control" required autocomplete="off"></textarea>
		</div>
		
		<div>
			<a href="index?m=surat_keluar" class="btn btn-outline-secondary">Batal</a>
			<button type="submit" class="btn btn-primary ml-2">Buat Surat</button>
		</div>
		</form>

	</div>
</div>