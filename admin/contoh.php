<html>
<?php
include "koneksi.php";
$query=mysqli_query($con,"SELECT * From properti where id_user='U78555'");
while ($hasil=mysqli_fetch_array($query)){
	$lokasi = $hasil['lokasi'];
	$id_fasilitas1 = $hasil['id_fasilitas'];		
	//echo $id_fasilitas1."--><br> ";
	
		$query2=mysqli_query($con,"SELECT * From fasilitas where tahun='2000'");
		while ($hasil2=mysqli_fetch_array($query2)){
			$garasi = $hasil2['garasi'];
			$id_fasilitas = $hasil2['id_fasilitas'];
			//echo $garasi;
			//echo " -- ".$id_fasilitas;
			if($id_fasilitas==$id_fasilitas1){
				$query3=mysqli_query($con,"SELECT * From properti where id_fasilitas='$id_fasilitas1'");
				while ($hasil3=mysqli_fetch_array($query3)){
				echo $hasil3['judul'];				
				}
				echo "<br>--".$id_fasilitas1."--<br>";
			}		
		}
			
}
?>
</html>