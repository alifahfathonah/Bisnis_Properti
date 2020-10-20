<?php
include "koneksi.php";
if (isset($_GET['id'])) {
	$id_properti = $_GET['id'];
} else {
	die ("error tidak ada data yang dipilih ");	
}
$q=mysql_query( "SELECT * FROM properti WHERE id_properti='$id_properti'");
$qw=mysql_fetch_assoc($q);
$oleh = $qw['id_user'];
$user=$_SESSION['id_user'];
if ($user!=$oleh)
	{
		header ("location:error.php");
	}
?>