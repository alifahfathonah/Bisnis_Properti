<?php 
include "include/cek-login.php";
?>
<?php
include('koneksi.php');
$id_properti = $_POST['id_properti'];
$status = $_POST['status'];
if ($status=="Terjual" or $status=="Disewa"){
$fee_agen = $_POST['fee_agen'];


$id_komisi ="K".rand(1000,10000);
$id = date('Y-m-d h:i:s');

$q_user= mysqli_query($con,"select id_user from properti where id_properti='$id_properti'");
while($hasil = mysqli_fetch_array($q_user))
{
	$id_user=$hasil['id_user'];
}
$q_user2= mysqli_query($con,"select * from user where id_user='$id_user'");
while($hasil2 = mysqli_fetch_array($q_user2))
{
	$pendapatan=$hasil2['pendapatan'];
}
$total= $fee_agen + $pendapatan;

$query_komisi = "INSERT INTO komisi VALUES('$id_user','$id_komisi','$id','$fee_agen')";
$sql_komisi = mysql_query ($query_komisi) or die (mysql_error());
$query2 = mysqli_query($con,"update user SET pendapatan='$total' where id_user='$id_user'" ) or die(mysql_error());
if ($status=="Terjual"){
	$query = mysqli_query($con,"update properti SET status='$status', keaktifan='2' where id_properti='$id_properti'" ) or die(mysql_error());
}
else
{
	$query = mysqli_query($con,"update properti SET status='$status' where id_properti='$id_properti'" ) or die(mysql_error());
}
if ($query) {
	if(isset($_POST['ss']))
	{
		if ($_POST['ss']=="kamu")
		{
			header('location:tampil_data_kamu.php');
		}
		else if ($_POST['ss']=="agen")
		{
			header('location:tampil_data_agen.php');
		}
		else if ($_POST['ss']=="admin")
		{
			header('location:tampil_data_agen.php');
		}
		else
		{
			header('location:tampil_data.php');
		}
	}
	else
	{
	header('location:tampil_data.php');
	}
}
}
else
{
	$fee_agen = "0";
	$query = mysqli_query($con,"update properti SET status='$status' where id_properti='$id_properti'" ) or die(mysql_error());
	if ($query) {
	if(isset($_POST['ss']))
	{
		if ($_POST['ss']=="kamu")
		{
			header('location:tampil_data_kamu.php');
		}
		else if ($_POST['ss']=="agen")
		{
			header('location:tampil_data_agen.php');
		}
		else if ($_POST['ss']=="admin")
		{
			header('location:tampil_data_agen.php');
		}
		else
		{
			header('location:tampil_data.php');
		}
	}
	else
	{
	header('location:tampil_data.php');
	}
}

}
?>