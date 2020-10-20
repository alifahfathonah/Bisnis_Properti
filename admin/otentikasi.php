<?php
include('include/koneksi.php');
session_start();
$username = $_POST['usernames'];
$pass = $_POST['passwords'];
echo $password = sha1($pass);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);

$q = mysqli_query($con,"select * from user where email='$username' and password='$password'");
/*
if (!$q) {
	printf("Error: %s\n", mysqli_error($con));
	exit();
}
*/
if (mysqli_num_rows($q) == 1) {
//(Jika data user ada)	
	$hasil = mysqli_fetch_array($q);
	$_SESSION['username'] = $hasil ['nama'];
	$_SESSION['id_user'] = $hasil ['id_user'];
	$_SESSION['id_status'] = $hasil ['id_status'];
	header('location:transit.php');
} else {
	
	//header('location:index.php?error=1');
}
?>