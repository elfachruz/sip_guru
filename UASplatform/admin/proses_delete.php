<?php
	include "../koneksi.php";
	$id_guru=$_GET['id_guru'];
	$guru=mysql_query("Delete FROM guru WHERE id_guru='$id_guru'");
	header('location:tampil-admin.php');
?>