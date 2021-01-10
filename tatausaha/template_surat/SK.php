<a href="index?m=surat_keluar">Kembali</a><br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Keputusan</h1>
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
		    <label for="tentang">Tentang</label>
		    <input type="text" class="form-control" id="tentang" name="tentang" required="" autocomplete="off" required="">
		</div>
		<div class="form-group">
		    <label for="menimbang">Menimbang</label>
		    <input type="text" class="form-control" id="menimbang" name="menimbang" autocomplete="off" required="">
		</div>
		<div class="form-group">
		    <label for="mengingat">Mengingat</label>
		    <input type="text" class="form-control" id="mengingat" name="mengingat" required="" autocomplete="off" required="">
		</div>
		<div class="form-group">
		    <label for="memutuskan">Memutuskan</label>
		    <input type="text" class="form-control" id="memutuskan" name="memutuskan" required="" autocomplete="off" required="">
		</div>
		<div>
			<a href="index?m=surat_keluar" class="btn btn-outline-secondary">Batal</a>
			<button type="submit" class="btn btn-primary ml-2">Buat Surat</button>
		</div>
		</form>

	</div>
</div>