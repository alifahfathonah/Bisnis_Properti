<?php
include "include/koneksi.php";
include "include/cek-login.php";
if($_SESSION['id_status']=="S005"){	
	$id_status="S007";
}
if($_SESSION['id_status']=="S003"){	
	$id_status="S004";
}
if($_SESSION['id_status']=="S000"){	
	$id_status="S003";
}
if (isset($_POST ['input_owner'])) 
{
	$id_owner="O".rand(100,10000);
	$nama_owner=$_POST ['nama_owner'];
	$nomor_hp_owner=$_POST ['nomor_hp_owner'];
	$alamat_owner=$_POST ['alamat_owner'];
	$query = "INSERT INTO owner VALUES('$id_owner','$id_status','$nama_owner','$alamat_owner','$nomor_hp_owner')";
	$sql = mysql_query ($query) or die (mysql_error());
}
header("location:input_data.php");
//$tgl= date ('Y-m-d H:m:s');
//echo $tgl;
?>