<?php
include "include/koneksi.php";
include "include/cek-login.php";
if (isset($_POST ['input'])) {
$judul=$_POST ['judul'];
$prop=$_POST ['prop'];
$kota=$_POST ['kota'];
$kec=$_POST ['kec'];
$kel=$_POST ['kel'];
$kategori=$_POST ['kategori'];
$lokasi =addslashes(strip_tags($_POST['lokasi']));
$status="Tersedia";
$harga =addslashes(strip_tags($_POST['harga']));
$photo = $_FILES['photo']['name'];
$latitude =addslashes(strip_tags($_POST['latitude']));
$longitude =addslashes(strip_tags($_POST['longitude']));
$fee_agen2=$_POST ['fee_agen'];
$tahun =addslashes(strip_tags($_POST['tahun']));
$pilihan=$_POST ['pilihan'];
$kamar_mandi =addslashes(strip_tags($_POST['kamar_mandi']));
$kamar_tidur =addslashes(strip_tags($_POST['kamar_tidur']));
$luas_tanah =addslashes(strip_tags($_POST['luas_tanah']));
$luas_bangunan =addslashes(strip_tags($_POST['luas_bangunan']));
$jumlah_lantai=$_POST ['jumlah_lantai'];
$carport=$_POST ['carport'];
$garasi=$_POST ['garasi'];
$hadap=$_POST ['hadap'];
$sertifikat =addslashes(strip_tags($_POST['sertifikat']));
$listrik=$_POST ['listrik'];
$air=$_POST ['air'];
$nomor_rumah=$_POST ['nomor_rumah'];
$keterangan=$_POST ['keterangan'];

$id_status=$_SESSION['id_status'];
$id_properti="P".rand(1000,10000);
$id_fasilitas="F".rand(1000,10000);
$id_perubahan="PR".rand(1000,10000);
$id_owner=addslashes(strip_tags($_POST['id_owner']));

if ($_POST['id_owner']=="0"){
	header("location:transit.php?datagagal");
	exit;
}
if ($prop=="" or $kota=="0" or $kec=="0" or $kel=="0" or $sertifikat=="0"){
	header("location:transit.php?datalokasigagal");
	exit;
}
$id_user=$_SESSION['id_user'];
$fee_agen= str_replace(".", "", $fee_agen2);
$Tname = date('d-m-Y h-i-s');
$id = date('Y-m-d h:i:s');
$namafoto = $Tname.$photo;
$fileType = exif_imagetype($_FILES['photo']['tmp_name']);
$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);

if (!in_array($fileType, $allowed)) {
	//if (strlen($photo)>0)
	$query_properti = "INSERT INTO properti VALUES('$id_properti','$id_fasilitas','$id_user','$id_owner','$judul','$kategori',
	'$prop','$kota','$kec','$kel','$lokasi','$status','$harga','default.jpg','$latitude','$longitude','$fee_agen','$pilihan','1','$id','$luas_tanah','$nomor_rumah','$keterangan','$id_status')";
			$sql_properti = mysql_query ($query_properti) or die (mysql_error());
				
	
		$query_fasilitas = "INSERT INTO fasilitas VALUES('$id_fasilitas','$kamar_mandi','$kamar_tidur','$tahun','$luas_bangunan',
	'$jumlah_lantai','$carport','$garasi','$hadap','$sertifikat','$air','$listrik')";
			$sql_fasilitas = mysql_query ($query_fasilitas) or die (mysql_error());
			
			$query_perubahan = "INSERT INTO perubahan VALUES('$id_user','$id_properti','$id_perubahan','$id','Dibuat')";
			$sql_perubahan = mysql_query ($query_perubahan) or die (mysql_error());
			
			header ("location:transit.php?inputsukses");
	exit;
}
else
{
	$query_properti = "INSERT INTO properti VALUES('$id_properti','$id_fasilitas','$id_user','$id_owner','$judul','$kategori',
	'$prop','$kota','$kec','$kel','$lokasi','$status','$harga','$namafoto','$latitude','$longitude','$fee_agen','$pilihan','1','$id','$luas_tanah','$nomor_rumah','$keterangan','$id_status')";
			$sql_properti = mysql_query ($query_properti) or die (mysql_error());
			
			move_uploaded_file ($_FILES['photo']['tmp_name'], "gbdata/".$Tname."".$photo);
		$query_fasilitas = "INSERT INTO fasilitas VALUES('$id_fasilitas','$kamar_mandi','$kamar_tidur','$tahun','$luas_bangunan',
	'$jumlah_lantai','$carport','$garasi','$hadap','$sertifikat','$air','$listrik')";
			$sql_fasilitas = mysql_query ($query_fasilitas) or die (mysql_error());	
			
			$query_perubahan = "INSERT INTO perubahan VALUES('$id_user','$id_properti','$id_perubahan','$id','Dibuat')";
			$sql_perubahan = mysql_query ($query_perubahan) or die (mysql_error());
			header ("location:transit.php?inputsukses");
}

	
}
else
header("location:error.php");


?>