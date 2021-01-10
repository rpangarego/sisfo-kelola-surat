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


// Surat - Disposisi 
elseif ($act=='surat_disposisi'){
	$db->query("UPDATE tb_surat SET disposisi='Disposisi' WHERE id=$_GET[id]");
	echo "<script>alert('Surat dengan No. $_GET[surat] telah didisposisi!')</script>";

	$link = "index?m=surat_hasil&jenis=".$_GET['jenis']."&tgl_dari=".$_GET['tgl_dari']."&tgl_sampai=".$_GET['tgl_sampai']."&kategori=".$_GET['kategori'];
	redirect_js($link);
}

// kelola user
elseif ($mod=='kelola_user') {
	if (!$_POST['id']) {
		// tambah user baru
		$username = htmlspecialchars($_POST['username']);
		$level = htmlspecialchars($_POST['level']);
		$password1 = htmlspecialchars($_POST['password1']);
		$password2 = htmlspecialchars($_POST['password2']);

		if (empty($username) || empty($level) || empty($password1)) {
			echo "<script>alert('Untuk menambah user baru silahkan isi semua field!')</script>";
			redirect_js("index?m=kelola_user");
			exit;
		}elseif ($password1 != $password2) {
			echo "<script>alert('Password tidak sama!')</script>";
			redirect_js("index?m=kelola_user");
			exit;
		}else{
			$db->query("INSERT INTO tb_pengguna(id, username, password, level) VALUES (NULL,'$username','$password1',$level)");
			echo "<script>alert('User $username berhasil ditambahkan!')</script>";
			redirect_js("index?m=kelola_user");
			exit;
		}
	}else{
		// ubah/edit user yang ada
		$id = htmlspecialchars($_POST['id']);
		$username = htmlspecialchars($_POST['username']);
		$level = htmlspecialchars($_POST['level']);

		if (empty($username) || empty($level)) {
			echo "<script>alert('Semua field harus diisi!')</script>";
			redirect_js("index?m=kelola_user");
		}else{
			$db->query("UPDATE tb_pengguna SET username='$username', level='$level' WHERE id=$id");
			echo "<script>alert('User $username berhasil diubah!')</script>";
			redirect_js("index?m=kelola_user");
		}
	}
	
}

// hapus user
elseif ($act == 'user_hapus') {
	$id = htmlspecialchars($_GET['id']);
	
	$db->query("DELETE FROM tb_pengguna WHERE id='$id'");
	echo "<script>alert('User dengan ID $id berhasil dihapus!')</script>";
	redirect_js("index?m=kelola_user");
}