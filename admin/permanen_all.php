<?php 
include "cek-login.php";
?>
<?php
include('koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($con,"DELETE FROM khas where id=1" ) or die(mysql_error());

if ($query) {
	header('location:sementara.php');
}
?>