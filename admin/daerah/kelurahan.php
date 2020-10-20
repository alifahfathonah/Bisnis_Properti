<?php
include "../koneksi2.php";
$kec = $_POST['kec'];
$query= mysqli_query($con2,'select * from villages where district_id="'.$kec.'"');
echo '<option value="0">Pilih Kelurahan</option>';
while($data=mysqli_fetch_array($query)){
	echo '<option value="'.$data['id_kel'].'">'.$data['name'].'</option>';
}
?>