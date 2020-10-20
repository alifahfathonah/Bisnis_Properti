<?php
	if (isset($_POST['submit'])){
		$ada=$_POST['ada'];
		$id_user=$_POST['id_user'];
		$disewa=$_POST['disewa'];
		$terjual=$_POST['terjual'];
		$total=$_POST['total'];
	
	
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("admin")
							->setLastModifiedBy("admin")
							->setTitle("Properti Admin")
							->setSubject("Admin")
							->setDescription("Data Admin Total")
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
			->setCellValue('A1','DATA PROPERTI ADMIN ALL');
			
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'Nomor')
            ->setCellValue('B'.$row, 'Tanggal')
            ->setCellValue('C'.$row, 'Status')
            ->setCellValue('D'.$row, 'Kategori')
            ->setCellValue('E'.$row, 'Luas Tanah')
            ->setCellValue('F'.$row, 'Agen')
            ->setCellValue('G'.$row, 'Harga')
            ->setCellValue('H'.$row, 'Lokasi')
            ->setCellValue('I'.$row, 'Judul');
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
$query = mysql_query("SELECT * FROM properti WHERE keaktifan=1 AND id_user='$id_user' ORDER BY 'id_properti' ASC");
	
$row++; // pindah ke row bawahnya. (ke row 2)

$sesi= $_POST['id_user'];
    while($hasil = mysql_fetch_array($query)) 
    {   

		include "../koneksi.php";
		$id_properti = $hasil['id_properti'];
		$id_fasilitas = $hasil['id_fasilitas'];		
		$id_user =$_POST['id_user'];
				$query_user2= mysql_query("SELECT nama FROM user WHERE id_user='$id_user'");
				while($hasiluser2 = mysql_fetch_array($query_user2))
				{
					$nama = $hasiluser2['nama'];
				}	
		$status =addslashes(strip_tags($hasil['status']));
		$luas_tanah=$hasil ['luas_tanah'];
		$tanggal_dibuat=$hasil ['tanggal_dibuat'];
		$kategori =addslashes(strip_tags($hasil['kategori']));
		$judul =addslashes(strip_tags($hasil['judul']));
		$harga ="RP ".addslashes(strip_tags($hasil['harga']));
		$kecamatan =addslashes(strip_tags($hasil['kecamatan']));
							
		include "../koneksi2.php";
		$query_id= mysql_query("SELECT nama FROM kecamatan WHERE id_kec='$kecamatan'");
		while($hasil_id = mysql_fetch_array($query_id))
				{
					$lokasi = $hasil_id['nama'];
				}
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row,  $nomor )
            ->setCellValue('B'.$row, $tanggal_dibuat)
            ->setCellValue('C'.$row, $status)
            ->setCellValue('D'.$row, $kategori)
            ->setCellValue('E'.$row, $luas_tanah)
            ->setCellValue('F'.$row, $nama)
            ->setCellValue('G'.$row, $harga)
            ->setCellValue('H'.$row, $lokasi)
            ->setCellValue('I'.$row, $judul);
			
			$row++; // pindah ke row bawahnya ($row + 1)
	$nomor++;
}
$a=1;
$b=$row-$a;
$sheet->getStyle('A5:I5')->applyFromArray( $style_header);
$sheet->getStyle('A5:A'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('B5:B'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('C5:C'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('D5:D'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('E5:E'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('F5:F'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('G5:G'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('H5:H'.$b)->applyFromArray( $style_isi );
$sheet->getStyle('I5:I'.$b)->applyFromArray( $style_isi );
$row=2;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('C'.$row, 'TERSEDIA')
            ->setCellValue('D'.$row, 'DISEWA')
            ->setCellValue('E'.$row, 'TERJUAL')
            ->setCellValue('F'.$row, 'TOTAL');
$row=3;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('C'.$row, $ada)
            ->setCellValue('D'.$row, $disewa)
            ->setCellValue('E'.$row, $terjual)
            ->setCellValue('F'.$row, $total);
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Properti Admin');

// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
$objPHPExcel->setActiveSheetIndex(0);


// Download (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="dataproperti.xlsx"');
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