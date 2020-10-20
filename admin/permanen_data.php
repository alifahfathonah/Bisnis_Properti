<?php 
include "include/cek-login.php";
?>
<?php
include('koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($con,"DELETE FROM properti where id_properti='$id'" ) or die(mysql_error());

if ($query) {
	header('location:sementara.php?hapus_permanen');
}
?>