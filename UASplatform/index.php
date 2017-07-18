<?php include('template.php');

$curl	= curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL 			=> "http://localhost/uasplatform/json/jsonmulti.php",
	CURLOPT_RETURNTRANSFER	=> true,
	CURLOPT_ENCODING		=> "",
	CURLOPT_MAXREDIRS		=> 10,
	CURLOPT_TIMEOUT			=> 10,
	CURLOPT_HTTP_VERSION	=> CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST	=> "GET",
	CURLOPT_HTTPHEADER		=> array(),
));

$response	= curl_exec($curl);
$err		= curl_error($curl);
curl_close($curl);

if($err){
	echo '{"status":"error"}';
}
else{
	//echo $response;
}
?>
<div class="container">
 <div class="jumbotron">
  <h3>Sistem Informasi Pendataan Guru</h3>      
  <p></p>      
 </div>
</div>

<div class="container">

	<div class="row">
	<div class="col-sm-2">
            <h4>Pencarian data</h4>
        </div>
	<div class="col-sm-3">
	<div class="input-group">
	<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input type="search" id="search" value="" class="form-control" placeholder="Search using Fuzzy searching">
        </div>
		</div>
    </div>

	<br>
	
<div class="row">
<div class="col-sm-12">	
 <div class ="table-responsive">
   <table class="table table-striped table-bordered table-hover" id="table">
   <thead class="table-header">
    <?php 
	$no=1;
	?>
	<tr>
	 <th>No</th>
     <th>NIP</th>
     <th>Nama</th>
	 <th>Email</th>
     <th>Mata Pelajaran</th>
    </tr>
	</thead>
    <tbody>   
    <?php
	$json = json_decode($response);
	foreach ($json->list as $row) {
		# code... 	
	?>
				<tr>
					<td><?php echo $no++ ;?></td>
					<td><?php echo $row->nip ; ?></td>
					<td><?php echo $row->nama ; ?></td>
					<td><?php echo $row->email ; ?></td>
					<td><?php echo $row->mapel ; ?></td>
				</tr>
	<?php } ?>
    </tbody>
   </table>
  </div> 
 </div>
</div>

<script>
$(function () {
    $( '#table' ).searchable({
        striped: true,
        oddRow: { 'background-color': '#f5f5f5' },
        evenRow: { 'background-color': '#fff' },
        searchType: 'fuzzy'
    });
});
</script>
