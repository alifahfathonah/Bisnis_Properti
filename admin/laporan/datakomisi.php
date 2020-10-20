<?php
include "../include/cek-login.php";
	if (isset($_POST['submit'])){
		$id_user=$_SESSION['id_user'];
		$data1=$_POST['data1'];
		$data2=$_POST['data2'];
		$data3=$_POST['data3'];
		$data4=$_POST['data4'];
		$data5=$_POST['data5'];
		$tanggal1=$_POST['tanggal1'];
		$tanggal2=$_POST['tanggal2'];
		if ($tanggal1>$tanggal2){
			$tanggal2=$tanggal1;
	}
	
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Discovery Property")
							->setLastModifiedBy($_SESSION['username'])
							->setTitle("Komisi")
							->setSubject("Komisi ".$_SESSION['username'])
							->setDescription("Komisi ".$_SESSION['username']." ALL")
							->setKeywords("Komisi")
							->setCategory("");
// mulai dari baris ke 2
$row = 5;
//css tabel
$sheet = $objPHPExcel->getActiveSheet();
$default_border = array(
    'style' => PHPExcel_Style_Border::BORDER_THIN,
    'color' => array('rgb'=>'000000')
);
$style_main_header = array(
    'font' => array(
        'bold' => true,
    )
);

$style_header = array(
    'borders' => array(
        'bottom' => $default_border,
        'left' => $default_border,
        'top' => $default_border,
        'right' => $default_border,
    ),
    'font' => array(
        'bold' => true,
    )
);
$style_isi = array(
    'borders' => array(
        'bottom' => $default_border,
        'left' => $default_border,
        'top' => $default_border,
        'right' => $default_border,
    )
);
$sheet->getStyle('A1:E950')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('B2:G3')->applyFromArray( $style_header );
$sheet->getStyle('A1')->applyFromArray( $style_main_header );
//$sheet->getColumnDimension('1')->setWidth(50);
//-------Css end
// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('A1:I1')
			->setCellValue('A1','Laporan Komisi '.$_SESSION['username'].' ALL');
			
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'Nomor')
            ->setCellValue('B'.$row, 'Tanggal')
            ->setCellValue('C'.$row, 'ID Komisi')
            ->setCellValue('D'.$row, 'Nama')
            ->setCellValue('E'.$row, 'Komisi');
			
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('A')->setWidth(15);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('B')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('C')->setWidth(15);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('F')->setWidth(17);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('D')->setWidth(15);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('G')->setWidth(17);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('E')->setWidth(15);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('H')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('I')->setWidth(50);
$nomor 	= 1; // set nomor urut = 1;
include "../koneksi.php";
$query=mysql_query("SELECT * FROM komisi WHERE id_user='$id_user' AND tanggal_komisi >'$tanggal1' AND tanggal_komisi<'$tanggal2 23:59:59' ORDER BY 'tanggal_komisi' DESC");
			
$row++; // pindah ke row bawahnya. (ke row 2)
    while($hasil_komisi = mysql_fetch_array($query)) 
    {   
		$id_user = $hasil_komisi['id_user'];
		$tanggal_komisi = $hasil_komisi['tanggal_komisi'];		
		$komisi = $hasil_komisi['jumlah'];		
		$id_komisi = $hasil_komisi['id_komisi'];		
		$query2=mysql_query("select * from user WHERE id_user='$id_user'");
		while($hasil2 = mysql_fetch_array($query2)) 
		{	
			$nama = $hasil2['nama'];
		}		

			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row,  $nomor )
            ->setCellValue('B'.$row, $tanggal_komisi)
            ->setCellValue('C'.$row, $id_komisi)
            ->setCellValue('D'.$row, $nama)
            ->setCellValue('E'.$row, 'Rp '.number_format($komisi,0,',','.'));
			
			$row++; // pindah ke row bawahnya ($row + 1)
	$nomor++;
}
$a=1;
$b=$row-$a;
$sheet->getStyle('A5:E5')->applyFromArray( $style_header);
$sheet->getStyle('A5:E'.$b)->applyFromArray( $style_isi );
$row=2;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B'.$row, 'Hari Ini')
            ->setCellValue('C'.$row, 'Kemarin')
            ->setCellValue('D'.$row, 'Bulan Ini')
            ->setCellValue('E'.$row, 'Tahun Ini')
            ->setCellValue('G'.$row, 'Total');
$row=3;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B'.$row, 'Rp '.number_format($data1,0,',','.'))
            ->setCellValue('C'.$row, 'Rp '.number_format($data2,0,',','.'))
            ->setCellValue('D'.$row, 'Rp '.number_format($data3,0,',','.'))
            ->setCellValue('E'.$row, 'Rp '.number_format($data4,0,',','.'))
            ->setCellValue('G'.$row, 'Rp '.number_format($data5,0,',','.'));
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Komisi');

// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
$objPHPExcel->setActiveSheetIndex(0);
$tgl=date('ymd H-m');
$namaf= $_SESSION['username'].$tgl;
// Download (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Komisi '.$namaf.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 

$objWriter->save('php://output');
exit;
}
?>