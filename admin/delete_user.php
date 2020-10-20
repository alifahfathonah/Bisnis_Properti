<?php 
include "cek-login.php";
include "validasi.php";
?>
<?php
include('koneksi.php');
$id_u = $_GET['id_u'];
if ($id_u=="SUPERUSER")
{
 header('location:error.php');
 exit;
}

$querydok = mysqli_query($con,"select id_dokumen from user where id_user='$id_u'");
while($hasiluser2 = mysqli_fetch_array($querydok))
{
	$id_dokumen=$hasiluser2['id_dokumen'];
}
$querydok2 = mysqli_query($con,"select foto from dokumen where id_dokumen='$id_dokumen'");
while($hasiluser22 = mysqli_fetch_array($querydok2))
{
	$foto=$hasiluser22['foto'];
}
$fotoh="D:/htdocs/Sewa_Rumah/admin/gbuser/temp/".$foto;
$query = mysqli_query($con,"delete from user where id_user='$id_u'") or die(mysql_error());
if ($query) {
	unlink($fotoh);
	header('location:transit.php?hapususer');
	echo $id;
}
?>