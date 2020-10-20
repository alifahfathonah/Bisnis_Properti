<?php 
include "include/cek-login.php";
?>
<?php
include('koneksi.php');
$id_properti = $_GET['id'];
$id_user=$_SESSION['id_user'];
$id = date('Y-m-d h:i:s');
$id_perubahan="PR".rand(1000,10000);
$query = mysqli_query($con,"update properti SET keaktifan='1' ,status='Tersedia' where id_properti='$id_properti'" ) or die(mysql_error());
$query_perubahan = "INSERT INTO perubahan VALUES('$id_user','$id_properti','$id_perubahan','$id','Back')";
$sql_perubahan = mysql_query ($query_perubahan) or die (mysql_error());
if ($query) {
	header('location:sementara.php?restore');
}
else
{
	header('location:error.php');
}
?>