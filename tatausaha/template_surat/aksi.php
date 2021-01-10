<?php 
session_start();
require_once'../includes/functions.php';
require_once '../vendor/autoload.php';

$today = date('Y-m-d');

// Proses template : Surat Keputusan
if ($mod=='template_surat/SK'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_keputusan.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('tentang',$_POST['tentang']);
	$template->setValue('menimbang',$_POST['menimbang']);
	$template->setValue('mengingat',$_POST['mengingat']);
	$template->setValue('memutuskan',$_POST['memutuskan']);
	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Keputusan ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Tentang : ".$_POST['tentang']."@Menimbang : ".$_POST['menimbang']."@Mengingat : ".$_POST['mengingat']."@Memutuskan : ".$_POST['memutuskan'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Keputusan (SK)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',1,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SK&surat=Keputusan&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Keterangan Biasa
elseif ($mod=='template_surat/SKb') {
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_keterangan_biasa.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('nama',$_POST['nama']);
	$template->setValue('tempatLahir',$_POST['tempat_lahir']);
	$template->setValue('tglLahir',$_POST['tgl_lahir']);
	$template->setValue('nisn',$_POST['nisn']);
	$template->setValue('kelas',$_POST['kelas']);
	$template->setValue('isi',$_POST['isi_surat']);
	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Keterangan Biasa ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Nama : ".$_POST['nama']."@NISN : ".$_POST['nisn']."@Kelas : ".$_POST['kelas']."@Tempat Lahir : ".$_POST['tempat_lahir']."@Tanggal Lahir : ".$_POST['tgl_lahir'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Keterangan Biasa (SKb)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',2,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SKb&surat=Keterangan Biasa&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Keterangan Pindah Sekolah
elseif ($mod=='template_surat/SKks') {
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_keterangan_pindah_sekolah.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('noinduk',$_POST['nis']);
	$template->setValue('nisn',$_POST['nisn']);
	$template->setValue('namaSiswa',$_POST['nama']);
	$template->setValue('jk',$_POST['jk']);
	$template->setValue('kelas',$_POST['kelas']);
	$template->setValue('tempatLahir',$_POST['tempat_lahir']);
	$template->setValue('tglLahir',date('d M Y', strtotime($_POST['tgl_lahir'])));
	$template->setValue('alamat',$_POST['alamat']);
	
	$template->setValue('namaOrtu',$_POST['nama_ortu']);
	$template->setValue('pekerjaan',$_POST['pekerjaan']);
	$template->setValue('alasan',$_POST['alasan']);
	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Keterangan Pindah Sekolah ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Nama Siswa : ".$_POST['nama']."@NISN : ".$_POST['nisn']."@Nomor Induk : ".$_POST['nis']."@Kelas : ".$_POST['kelas']."@Tempat Lahir : ".$_POST['tempat_lahir']."@Tanggal Lahir : ".$_POST['tgl_lahir']."@Jenis Kelamin : ".$_POST['jk']."@Alamat : ".$_POST['alamat']."@Orang Tua : ".$_POST['nama_ortu']."@pekerjaan : ".$_POST['pekerjaan']."@Alasan : ".$_POST['alasan'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Keterangan Pindah Sekolah (SKks)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',4,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SKks&surat=Keterangan Pindah Sekolah&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Kuasa
elseif ($mod=='template_surat/SKua'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_kuasa.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);

	$template->setValue('namaPemberi',$_POST['nama_pemberi']);
	$template->setValue('nipPemberi',$_POST['nip_pemberi']);
	$template->setValue('unitPemberi',$_POST['unit_pemberi']);
	$template->setValue('jabatanPemberi',$_POST['jabatan_pemberi']);
	$template->setValue('alamatPemberi',$_POST['alamat_pemberi']);

	$template->setValue('namaPenerima',$_POST['nama_penerima']);
	$template->setValue('nipPenerima',$_POST['nip_penerima']);
	$template->setValue('unitPenerima',$_POST['unit_penerima']);
	$template->setValue('jabatanPenerima',$_POST['jabatan_penerima']);
	$template->setValue('alamatPenerima',$_POST['alamat_penerima']);

	$template->setValue('bulanDari',$_POST['bulanDari']);
	$template->setValue('bulanSampai',$_POST['bulanSampai']);
	$template->setValue('tahun',$_POST['tahun']);

	// Save template with new filename
	$namafile = "Surat Kuasa ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Nama Pemberi : ".$_POST['nama_pemberi']."@NIP Pemberi : ".$_POST['nip_pemberi']."@Unit Pemberi : ".$_POST['unit_pemberi']."@Jabatan Pemberi : ".$_POST['jabatan_pemberi']."@alamat_pemberi : ".$_POST['alamat_pemberi']."@Nama Penerima : ".$_POST['nama_penerima']."@NIP Penerima : ".$_POST['nip_penerima']."@Unit Penerima : ".$_POST['unit_penerima']."@Jabatan Penerima : ".$_POST['jabatan_penerima']."@Alamat Penerima : ".$_POST['alamat_penerima']."@Dari Bulan : ".$_POST['bulanDari']."@Hingga Bulan : ".$_POST['bulanSampai']."@Tahun : ".$_POST['tahun'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Kuasa (SKua)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',5,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SKua&surat=Kuasa&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Pemanggilan Orang Tua
elseif ($mod=='template_surat/SPot'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_pemanggilan_orang_tua.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('namaSiswa',$_POST['nama']);
	$template->setValue('hari',$_POST['hari']);
	$template->setValue('tanggal', date('d M Y', strtotime($_POST['tgl'])));
	$template->setValue('jamMulai',$_POST['jam_mulai']);
	$template->setValue('jamSelesai',$_POST['jam_selesai']);
	$template->setValue('lokasi',$_POST['lokasi']);
	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Pemanggilan Orang Tua ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Nama Siswa : ".$_POST['nama']."@Hari : ".$_POST['hari']."@Tanggal : ".date('d M Y', strtotime($_POST['tgl']))."@Jam Mulai : ".$_POST['jam_mulai']."@Jam Selesai : ".$_POST['jam_selesai']."@Lokasi : ".$_POST['lokasi'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Pemanggilan Orang Tua (SPot)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',6,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SPot&surat=Pemanggilan Orang Tua&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}


// Proses template : Surat Pemberitahuan
elseif ($mod=='template_surat/SBer'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_pemberitahuan.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('tentang',$_POST['tentang']);
	$template->setValue('hari',$_POST['hari']);
	$template->setValue('tahunAjar',$_POST['tahun_ajar']);
	$template->setValue('tanggal', date('d M Y', strtotime($_POST['tgl'])));

	$template->setValue('isi',$_POST['isi_surat']);
	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Pemberitahuan ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Tentang : ".$_POST['tentang']."@Hari : ".$_POST['hari']."@Tanggal : ".date('d M Y', strtotime($_POST['tgl']))."@Tahun Ajar : ".$_POST['tahun_ajar']."@Isi : ".$_POST['isi_surat'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Pemberitahuan (SBer)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',7,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SBer&surat=Pemberitahuan&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Pengantar
elseif ($mod=='template_surat/SPgt'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_pengantar.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('kepada',$_POST['kepada']);
	$template->setValue('dikirim',$_POST['dikirim']);
	$template->setValue('banyak',$_POST['banyak']);
	$template->setValue('keterangan',$_POST['keterangan']);
	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Pengantar ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Kepada : ".$_POST['kepada']."@Dikirim : ".$_POST['dikirim']."@Banyak : ".$_POST['banyak']."@Keterangan : ".$_POST['keterangan'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Pengantar (SPgt)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',8,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SPgt&surat=Pengantar&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Perintah Tugas
elseif ($mod=='template_surat/SPt'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_perintah_tugas.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('nama',$_POST['nama']);
	$template->setValue('nip',$_POST['nip']);
	$template->setValue('unit',$_POST['unit']);
	$template->setValue('jabatan',$_POST['jabatan']);
	$template->setValue('golongan',$_POST['golongan']);

	$template->setValue('kegiatan',$_POST['kegiatan']);
	$template->setValue('hari',$_POST['hari']);
	$template->setValue('tanggal', date('d/m/Y', strtotime($_POST['tgl'])));

	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Perintah Tugas ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Nama : ".$_POST['nama']."@NIP : ".$_POST['nip']."@Unit : ".$_POST['unit']."@Jabatan : ".$_POST['jabatan']."@Golongan : ".$_POST['golongan']."@Kegiatan : ".$_POST['kegiatan']."@Hari : ".$_POST['hari']."@Tanggal : ".date('d/m/Y', strtotime($_POST['tgl']));

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Perintah Tugas (SPt)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',9,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SPt&surat=Perintah Tugas&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Permohonan Izin
elseif ($mod=='template_surat/SMhn'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_permohonan_izin.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('tentang',$_POST['tentang']);
	$template->setValue('namaSiswa',$_POST['nama_siswa']);
	$template->setValue('pihakPembuat',$_POST['pihak_pembuat']);
	$template->setValue('hari',$_POST['hari']);
	$template->setValue('tanggal', date('d M Y', strtotime($_POST['tgl'])));
	$template->setValue('jamMulai',$_POST['jam_mulai']);
	$template->setValue('jamSelesai',$_POST['jam_selesai']);
	$template->setValue('lokasi',$_POST['lokasi']);
	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Permohonan Izin ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Tentang : ".$_POST['tentang']."@Nama Siswa : ".$_POST['nama_siswa']."@Pihak Pembuat : ".$_POST['pihak_pembuat']."@Hari : ".$_POST['hari']."@Tanggal : ".date('d M Y', strtotime($_POST['tgl']))."@Jam Mulai : ".$_POST['jam_mulai']."@Jam Selesai : ".$_POST['jam_selesai']."@Lokasi : ".$_POST['lokasi'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Permohonan Izin (SMhn)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',10,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SMhn&surat=Permohonan Izin&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Pernyataan
elseif ($mod=='template_surat/SPny'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_pernyataan.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('namaPemberi',$_POST['nama_pemberi']);
	$template->setValue('nipPemberi',$_POST['nip_pemberi']);
	$template->setValue('unitPemberi',$_POST['unit_pemberi']);
	$template->setValue('jabatanPemberi',$_POST['jabatan_pemberi']);
	$template->setValue('instansiPemberi',$_POST['instansi_pemberi']);

	$template->setValue('namaPenerima',$_POST['nama_penerima']);
	$template->setValue('tempatLahirPenerima',$_POST['tempatlahir_penerima']);
	$template->setValue('tglLahirPenerima',$_POST['tgllahir_penerima']);
	$template->setValue('pendidikanPenerima',$_POST['pendidikan_penerima']);
	$template->setValue('unitPenerima',$_POST['unit_penerima']);
	$template->setValue('alamatPenerima',$_POST['alamat_penerima']);

	$template->setValue('sebagai',$_POST['sebagai']);
	$template->setValue('tglResmi', date('d M Y', strtotime($_POST['tgl_resmi'])));

	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Pernyataan ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Nama Pemberi : ".$_POST['nama_pemberi']."@NIP Pemberi : ".$_POST['nip_pemberi']."@Unit Pemberi : ".$_POST['unit_pemberi']."@Jabatan Pemberi : ".$_POST['jabatan_pemberi']."@Instansi Pemberi : ".$_POST['instansi_pemberi']."@Nama Penerima : ".$_POST['nama_penerima']."@Tempat Lahir Penerima : ".$_POST['tempatlahir_penerima']."@Tanggal Lahir Penerima : ".$_POST['tgllahir_penerima']."@Pendidikan Penerima : ".$_POST['pendidikan_penerima']."@Unit Penerima : ".$_POST['unit_penerima']."@Alamat Penerima : ".$_POST['alamat_penerima']."@Sebagai : ".$_POST['sebagai']."@Tanggal Resmi : ".$_POST['tgl_resmi'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Pernyataan (SPny)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',11,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SPny&surat=Pernyataan&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Rekomendasi
elseif ($mod=='template_surat/SRek'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_rekomendasi.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('namaPemberi',$_POST['nama_pemberi']);
	$template->setValue('nipPemberi',$_POST['nip_pemberi']);
	$template->setValue('jabatanPemberi',$_POST['jabatan_pemberi']);

	$template->setValue('namaSiswa',$_POST['nama_siswa']);
	$template->setValue('kelas',$_POST['kelas']);
	$template->setValue('namaOrtu',$_POST['nama_ortu']);
	$template->setValue('alamat',$_POST['alamat']);

	$template->setValue('isi',$_POST['isi']);
	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Rekomendasi ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Nama Pemberi : ".$_POST['nama_pemberi']."@NIP Pemberi : ".$_POST['nip_pemberi']."@Jabatan Pemberi : ".$_POST['jabatan_pemberi']."@Nama Siswa : ".$_POST['nama_siswa']."@Kelas : ".$_POST['kelas']."@Nama Orang Tua : ".$_POST['nama_ortu']."@Alamat : ".$_POST['alamat']."@Isi : ".$_POST['isi'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Rekomendasi (SRek)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',12,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SRek&surat=Rekomendasi&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}

// Proses template : Surat Undangan
elseif ($mod=='template_surat/SUnd'){
	// Open template document...
	$template = new \PhpOffice\PhpWord\TemplateProcessor('../templates/surat_undangan.docx');
 
	// Edit template document...
	$template->setValue('nosurat', $_POST['no_surat']);
	$template->setValue('nama',$_POST['nama']);
	$template->setValue('tentang',$_POST['tentang']);
	$template->setValue('hari',$_POST['hari']);
	$template->setValue('tanggal', date('d M Y', strtotime($_POST['tgl'])));
	$template->setValue('jamMulai',$_POST['jam_mulai']);
	$template->setValue('jamSelesai',$_POST['jam_selesai']);
	$template->setValue('lokasi',$_POST['lokasi']);
	$template->setValue('today', getTodayDate());

	// Save template with new filename
	$namafile = "Surat Undangan ".uniqid().".docx";
	$template->saveAs("../templates/results/".$namafile);

	// ============================================================= 

	// extract semua isi array $_POST -> isi
	$isi = "Nama : ".$_POST['nama']."@Tentang : ".$_POST['tentang']."@Hari : ".$_POST['hari']."@Tanggal : ".$_POST['isi']."@Jam Mulai : ".$_POST['jam_mulai']."@Jam Selesai : ".$_POST['jam_selesai']."@Lokasi : ".$_POST['lokasi'];

	// buat id utk surat
	$id_surat = $db->get_row("SELECT max(id)+1 AS id FROM tb_surat");

	// Simpan ke tb_surat
	$db->query("INSERT INTO tb_surat(id, tgl_buat, kategori, disposisi, jenis_surat, file, id_pembuat) VALUES ($id_surat->id,'$today','Surat Undangan (SUnd)','Tidak Disposisi','Surat Keluar','$namafile',$_SESSION[id_user])");

	// Simpan ke tb_dtsuratkeluar
	$db->query("INSERT INTO tb_dtsuratkeluar(id, no_surat, isi, id_templat, id_surat) VALUES (NULL,'$_POST[no_surat]','$isi',13,$id_surat->id)");

	// arahkan ke surat_download.php
	$link = "index?m=surat_download&kode=SMhn&surat=Undangan&no=".$_POST['no_surat']."&file=".$namafile;
	redirect_js($link);
}




