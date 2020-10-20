<?php
	if (isset($_POST['submit'])){
		$ada=$_POST['ada'];
		$disewa=$_POST['disewa'];
		$terjual=$_POST['terjual'];
		$total=$_POST['total'];
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
							->setTitle("Properti Admin")
							->setSubject("Admin")
							->setDescription("Data Admin tanggal $tanggal1 sampai $tanggal2")
							->setKeywords("properti")
							->setCategory("P.admin");
// mulai dari baris ke 2
$row = 5;

// Tulis judul tabel
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
			->getColumnDimension('B')->setWidth(15);
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
$query = mysql_query("SELECT * FROM properti WHERE keaktifan=1 AND id_user='SUPERUSER' AND tanggal_dibuat >'$tanggal1' AND tanggal_dibuat<'$tanggal2 23:59:59' ORDER BY 'id_properti' ASC");
	
$row++; // pindah ke row bawahnya. (ke row 2)

$sesi= $_POST['id_user'];
    while($hasil = mysql_fetch_array($query)) 
    {   $id_properti = $hasil['id_properti'];
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