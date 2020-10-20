<?php
include "../koneksi2.php";
$kota = $_POST['kota'];
$query= mysqli_query($con2,"select * from kecamatan where regency_id='$kota'");
echo '<option value="0">Pilih Kecamatan</option>';
while($data=mysqli_fetch_array($query)){
	echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
}
?>