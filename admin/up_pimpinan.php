<?php
include "koneksi.php";
if (isset($_POST['edit'])){
$id_dokumen =addslashes(strip_tags($_POST['id_dokumen']));
$password =addslashes(strip_tags(sha1($_POST['password'])));
$passx =addslashes(strip_tags(sha1($_POST['passx'])));
$nama     =addslashes(strip_tags($_POST['nama']));
$email    =addslashes(strip_tags($_POST['email']));
$alamat    =addslashes(strip_tags($_POST['alamat']));
$pesan    =addslashes(strip_tags($_POST['pesan']));
$jenis_kelamin   =addslashes(strip_tags($_POST['jenis_kelamin']));
$nomor_hp    =addslashes(strip_tags($_POST['hape']));
if ($password==$passx)
{
$query = "UPDATE user SET nama='$nama', nomor_hp='$nomor_hp',password='$password',jenis_kelamin='$jenis_kelamin',alamat='$alamat', pesan='$pesan' where id_user='pimpinan'"; 
$sql = mysql_query ($query) or die (mysql_error());
	echo $query;
header("location:pimpinan.php"); 
}
else header("location:pimpinan.php?message=error");
}
?>