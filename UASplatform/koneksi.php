<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "sipguru"; //sesuai nama db yg dibuat

$db = mysql_connect($server,$username,$password) or DIE("koneksi ke database gagal !!");
mysql_select_db($db_name) or DIE("nama database tersebut tidak ada !!");

?>