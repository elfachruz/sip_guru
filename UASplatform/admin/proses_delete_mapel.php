<?php
	include "../koneksi.php";
	$id_mapel=$_GET['id_mapel'];
	$mapel=mysql_query("Delete FROM mtpelajaran WHERE id_mapel='$id_mapel'");
	header('location:tampil-admin.php');
?>