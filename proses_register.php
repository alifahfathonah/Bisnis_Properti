<?php
$x=rand(1000,9999);
$target_dir = "admin/dokumen/";
$target_dir2 = "admin/gbuser/temp/";
$target_file = $target_dir2 .$x. basename($_FILES["photo"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file1 = $target_dir . basename($_FILES["ijazah"]["name"]);
$imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
$target_file2 = $target_dir . basename($_FILES["ktp"]["name"]);
$imageFileType = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
$target_file3 = $target_dir . basename($_FILES["npwp"]["name"]);
$imageFileType = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));

$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	$check1 = getimagesize($_FILES["ijazah"]["tmp_name"]);
    if($check1 !== false) {
        echo "File is an image - " . $check1["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	$check2 = getimagesize($_FILES["ktp"]["tmp_name"]);
    if($check2 !== false) {
        echo "File is an image - " . $check2["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	$check3 = getimagesize($_FILES["npwp"]["tmp_name"]);
    if($check3 !== false) {
        echo "File is an image - " . $check3["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	include "admin/koneksi.php";

$id_user =addslashes(strip_tags($_POST['id_user']));
$id_dokumen =addslashes(strip_tags($_POST['id_dokumen']));
$id_status =addslashes(strip_tags($_POST['id_status']));
$password0 =addslashes(strip_tags($_POST['password']));
$password =addslashes(strip_tags($_POST['password']));
$passx =addslashes(strip_tags($_POST['passx']));
$nama     =addslashes(strip_tags($_POST['nama']));
$photo     =basename($_FILES["photo"]["name"]);
$ijazah     =basename($_FILES["ijazah"]["name"]);
$ktp     =basename($_FILES["ktp"]["name"]);
$npwp     =basename($_FILES["npwp"]["name"]);
$email    =addslashes(strip_tags($_POST['email']));
$alamat    =addslashes(strip_tags($_POST['alamat']));
$pesan    =addslashes(strip_tags($_POST['pesan']));
$jenis_kelamin   =addslashes(strip_tags($_POST['jenis_kelamin']));
$nomor_hp    =addslashes(strip_tags($_POST['hape']));
$key_tanya    =addslashes(strip_tags($_POST['key_tanya']));
$key_jawab    =addslashes(strip_tags($_POST['key_jawab']));
$acak	=rand(100,10000);
$acak2 =sha1($acak);
$tanggal_user =date('Y-m-d h:i:s');
$key_forgot ="$acak2-$passx-$acak".".jpg";
$cek_no = mysql_query("select * from user where nomor_hp='$nomor_hp'");
	if (mysql_num_rows($cek_no) != 0)
	{
	echo "No Telp Yang anda gunakan sudah ada di database";
	exit();
	}
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photo"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}if ($_FILES["ijazah"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}if ($_FILES["ktp"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}if ($_FILES["npwp"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($password==$passx){
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
		if (move_uploaded_file($_FILES["ijazah"]["tmp_name"], $target_file1)) {
			if (move_uploaded_file($_FILES["ktp"]["tmp_name"], $target_file2)) {
				if (move_uploaded_file($_FILES["npwp"]["tmp_name"], $target_file3)) {

				$query = "INSERT INTO user values ('$id_user','$id_dokumen','$id_status','$nama','$email','$password','$nomor_hp','$alamat','$jenis_kelamin','0','$pesan','$key_forgot','$key_tanya','$key_jawab','$tanggal_user')"; 
				$sql = mysql_query ($query) or die (mysql_error());
				$query0 = "INSERT INTO dokumen VALUES ('$id_dokumen','$ijazah','$npwp','$ktp','$photo')";
				$sql0 = mysql_query ($query0) or die (mysql_error());
				if ($sql) {	
						header("location:register.php?sukses");
					} else {
						echo "<h2><font color=red>Admin Gagal Ditambahkan</font></h2>";	
					}
				}
			}
		}
	}//-----
	else {
		echo "Sorry, there was an error uploading your file.";
	}
}
}
?>