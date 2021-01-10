<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hasil Rekapitulasi Laporan</title>

	<!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<style>
		.*{
			margin: 0;
			padding: 0;
		}
		.body{
			font-family: 'Times New Roman', Arial, sans-serif !important;
			color: #000;
		}

		div.col{
			line-height: 10px;
		}
		
		table{
			margin-left: 5%;
			max-width: 664px;
		}

		th{
			text-align: left;
		}
	</style>

</head>
<body>
	<?php 
		require_once'../includes/functions.php';
		require_once '../vendor/autoload.php';

		$tgl_dari = ($_GET['tgl_dari']) ? $_GET['tgl_dari'] : date('d M Y', strtotime('-30 days'));
		$tgl_sampai = ($_GET['tgl_sampai']) ? $_GET['tgl_sampai'] : date('d M Y');

		// set tgl
	      if (!$_GET['tgl_dari'] && !$_GET['tgl_sampai']) {
	        $dari = date('m', strtotime('-30 days'));
	        $sampai = date('m');
	      }else{
	        $dari = date('m', strtotime($_GET['tgl_dari']));
	        $sampai = date('m', strtotime($_GET['tgl_sampai']));
	      }

	      $kategori = ($_GET['kategori']) ? $_GET['kategori'] : 'Surat Keluar';

	      if (!$_GET['jenis'] || $_GET['jenis']=='Harian') {
	        // laporan harian
	        $rows = $db->get_results("SELECT tgl_buat, kategori,count(Kategori) AS total FROM tb_surat WHERE Month(tgl_buat) BETWEEN $dari AND $sampai AND Jenis_Surat='$kategori' GROUP BY Kategori,Right(tgl_Buat,5),Jenis_Surat ORDER BY Right(tgl_Buat,5) ASC");
	      }elseif ($_GET['jenis']=='Bulanan') {
	        // laporan bulanan
	        $rows = $db->get_results("SELECT CASE
	            WHEN Month(tgl_Buat) = 1 THEN 'Jan' WHEN Month(tgl_Buat) = 2 THEN 'Feb'
	            WHEN Month(tgl_Buat) = 3 THEN 'Mar' WHEN Month(tgl_Buat) = 4 THEN 'Apr'
	            WHEN Month(tgl_Buat) = 5 THEN 'May' WHEN Month(tgl_Buat) = 6 THEN 'Jun'
	            WHEN Month(tgl_Buat) = 7 THEN 'Jul' WHEN Month(tgl_Buat) = 8 THEN 'Ags'
	            WHEN Month(tgl_Buat) = 9 THEN 'Sep' WHEN Month(tgl_Buat) = 10 THEN 'Okt'
	            WHEN Month(tgl_Buat) = 11 THEN 'Nov' WHEN Month(tgl_Buat) = 12 THEN 'Des' 
	            END AS 'bulan',
	            kategori,count(kategori)as total from tb_surat
	            where Month(tgl_buat) Between $dari and $sampai AND Jenis_Surat='$_GET[kategori]' group by kategori,month(Tgl_Buat) order by kategori Asc");
	      }else{
	        // laporan tahunan
	        $rows = $db->get_results("SELECT Year(tgl_buat)as 'tahun',kategori,count(kategori)as total from tb_surat where Month(tgl_buat) Between $dari and $sampai AND Jenis_Surat='$_GET[kategori]' group by Kategori,Year(Tgl_Buat) order by kategori ASC");
	      }

	    
		// Create an instance of the class:
		$mpdf = new \Mpdf\Mpdf();

		// Header 21cm = 793.70078xxxx px
		$html = '<div><img src="../img/header.png" alt="header surat" width="793.7008px"><h3 style="margin-top: 0; margin-left: 5%; text-align:center;">Hasil Rekapitulasi '.$kategori.'<h3></div>';

		$periode = date('d M Y', strtotime($tgl_dari)).' - '.date('d M Y', strtotime($tgl_sampai));
		$jenis = ($_GET['jenis']) ? $_GET['jenis'] : 'Harian';
		$tgl_cetak = date('d/m/Y');
			$html .= '<table><tr><th style="text-align:left;">Periode Laporan</th><td> : </td><td>'.$periode.'</td></tr>
			<tr><th style="text-align:left;">Jenis Laporan</th><td> : </td><td>'.$jenis.'</td></tr>
			<tr><th style="text-align:left;">Dicetak Pada</th><td> : </td><td>'.$tgl_cetak.'</td></tr>
			</table>';


		$html .= '<div class="table-responsive"><table class="table table-hover" width="100%" cellspacing="0" border="1" cellpadding="5"><thead><tr><th scope="col" width="30px">No.</th>';

		if ($_GET['jenis']=='Bulanan'){
	            $html .= '<th width="80px">Bulan/Tahun</th>';
	        }elseif ($_GET['jenis']=='Tahunan'){
	            $html .= '<th width="80px">Tahun</th>';
	        }else{
	            $html .= '<th width="80px">Tanggal</th>';
	        }

	    $html .= '<th width="300px">Keterangan</th><th width="40px">Total</th></tr></thead><tbody>';

	    
	    $total=0; 
	    if (count($rows) > 0){
	        foreach ($rows as $row){

	            $html.= '<tr><th>'.++$i.'</th>';
	            if ((!$_GET['jenis'] || $_GET['jenis']=='Harian')){
	                  $html .= '<td>'.date('d M', strtotime($row->tgl_buat)).'</td>';
	            }elseif ($_GET['jenis']=='Bulanan'){
	                  $html .= '<td>'.$row->bulan.'</td>';
	            }elseif ($_GET['jenis']=='Tahunan'){
	                  $html .= '<td>'.$row->tahun.'</td>';
	            }
	              
	            $html .= '<td>'.$row->kategori.'</td><td>'.$row->total.'</td></tr> ';

	            $total += $row->total;
	        }
	    }else{
	        $html .= '<tr><td colspan="4" class="text-center">Tidak ada data</td></tr>';
	    }

	    $html .= '<tr><td colspan="4" style="font-weight: bold; text-align: center;"> Total Keseluruhan : '.$total.' '.$kategori.'</td></tr></tbody></table></div><br><br><br><br><div style="text-align:right;"><img src="../img/footer.png" alt="footer" width="200px"></div></div>';

	    $mpdf->WriteHTML($html);
		$mpdf->Output('laporan.pdf',\Mpdf\Output\Destination::INLINE);
	?>
</body>
</html>


