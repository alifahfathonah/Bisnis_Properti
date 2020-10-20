<?php
$data = $_POST['image'];
list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);
$imageName = 'lol.png';
file_put_contents('temp/'.$imageName, $data);
echo 'done';
?>