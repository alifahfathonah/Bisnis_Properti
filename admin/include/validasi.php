<?php
$id_user=$_SESSION['id_user'];
if (isset($_GET['id_user'])){
		$id_user2=$_GET['id_user'];
		if ($id_user2<>$id_user)
		{
			header("location:error.php");
		}
}
else if (isset($_GET['id_u'])){
		$id_user2=$_GET['id_u'];
		if ($id_user2<>$id_user)
		{
			header("location:error.php");
		}
}
else{
	$a=$_SESSION['id_status'];
	if ($a <>'S007')
	{
		if ($a <>'S000')
		{
			if ($a <>'S005')
				{
					header("location:error.php");
					//echo $_SESSION['id_status'];
				}
		}
	}
}
?>