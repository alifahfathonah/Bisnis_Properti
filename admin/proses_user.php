<?php
include "koneksi.php";
if (isset($_POST['input'])){
$id_user =addslashes(strip_tags($_POST['id_user']));
$id_dokumen =addslashes(strip_tags($_POST['id_dokumen']));
$id_status =addslashes(strip_tags($_POST['id_status']));
$password0 =addslashes(strip_tags($_POST['password']));
$password =addslashes(strip_tags(sha1($_POST['password'])));
$passx =addslashes(strip_tags(sha1($_POST['passx'])));
$nama     =addslashes(strip_tags($_POST['nama']));
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
$foto= date('Y-m-d h-i-s').".png";
$key_forgot ="$acak2-$passx-$acak".".jpg";
$cek_no = mysqli_query($con,"select * from user where nomor_hp='$nomor_hp'");
	if (mysqli_num_rows($cek_no) != 0)
	{
	echo "No Telp Yang anda gunakan sudah ada di database";
	exit();
	}

if ($password==$passx)
{
	$pathAwal = "D:/htdocs/Sewa_Rumah/admin/gbuser/Default.png";
	$pathTujuan = "D:/htdocs/Sewa_Rumah/admin/gbuser/temp/".$foto;
	copy($pathAwal, $pathTujuan);	
	$query = "INSERT INTO user values ('$id_user','$id_dokumen','$id_status','$nama','$email','$password','$nomor_hp','$alamat','$jenis_kelamin','0','$pesan','$key_forgot','$key_tanya','$key_jawab','$tanggal_user')"; 
	$sql = mysql_query ($query) or die (mysql_error());
	$query0 = "INSERT INTO dokumen VALUES ('$id_dokumen','ijazah','npwp','ktp','$foto')";
	$sql0 = mysql_query ($query0) or die (mysql_error());
	if ($sql) {
			
	} else {
		echo "<h2><font color=red>Admin Gagal Ditambahkan</font></h2>";	
	}
echo "<script type='text/javascript'>alert('user berhasil ditambah');</script>";
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'discoveryproperti@gmail.com';
$mail->Password = 'agustus17';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('muhamad_havid.aa@student.uns.ac.id', 'Discovery');
$mail->addReplyTo('muhamad_havid.aa@student.uns.ac.id', 'Discovery');
$mail->addAddress($email);
$mail->Subject = 'Konfirmasi Calon Agen';
$mail->isHTML(true);
$pass="lolool";
// Konten/isi email
$mailContent = "<h1>SELAMAT !! Anda Dinyatakan Bisa Bergabung Menjadi Agen Kami </h1>
    <p>Silahkan Login dengan akun <p><br>
	username : $email
	<br>
	password : $password0
	<br><a href='google.com'>Login Di sini</a>";
$mail->Body = $mailContent;

if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;	
	header("location:input_user.php?message=error");
}
else{
		header("location:input_foto.php?name_foto=$foto");
	}
}
}
?>