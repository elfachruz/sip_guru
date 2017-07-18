<?php
	include "../koneksi.php";
	$id_guru=$_POST['id_guru'];
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$id_mapel = $_POST['id_mapel'];
	$guru=mysql_query("UPDATE guru SET nip = '$nip',nama = '$nama',email = '$email',id_mapel = '$id_mapel' WHERE id_guru = '$id_guru'");
	header('location:tampil-admin.php');
?>