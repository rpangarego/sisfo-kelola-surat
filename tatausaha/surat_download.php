<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat <?= $_GET['surat']; ?> berhasil diproses!</h1>
<hr>

<div class="mb-2">
	Surat <?= $_GET['surat']; ?> dengan No. <?= $_GET['no']; ?> berhasil dibuat. <br>
	Untuk mengunduh surat klik tombol berikut: <br>
</div>
<a href="../templates/results/<?= $_GET['file']; ?>" class="btn btn-primary">Unduh Surat</a>

<div class="mt-4">
	<span>Apakah anda ingin membuat <span class="font-weight-bold">Surat <?= $_GET['surat']; ?></span> lagi?</span>
	<a href="index?m=surat_keluar" class="btn btn-outline-primary">Tidak</a>
	<a href="index?m=template_surat/<?= $_GET['kode']; ?>" class="btn btn-outline-primary">Ya</a>
</div>

