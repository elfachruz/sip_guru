<?php
include '../koneksi.php';
$query  = "select * from mtpelajaran";
$hasil  =mysql_query($query);
 
if(mysql_num_rows($hasil) > 0 ){
  $response = array();
  $response["data"] = array();
  while($x = mysql_fetch_array($hasil)){
    $h['id_mapel'] = $x["id_mapel"];
	$h['mapel'] = $x["mapel"];
    array_push($response["data"], $h);
  }
  echo json_encode($response);
}else {
  $response["message"]="tidak ada data";
  echo json_encode($response);
}
?>