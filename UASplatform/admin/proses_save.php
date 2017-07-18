<?php
include "../koneksi.php";
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$id_mapel = $_POST['id_mapel'];
mysql_query("INSERT INTO guru (nip,nama,email,id_mapel) VALUES ('$nip','$nama','$email','$id_mapel')");
header('location:tampil-admin.php');
?>