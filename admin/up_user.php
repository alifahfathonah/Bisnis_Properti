<?php
include "koneksi.php";
if (isset($_POST['edit'])){
$id_user =addslashes(strip_tags($_POST['id_user']));
$id_dokumen =addslashes(strip_tags($_POST['id_dokumen']));
$password =addslashes(strip_tags(sha1($_POST['password'])));
$passx =addslashes(strip_tags(sha1($_POST['passx'])));
$nama     =addslashes(strip_tags($_POST['nama']));
$email    =addslashes(strip_tags($_POST['email']));
$alamat    =addslashes(strip_tags($_POST['alamat']));
$pesan    =addslashes(strip_tags($_POST['pesan']));
$jenis_kelamin   =addslashes(strip_tags($_POST['jenis_kelamin']));
$nomor_hp    =addslashes(strip_tags($_POST['hape']));
$key_tanya    =addslashes(strip_tags($_POST['key_tanya']));
$key_jawab    =addslashes(strip_tags($_POST['key_jawab']));
$acak	=rand(100,10000);
$acak2 =sha1($acak);

$t_foto = mysqli_query($con,"select * from dokumen where id_dokumen='$id_dokumen'");
while($hasilfoto = mysqli_fetch_array($t_foto))
{
	$foto = $hasilfoto['foto'];
}
if ($password==$passx)
{
$query = "UPDATE user SET nama='$nama', nomor_hp='$nomor_hp',password='$password',jenis_kelamin='$jenis_kelamin',alamat='$alamat', key_tanya='$key_tanya', key_jawab='$key_jawab', pesan='$pesan' where id_user='$id_user'"; 
$sql = mysql_query ($query) or die (mysql_error());
	if ($sql) {
		header("location:input_foto.php?name_foto=".$foto."");
exit();		
	} else {
		echo "<h2><font color=red>User Gagal Diupdate</font></h2>";		
	}
	echo $query;
header("location:tampil_user.php"); 
}
else header("location:show_user.php?message=error");
}
?>