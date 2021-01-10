<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Surat Masuk</h1>
<hr>
	
<div class="row">
	<div class="col col-md-6">
		<?php if($_POST) include 'aksi.php'; ?>
		<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
		    <label for="kategori">Kategori</label>
		    <select class="form-control" id="kategori" name="kategori">
		      <?=getKategoriSurat()?>
		    </select>
		</div>
		<div class="form-group">
		    <label for="kepada">Kepada</label>
		    <input type="text" class="form-control" id="kepada" name="kepada" required="" autocomplete="off">
		</div>
		<div class="form-group">
		    <label for="status">Status</label>
		    <select class="form-control" id="status" name="status">
		      <option value="Tidak Didisposisi">Tidak Didisposisi</option>
		      <option value="Didisposisi">Didisposisi</option>
		    </select>
		</div>
		
		<div class="form-group mb-3">
		  	<label for="fotoSurat">Unggah Hasil Scan Surat</label>
		    <input type="file" id="fotoSurat" name="fotoSurat" class="form-control" required>
		    <small id="emailHelp" class="form-text text-muted">File yang dapat diupload hanya berupa gambar/foto. (Format file: png, jpg atau jpeg)</small>
		</div>
		<div>
			<a href="index?m=surat_masuk" class="btn btn-outline-secondary">Batal</a>
			<button type="submit" class="btn btn-primary ml-2">Submit Surat</button>
		</div>
		</form>

	</div>
</div>