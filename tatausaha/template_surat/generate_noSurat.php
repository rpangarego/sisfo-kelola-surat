<?php 
	// format no surat: 421.3/${nosurat}/SMAN 1 - SBRG/${kode}/${bulanRomawi}/${tahun}
	
	$row = $db->get_row("SELECT max(mid(no_surat,7,3))+1 AS no_surat FROM tb_dtsuratkeluar");
	
	// set nilai nosurat
	if (strlen($row->no_surat)==1) {
		$no_surat = '00'.$row->no_surat;
	}elseif (strlen($row->no_surat)==2) {
		$no_surat = '0'.$row->no_surat;
	}else{
		$no_surat = ''.$row->no_surat;
	}

	// kode template surat
	$kode = explode('/', $_GET['m']);
	$kode = $kode[1];

	// bulan dlm romawi
	switch (date('m')) {
		case 1:
			$bulan = 'I';
			break;
		case 2:
			$bulan = 'II';
			break;
		case 3:
			$bulan = 'III';
			break;
		case 4:
			$bulan = 'IV';
			break;
		case 5:
			$bulan = 'V';
			break;
		case 6:
			$bulan = 'VI';
			break;
		case 7:
			$bulan = 'VII';
			break;
		case 8:
			$bulan = 'VIII';
			break;
		case 9:
			$bulan = 'IX';
			break;
		case 10:
			$bulan = 'X';
			break;
		case 11:
			$bulan = 'XI';
			break;
		default:
			$bulan = 'XII';
			break;
	}

	// output no surat
	$surat = '421.3/'.$no_surat.'/SMAN 1 - SBRG/'.$kode.'/'.$bulan.'/'.date('Y');

?>