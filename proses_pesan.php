<?php
include "admin/koneksi.php";
if(isset($_POST["submit"])) {
	$id_user =addslashes(strip_tags($_POST['id_user']));
	$id =addslashes(strip_tags($_POST['id']));
	$vali =addslashes(strip_tags($_POST['vali']));
	$nama=addslashes(strip_tags($_POST['nama']));
	$email=addslashes(strip_tags($_POST['email']));
	$nomor_hp=addslashes(strip_tags($_POST['nomor_hp']));
	$pesan=addslashes(strip_tags($_POST['pesan']));
	
	$id_pengunjung="P".rand(1000,9999);
	$tanggal_pengunjung=date("Y-m-d H:i:s");
	
	//echo $id_user.$id.$nama.$email.$nomor_hp.$pesan." ".$tanggal_pengunjung;
	$query = "INSERT INTO pengunjung VALUES ('$id_user','$id_pengunjung','S001','$nama','$email','$nomor_hp','$pesan','1','$tanggal_pengunjung')";
		$sql= mysql_query ($query) or die (mysql_error());
			if ($sql) {	
				if ($vali=="1"){
					header("location:details.php?id=$id&sukses");
					exit();
				}
				else{
					//echo $id2.$id;
						header("location:agentdetail.php?id=$id_user&sukses");
					exit();
				}
			}
			else{
					header("location:404.html");
				}
}
else
{
	header("location:404.html");
}
?>