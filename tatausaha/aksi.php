<?php 
session_start();
require_once'../includes/functions.php';


// Profil - ubah/edit
if ($mod=='profil'){
	$user = htmlspecialchars($_POST['username']);

	if (empty($user)) {
		setcookie('notifikasi','Semua field harus diisi');
		redirect_js("index?m=profil");
	}else{
		$db->query("UPDATE tb_pengguna SET username='$user' WHERE id=$_SESSION[id_user]");
		echo "<script>alert('Profil berhasil diupdate!')</script>";
		redirect_js("index?m=profil");
	}
}

// Profil - Ganti Password
elseif ($mod=='ganti_password'){
	$password = htmlspecialchars($_POST['password_old']);
	$password1 = htmlspecialchars($_POST['password_baru']);
	$password2 = htmlspecialchars($_POST['password_confirm']);


	// Jika salah satu field kosong
	if (empty($password) || empty($password1) || empty($password2)) {
		echo "<script>alert('Semua field harus diisi!')</script>";
		redirect_js("index?m=ganti_password");
	}else{
		// jika semua field diisi -> cek user dan passnya
		$user = $db->get_row("SELECT * FROM tb_pengguna WHERE id=$_SESSION[id_user]");
		// jika password cocok
		if ($user->password == $password) {
			// cek kesamaan password
			if ($password1==$password2) {
				// update password
				$db->query("UPDATE tb_pengguna SET password='$password1' WHERE id='$user->id'");
				echo "<script>alert('Password berhasil diubah!')</script>";
				redirect_js("index?m=ganti_password");
			}else{
				echo "<script>alert('Password tidak sama!')</script>";
				redirect_js("index?m=ganti_password");
			}
		}else{
			echo "<script>alert('Password salah!')</script>";
			redirect_js("index?m=ganti_password");
		}
	}
}


// Surat Masuk - Tambah 
elseif ($mod=='surat_masuk'){
	$kepada = htmlspecialchars($_POST['kepada']);
	$kategori = htmlspecialchars($_POST['kategori']);
	$status = htmlspecialchars($_POST['status']);
	$fotoSurat = uploadSurat();
	$tgl = $today = date('Y-m-d');

	if (empty($kepada) || empty($kategori) || empty($status)) {
		// jika ada field yg kosong
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=surat_masuk");
		exit;
	}elseif (empty($fotoSurat)) {
		echo "<script>alert('Unggah foto/gambar scan surat yang valid!')</script>";
		redirect_js("index?m=surat_masuk");
		exit;
	}else{
		// simpan data surat baru ke dalam database
		$max_id = $db->get_row("SELECT MAX(id) FROM tb_surat");
		$db->query("INSERT INTO tb_surat(id, tgl_buat,kategori, disposisi, jenis_surat, file, id_pembuat) VALUES (NULL,'$tgl','$kategori','$status','Surat Masuk','$fotoSurat','$_SESSION[id_user]')");
		echo "<script>alert('Surat masuk berhasil disimpan!')</script>";
		redirect_js("index?m=surat_masuk");
	}
}

// Surat - Hapus 
elseif ($act=='surat_hapus'){
	$no_surat = htmlspecialchars($_GET['no_surat']);
	
	$db->query("DELETE FROM tb_surat WHERE no_surat='$no_surat'");
	echo "<script>alert('Data surat <?= $no_surat; ?> berhasil dihapus!')</script>";
	redirect_js("index?m=surat_hasil");
}

// Surat - Disposisi 
elseif ($act=='surat_disposisi'){
	$db->query("UPDATE tb_surat SET disposisi='Disposisi' WHERE id=$_GET[id]");
	echo "<script>alert('Surat dengan No. $_GET[surat] telah didisposisi!')</script>";

	$link = "index?m=surat_hasil&jenis=$_GET['jenis']&tgl_dari=$_GET['tgl_dari']&tgl_sampai=$_GET['tgl_sampai']&kategori=$_GET['kategori']";
	redirect_js($link);
}
