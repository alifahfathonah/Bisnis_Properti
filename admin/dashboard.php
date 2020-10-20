<?php
	include "include/cek-login.php";
	$id_status=$_SESSION['id_status'];
	if($id_status=="S005"){
		
	include "dashboard_admin.php";
	}
	else if($id_status=="S003"){
		include "dashboard_user.php";
	}
	else if($id_status=="S006"){
		include "dashboard_pimpinan.php";
	}
	else{
		header('location:error.php');
	}
?>
