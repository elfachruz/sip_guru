<?php
session_start();
if (!isset($_SESSION['user'])){
header("Location:../index.php");
}
require "/template.php";
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
  <h3>Tampil Data</h3>      
  <p>Create, Read, Update and Delete Data from Database</p>      
 </div>
</div>
 
<div class="container">
 <div class="btn-toolbar">
  <a class="btn btn-primary" data-target="#ModalAdd" data-toggle="modal" href="#"> Tambah Data Guru</a>
  <a class="btn btn-primary" data-target="#ModalAddx" data-toggle="modal" href="#"> Data Mata Pelajaran</a>
 </div>
</div>
<br>
<br>
 
<div class="container">
 <div class ="table-responsive">
  <div class="col-md-9">
   <table class="table table-striped table-bordered table-hover">
   <thead class="table-header">
    <tr>
     <th>NIP</th>
     <th>Nama</th>
	 <th>Email</th>
     <th>Mata Pelajaran</th>
	 <th>Action</th>
    </tr>
	</thead>
    <tbody>   
    <?php
	$json = json_decode($response);
	foreach ($json->list as $row) {
		# code... 	
	?>
				<tr>
					<td><?php echo $row->nip ; ?></td>
					<td><?php echo $row->nama ; ?></td>
					<td><?php echo $row->email ; ?></td>
					<td><?php echo $row->mapel ; ?></td>
					<td><span class="btn btn-xs btn-info"><a href="#" class='open_modal' id='<?php echo $row->id_guru ;?>'>Update</a></span>
					<a href="#" class="btn btn-xs btn-danger" onclick="confirm_modal('proses_delete.php?&id_guru=<?php echo $row->id_guru ; ?>');">Hapus</a></td>
				</tr>
	<?php } ?>
    </tbody>
   </table>
  </div> 
 </div>
</div>


<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Insert Data</h4>
        </div>

        <div class="modal-body">
          <form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 10px;">
                  <label for="NIP">NIP</label>
                  <input type="hidden" name="id_guru"  class="form-control" placeholder="id_guru" required/>
				  <input type="text" name="nip"  class="form-control" placeholder="NIP" required/>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <label for="Nama">Nama</label>
                   <input type="text" name="nama" class="form-control" placeholder="Nama" required/>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <label for="Email">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Email" required/>
                </div>
				
				<div class="form-group" style="padding-bottom: 10px;">
                  <label for="Mata Pelajaran">Mata Pelajaran</label>
                  <select name="id_mapel" class="form-control" id="mapel" required>
				  <option value="">-Pilih Mata Pelajaran-</option>
				  <?php
					$file = file_get_contents('http://localhost/uasplatform/json/jsonmapel.php');
					$jsonmapel = json_decode($file);				  
					foreach ($jsonmapel->data as $index => $obj) {
				  ?>
					<option value="<?php echo $obj->id_mapel ; ?>"><?php echo $obj->mapel ; ?></option>
					<?php } ?>
				</select>
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Simpan
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Keluar
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>

<div id="ModalAddx" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Mata Pelajaran</h4>
        </div>

        <div class="modal-body">
		 <div class ="table-responsive">
  <div class="col-md-9">
   <table class="table table-striped table-bordered table-hover">
   <thead class="table-header">
    <tr>
     <th>No</th>
     <th>Mata Pelajaran</th>
	 <th>Hapus</th>
    </tr>
	</thead>
    <tbody>   
    <?php
	$no=1;
	$file = file_get_contents('http://localhost/uasplatform/json/jsonmapel.php');
	$jsonmapel = json_decode($file);				  
	foreach ($jsonmapel->data as $index => $obj) { 	
	?>
				<tr>
					<td><?php echo $no++ ; ?></td>
					<td><?php echo $obj->mapel ; ?></td>
					<td><a href="#" class="btn btn-xs btn-danger" onclick="confirm_modal('proses_delete_mapel.php?&id_mapel=<?php echo $obj->id_mapel ; ?>');">Hapus</a></td>
				</tr>
	<?php } ?>
    </tbody>
   </table>
  </div> 
 </div>

          <form action="proses_save_mapel.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 10px;">
                  <input type="hidden" name="id_guru"  class="form-control" placeholder="id_mapel" required/>
				</div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <label for="Mapal">Tambah Mata Pelajaran</label>
                   <input type="text" name="mapel" class="form-control" placeholder="Mapel" required/>
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Tambah
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Keluar
                  </button>
              </div>

              </form>

           

            </div>

           
        </div>
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Yakin Hapus Data Yang Dipilih ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak Jadi</button>
      </div>
    </div>
  </div>
</div>


<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var i = $(this).attr("id");
		   $.ajax({
    			   url: "modal_edit.php",
    			   type: "GET",
    			   data : {id_guru: i,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>