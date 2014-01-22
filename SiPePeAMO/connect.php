<?php
$host='localhost';
$user='root';
$password='';
$db='sipepe';
$connect = mysql_connect($host, $user, $password);
$db=mysql_select_db($db, $connect);
?>