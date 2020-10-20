<?php 
include"include/koneksi.php";
include"include/cek-login.php";
if(isset($_GET['id_pengunjung'])){
$id_pengunjung=$_GET['id_pengunjung'];
}
$query ="UPDATE pengunjung SET status_pesan='2' where id_pengunjung='$id_pengunjung'";
$sql=mysql_query ($query);
if($sql)
{
	if(isset($_GET['tp'])){
		header ("location:tampil_pengunjung.php?baca");
	}
	else{
		header ("location:dashboard.php?baca");
	}
}
else
{
	//header("location:error.php");
	echo $id_pengunjung;
}
	
?>