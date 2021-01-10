<?php
error_reporting(~E_NOTICE);
session_start();

// ini_set('max_execution_time', 60 * 1);
ini_set('memory_limit', '512M');
ini_set('upload_max_filesize', '32M');

include 'config.php';
include 'db.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);
include'general.php';
// include'includes/paging.php';
    
$mod = $_GET['m'];
$act = $_GET['act'];

function getTodayDate(){
    switch (date('m')) {
        case '01':
            $month = 'Januari';
            break;
        case '02':
            $month = 'Februari';
            break;
        case '03':
            $month = 'Maret';
            break;
        case '04':
            $month = 'April';
            break;
        case '05':
            $month = 'Mei';
            break;
        case '06':
            $month = 'Juni';
            break;
        case '07':
            $month = 'Juli';
            break;
        case '08':
            $month = 'Agustus';
            break;
        case '09':
            $month = 'September';
            break;
        case '10':
            $month = 'Oktober';
            break;
        case '11':
            $month = 'November';
            break;
        default:
            $month = 'Desember';
            break;
    }
    return date('d').' '.$month.' '.date('Y');
}

function getKategoriSurat($selected = ''){ //getKategoriSurat digunakan pada pencarian surat masuk/keluar
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_templat ORDER BY id");
    foreach($rows as $row){
        if($row->id==$selected)
            $a.="<option value='$row->nama_templat' selected>$row->nama_templat ($row->kode_templat)</option>";
        else
            $a.="<option value='$row->nama_templat'>$row->nama_templat ($row->kode_templat)</option>";
    }
    return $a;
}

function getTemplateSurat($selected = ''){ //getTemplateSurat digunakan pada kelola surat masuk
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_templat ORDER BY id");
    foreach($rows as $row){
        if($row->id==$selected)
            $a.="<option value='$row->id' selected>$row->nama_templat</option>";
        else
            $a.="<option value='$row->id'>$row->nama_templat</option>";
    }
    return $a;
}

function uploadSurat(){
   $namafile = $_FILES['fotoSurat']['name'];
   $ukuranfile = $_FILES['fotoSurat']['size'];
   $error = $_FILES['fotoSurat']['error'];
   $tmpnama = $_FILES['fotoSurat']['tmp_name'];

    // Cek ada gambar yg diupload/tidak
    if ($error === 4) {
        echo "<script> alert('Tidak ada foto/gambar terpilih!') </script>";
        return false;
        // $value = '';
        // return $value;
    }

    // Cek pastikan file yang diupload adalah foto/gambar
    $ekstensigambarvalid = ['jpg','jpeg','png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script> alert('File yang diupload bukan foto/gambar (jpg, jpeg, png)') </script>";
        return false;
    }

    // Cek ukuran file
    //Jika lebih dari 2MB atau error code 1: The uploaded file exceeds the upload_max_filesize
    if ($ukuranfile > 2000000 || $error === 1) { 
        echo "<script> alert('Ukuran file terlalu besar!') </script>";
        return false;
    }

    // Pengecekan selesai, Foto/Gambar siap upload!
    // Generate nama baru
    $namafilebaru = uniqid().'_'.uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;

    move_uploaded_file($tmpnama, '../img/berkas/'.$namafilebaru);
    return $namafilebaru;
}
