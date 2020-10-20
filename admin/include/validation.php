<?php
mysql_connect("localhost", "root", "");
mysql_select_db("bisnisproperti");

$sql = mysql_query("select * from user where email = '$_POST[username]';");
$cocok = mysql_num_rows($sql);

echo $cocok;
?>