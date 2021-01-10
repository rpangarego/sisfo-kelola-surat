<a href="index?m=surat_keluar">Kembali</a><br><br>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Kuasa</h1>
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
		<div class="form-row">
			<div class="form-group col-md-8">
			    <label for="nama_pemberi">Nama Pemberi</label>
			    <input type="text" class="form-control" id="nama_pemberi" name="nama_pemberi" autocomplete="off" required>
			</div>
			<div class="form-group col-md-4">
			    <label for="nip_pemberi">NIP Pemberi</label>
			    <input type="text" class="form-control" id="nip_pemberi" name="nip_pemberi" autocomplete="off" required>
			</div>	
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="unit_pemberi">Unit Pemberi</label>
			    <input type="text" class="form-control" id="unit_pemberi" name="unit_pemberi" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="jabatan_pemberi">Jabatan Pemberi</label>
			    <input type="text" class="form-control" id="jabatan_pemberi" name="jabatan_pemberi" autocomplete="off" required>
			</div>	
		</div>
		<div class="form-group">
		    <label for="alamat_pemberi">Alamat Pemberi</label>
		    <textarea name="alamat_pemberi" id="alamat_pemberi" rows="2" class="form-control" required autocomplete="off"></textarea>
		</div>
		<hr>
		<div class="form-row">
			<div class="form-group col-md-8">
			    <label for="nama_penerima">Nama Penerima</label>
			    <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" autocomplete="off" required>
			</div>
			<div class="form-group col-md-4">
			    <label for="nip_penerima">NIP Penerima</label>
			    <input type="text" class="form-control" id="nip_penerima" name="nip_penerima" autocomplete="off" required>
			</div>	
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			    <label for="unit_penerima">Unit Penerima</label>
			    <input type="text" class="form-control" id="unit_penerima" name="unit_penerima" autocomplete="off" required>
			</div>
			<div class="form-group col-md-6">
			    <label for="jabatan_penerima">Jabatan Penerima</label>
			    <input type="text" class="form-control" id="jabatan_penerima" name="jabatan_penerima" autocomplete="off" required>
			</div>	
		</div>
		<div class="form-group">
		    <label for="alamat_penerima">Alamat Penerima</label>
		    <textarea name="alamat_penerima" id="alamat_penerima" rows="2" class="form-control" required autocomplete="off"></textarea>
		</div>
		<hr>
		<div class="form-row">
			<div class="form-group col-md-4">
			    <label for="bulanDari">Dari Bulan</label>
			    <input type="text" class="form-control" id="bulanDari" name="bulanDari" autocomplete="off" required>
			</div>
			<div class="form-group col-md-4">
			    <label for="bulanSampai">Sampai Bulan</label>
			    <input type="text" class="form-control" id="bulanSampai" name="bulanSampai" autocomplete="off" required>
			</div>
			<div class="form-group col-md-4">
			    <label for="tahun">Tahun</label>
			    <input type="text" class="form-control" id="tahun" name="tahun" autocomplete="off" value="<?= date("Y") ?>" required>
			</div>
		</div>


		<div>
			<a href="index?m=surat_keluar" class="btn btn-outline-secondary">Batal</a>
			<button type="submit" class="btn btn-primary ml-2">Buat Surat</button>
		</div>
		</form>

	</div>
</div>