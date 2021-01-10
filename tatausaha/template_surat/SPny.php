<a href="index?m=surat_keluar">Kembali</a><br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Pernyataan</h1>
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
		
		<!-- identitas pemberi -->
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
			    <label for="unit_pemberi">Unit Pemberi</label>
			    <input type="text" class="form-control" id="unit_pemberi" name="unit_pemberi" autocomplete="off" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="jabatan_pemberi">Jabatan Pemberi</label>
			    <input type="text" class="form-control" id="jabatan_pemberi" name="jabatan_pemberi" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="instansi_pemberi">Instansi Pemberi</label>
			    <input type="text" class="form-control" id="instansi_pemberi" name="instansi_pemberi" autocomplete="off" required>
			</div>
		</div>
		<hr>
		
		<!-- identitas penerima -->
		<div class="form-group">
		    <label for="nama_penerima">Nama Penerima</label>
		    <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" autocomplete="off" required>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="tempatlahir_penerima">Tempat Lahir Penerima</label>
			    <input type="text" class="form-control" id="tempatlahir_penerima" name="tempatlahir_penerima" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="tgllahir_penerima">Tanggal Lahir Penerima</label>
			    <input type="text" class="form-control" id="tgllahir_penerima" name="tgllahir_penerima" autocomplete="off" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="pendidikan_penerima">Pendidikan Penerima</label>
			    <input type="text" class="form-control" id="pendidikan_penerima" name="pendidikan_penerima" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="unit_penerima">Unit Penerima</label>
			    <input type="text" class="form-control" id="unit_penerima" name="unit_penerima" autocomplete="off" required>
			</div>
		</div>
		<div class="form-group">
		    <label for="alamat_penerima">Alamat Penerima</label>
		    <textarea name="alamat_penerima" id="alamat_penerima" rows="2" class="form-control" required autocomplete="off"></textarea>
		</div>

		<div class="form-group">
		    <label for="sebagai">Sebagai</label>
		    <input type="text" class="form-control" id="sebagai" name="sebagai" autocomplete="off" required>
		</div>
		<div class="form-group">
		    <label for="tgl_resmi">Tanggal Resmi</label>
		    <input type="date" class="form-control" id="tgl_resmi" name="tgl_resmi" autocomplete="off" required>
		</div>
		
		<div>
			<a href="index?m=surat_keluar" class="btn btn-outline-secondary">Batal</a>
			<button type="submit" class="btn btn-primary ml-2">Buat Surat</button>
		</div>
		</form>

	</div>
</div>