<?php
include ('include/cek-login.php');
if (isset($_GET['inputsukses']))
{
?>
	<center><font color=#FFFFFF><h3>Menyimpan Data</h3><br><br>
	<img src='img/ring.gif'><br><meta http-equiv='Refresh' content='5;URL=tampil_data.php?sukses'/>
	<br><h3>Silahkan Tunggu </h3></font></center>
<?php }
else if (isset($_GET['editsukses']))
{
?>
	<center><font color=#FFFFFF><h3>Memperbaharui Data</h3><br><br>
	<img src='img/ring.gif'><br><meta http-equiv='Refresh' content='5;URL=tampil_data.php?edit'/>
	<br><h3>Silahkan Tunggu </h3></font></center>
	<?php 
}
else if (isset($_GET['hapususer']))
{
?>
	<center><font color=#FFFFFF><h3>Menghapus .... </h3><br><br>
	<img src='img/ring.gif'><br><meta http-equiv='Refresh' content='3;URL=tampil_user.php'/>
	<br><h3>Silahkan Tunggu </h3></font></center>
	<?php 
}
else if (isset($_GET['datagagal']))
{
?>
	<center><font color=#FFFFFF><h3>Memproses </h3><br><br>
	<img src='img/ring.gif'><br><meta http-equiv='Refresh' content='3;URL=input_data.php?gagal'/>
	<br><h3>Silahkan Tunggu </h3></font></center>
	<?php 
}
else if (isset($_GET['datalokasigagal']))
{
?>
	<center><font color=#FFFFFF><h3>Memproses </h3><br><br>
	<img src='img/ring.gif'><br><meta http-equiv='Refresh' content='3;URL=input_data.php?gagallokasi'/>
	<br><h3>Silahkan Tunggu </h3></font></center>
	<?php 
}
else if (isset($_SESSION['username']))
{
?>
	<center><font color=#FFFFFF><h3>Selamat Datang <?=$_SESSION['username'];?></h3><br><br>
	<img src='img/gears.gif'><br><meta http-equiv='Refresh' content='5;URL=dashboard.php'/>
	<br><h3>Silahkan Tunggu </h3></font></center>
<?php }

?>
	
	
<!DOCTYPE html>
<html lang="en">
<body bgcolor=#272A2F>
</body>
</html>