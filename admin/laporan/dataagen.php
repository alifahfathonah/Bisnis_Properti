<?php
	if (isset($_POST['submit'])){
		$tanggal1=$_POST['tanggal1'];
		$tanggal2=$_POST['tanggal2'];
		if ($tanggal1>$tanggal2){
			$tanggal2=$tanggal1;
	}
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("admin")
							->setLastModifiedBy("admin")
							->setTitle("Data Agen")
							->setSubject("Admin")
							->setDescription("Data Agen Total")
							->setKeywords("properti")
							->setCategory("P.admin");
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
$sheet->getStyle('A1:I50')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('C2:F3')->applyFromArray( $style_header );
$sheet->getStyle('A1')->applyFromArray( $style_main_header );
//$sheet->getColumnDimension('1')->setWidth(50);
//-------Css end
// Tulis judul tabel
$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('A1:I1')
			->setCellValue('A1','DATA AGEN tanggal '.$tanggal1.' sampai '.$tanggal2);
			
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'Nomor')
            ->setCellValue('B'.$row, 'Tanggal Bergabung')
            ->setCellValue('C'.$row, 'Nama')
            ->setCellValue('D'.$row, 'Alamat')
            ->setCellValue('E'.$row, 'Email')
            ->setCellValue('F'.$row, 'Nomor Hp')
            ->setCellValue('G'.$row, 'Pendapatan');
			
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('A')->setWidth(15);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('B')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('C')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('F')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('D')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('G')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('E')->setWidth(30);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('H')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)
			->getColumnDimension('I')->setWidth(20);
$nomor 	= 1; // set nomor urut = 1;
include "../koneksi.php";
$query = mysql_query("SELECT * FROM user WHERE id_status='S003' AND tanggal_user >'$tanggal1' AND tanggal_user <'$tanggal2 23:59:59' ORDER BY 'tanggal_user' DESC");
	
$row++; // pindah ke row bawahnya. (ke row 2)

$sesi= $_POST['id_user'];
    while($hasil = mysql_fetch_array($query)) 
    {   
		$id_user = $hasil['id_user'];
		$nama = $hasil['nama'];		
		$alamat = $hasil['alamat'];
		$jenis_kelamin = $hasil['jenis_kelamin'];
		$email = stripslashes ($hasil['email']);
		$nomor_hp = stripslashes ($hasil['nomor_hp']);
		$id_status = $hasil['id_status'];
		$tanggal_user = $hasil['tanggal_user'];
		$id_dokumen = $hasil['id_dokumen'];
		$pendapatan = $hasil['pendapatan'];	
		
		$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row,  $nomor )
            ->setCellValue('B'.$row, $tanggal_user)
            ->setCellValue('C'.$row, $nama)
            ->setCellValue('D'.$row, $alamat)
            ->setCellValue('E'.$row, $email)
            ->setCellValue('F'.$row, $nomor_hp)
            ->setCellValue('G'.$row, 'Rp '.number_format($pendapatan,0,',','.').'');
			
			$row++; // pindah ke row bawahnya ($row + 1)
	$nomor++;
	}
$a=1;
$b=$row-$a;
$sheet->getStyle('A5:G5')->applyFromArray( $style_header);
$sheet->getStyle('A5:A'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('B5:B'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('C5:C'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('D5:D'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('E5:E'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('F5:F'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('G5:G'.$b)->applyFromArray( $style_isi );

$query1=mysql_query("SELECT * FROM user WHERE id_status='S003' AND jenis_kelamin='Laki-Laki'");
$laki_laki=mysql_num_rows($query1);
$query1=mysql_query("SELECT * FROM user WHERE id_status='S003' AND jenis_kelamin='Perempuan'");
$perempuan=mysql_num_rows($query1);
$total=$laki_laki+$perempuan;

$row=2;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('C'.$row, 'Laki-Laki')
            ->setCellValue('D'.$row, 'Perempuan')
            ->setCellValue('F'.$row, 'TOTAL');
$row=3;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('C'.$row, $laki_laki)
            ->setCellValue('D'.$row, $perempuan)
            ->setCellValue('F'.$row, $total);
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Properti Admin');

// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
$objPHPExcel->setActiveSheetIndex(0);


// Download (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="dataagen.xlsx"');
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