<?php 
$id_surat = $db->get_row("SELECT id FROM tb_surat WHERE tgl_buat='2020-05-17' AND jenis_surat='Surat Keluar' AND file='Surat Keputusan 5ec0fbd27' AND id_pembuat=2");

echo $id_surat->id;
var_dump($id_surat);


 ?>