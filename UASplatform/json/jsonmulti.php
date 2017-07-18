<?php
include '../koneksi.php';
$query  = mysql_query("select * from guru, mtpelajaran where guru.id_mapel=mtpelajaran.id_mapel");
//inisialisasi variable sebagai array untuk menambah data
$data = array();
//mengurai data hasil query
//memparse data record dalam bentuk object
while($row = mysql_fetch_object($query)){
	//memasukan record ke dalam variable data
	array_push($data,$row);
}
$formatJson = array();
$formatJson['status'] = "ok";
$formatJson['total'] = count($data);
$formatJson['list'] =$data;

//menampilkan serta mengencode data ke json string
//echo json_encode($data);
echo json_encode($formatJson);