<?php 
include"include/koneksi.php";
$id_properti=$_POST['id'];
$query = mysqli_query($con,"SELECT gambar FROM properti where id_properti='$id_properti'");
while ($hasil = mysqli_fetch_array($query))
{
		$gambar=$hasil ['gambar'];
}
?>

<img src="gbdata/<?=$gambar;?>" width="100%" ></img>
