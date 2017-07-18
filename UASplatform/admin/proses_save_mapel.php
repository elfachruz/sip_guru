<?php
include "../koneksi.php";
$mapel = $_POST['mapel'];
mysql_query("INSERT INTO mtpelajaran (mapel) VALUES ('$mapel')");
header('location:tampil-admin.php');
?>