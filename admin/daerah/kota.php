<?php
include "../koneksi2.php";
$prop = $_POST['prop'];
$query= mysqli_query($con2,"select * from kabupaten where province_id='$prop'");
echo '<option value="0">Pilih Kota</option>';
while($data=mysqli_fetch_array($query)){
	echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
}
?>