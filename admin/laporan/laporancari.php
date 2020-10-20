<?php
	if (isset($_POST['submit'])){
		$ada=$_POST['ada'];
		$username=$_POST['username'];
		$kueri1=$_POST['kueri1'];
		$kueri2=$_POST['kueri2'];
		$disewa=$_POST['disewa'];
		$terjual=$_POST['terjual'];
		$total=$_POST['total'];
		$tanggal1="ALL";
		$tanggal2="ALL";
		if (isset($_POST['tanggal1'])){
			$tanggal1=$_POST['tanggal1'];
		}
		if (isset($_POST['tanggal2'])){
			if (isset($_POST['tanggal1'])){
				$tanggal1=$_POST['tanggal1'];
				$tanggal2=$_POST['tanggal2'];
				if ($tanggal1>$tanggal2){
					$tanggal2=$tanggal1;
				}			
			}		
		}
	
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Discovery")
							->setLastModifiedBy("$username")
							->setTitle("Cari Proprti")
							->setSubject("Search")
							->setDescription("Data Properti tanggal $tanggal1 sampai $tanggal2")
							->setKeywords("properti")
							->setCategory("Properti $username");
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
			->setCellValue('A1','Data Admin tanggal '.$tanggal1.' sampai '.$tanggal2);
			
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
$row++; // pindah ke row bawahnya. (ke row 2)
    $query=mysql_query("$kueri1");
			while ($hasil=mysql_fetch_array($query)){
				$lokasi = $hasil['lokasi'];
				$id_fasilitas1 = $hasil['id_fasilitas'];					
					$query2=mysql_query("$kueri2");
					while ($hasil2=mysql_fetch_array($query2)){
						$garasi = $hasil2['garasi'];
						$id_fasilitas = $hasil2['id_fasilitas'];
						if($id_fasilitas==$id_fasilitas1){							
							$query3=mysql_query("SELECT * From properti where id_fasilitas='$id_fasilitas1'");
							while ($hasil3=mysql_fetch_array($query3)){
								$id_owner=$hasil3['id_owner'];
								$query4=mysql_query("SELECT * From owner where id_owner='$id_owner'");
								while ($hasil4=mysql_fetch_array($query4))
								{	
									$tanggal_dibuat=$hasil3['tanggal_dibuat'];
									$judul=$hasil3['judul'];
									$nama=$hasil4['nama'];	
									$status=$hasil3['status'];	
									$harga=number_format($hasil3['harga'],0,'.','.');	
									$kategori=$hasil3['kategori'];	
									$lokasi=$hasil3['kecamatan'];	
									$luas_tanah=number_format($hasil3['luas_tanah'],0,'.','.');									
									
								}
							}
						}		
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
$tgl=date('y/m/d h-m');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="properti'.$username.' '.$tgl.'.xlsx"');
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