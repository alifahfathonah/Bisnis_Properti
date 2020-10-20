<?php 
include "cek-login.php";
?>
<?php
include('koneksi.php');
$id = $_GET['id'];
$query = mysqli_query($con,"update khas SET crud='0' where id='$id'" ) or die(mysql_error());

if ($query) {
	header('location:sementara.php');
}
?>