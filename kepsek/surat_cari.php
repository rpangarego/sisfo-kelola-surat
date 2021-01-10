<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Pencarian Surat</h1>
</div>

<!-- Row Content -->
<div class="row">
	<div class="col-12 col-md-5">
		<form method="GET" action="index?m=surat_hasil">
		<input type="hidden" name="m" value="surat_hasil">
		<div class="form-group">
		    <label for="jenis">Jenis Surat</label>
		    <select class="custom-select" id="jenis" name="jenis">
		      <option value="Surat Keluar">Surat Keluar</option>
		      <option value="Surat Masuk">Surat Masuk</option>
		    </select>
		</div>
		<div class="form-row">
		    <div class="form-group col-12 col-md-6">
		      <label for="tgl_dari">Dari</label>
		      <input type="date" class="form-control" id="tgl_dari" name="tgl_dari" value="<?= date('Y-m-d', strtotime('-30 days'));?>">
		    </div>
		    <div class="form-group col-12 col-md-6">
		      <label for="tgl_sampai">Sampai</label>
		      <input type="date" class="form-control" id="tgl_sampai" name="tgl_sampai" value="<?= date('Y-m-d');?>">
		    </div>
		</div>
		<div class="form-group">
		    <label for="kategori">Kategori</label>
		    <select class="custom-select" id="kategori" name="kategori">
		      <option value="semua">Semua</option>
		      <?=getKategoriSurat()?>
		    </select>
		</div>
		
		<div class="btn-actions">
			<a href="index" class="btn btn-outline-secondary mr-1">Batal</a>
			<button type="submit" class="btn btn-primary">Cari Surat</button>
		</div>

		</form>
	

	</div>
</div>
