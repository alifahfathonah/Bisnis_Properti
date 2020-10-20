<?php
include "include/koneksi.php";
$id_user=$_GET['id'];
$query=mysqli_query($con,"SELECT * FROM user WHERE id_user='$id_user'");
while($hasil = mysqli_fetch_array($query)) 
    {   
		$email = $hasil['email'];
		$id_status = $hasil['id_status'];
		$password = $hasil['password'];
	}
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

// Menambahkan penerima
$mail->addAddress($email);

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Menambahkan cc atau bcc 
//$mail->addCC('cc@contoh.com');
//$mail->addBCC('bcc@contoh.com');

// Subjek email
$mail->Subject = 'Konfirmasi Calon Agen';

// Mengatur format email ke HTML
$mail->isHTML(true);
$pass="lolool";
// Konten/isi email
$mailContent = "<h1>SORRY GAN!! Kamu di tolak </h1>";
$mail->Body = $mailContent;

// Menambahakn lampiran
//$mail->addAttachment('lmp/file1.pdf');
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
	$password=sha1($password);
	$query = mysqli_query($con,"update user SET id_status='S009', password='$password' where id_user='$id_user'" ) or die(mysql_error());
    //echo 'Pesan telah terkirim';
	header('location:calon_agen.php');
}