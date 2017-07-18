<?php
    include "../koneksi.php";
	$id=$_GET['id_guru'];
	$guru=mysql_query("SELECT * FROM guru,mtpelajaran WHERE id_guru='$id' and guru.id_mapel=mtpelajaran.id_mapel ");
	while($r=mysql_fetch_array($guru)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Guru</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 10px;">
                	<label for="NIP">NIP</label>
                    <input type="hidden" name="id_guru"  class="form-control" value="<?php echo $r['id_guru']; ?>" required/>
     				<input type="text" name="nip"  class="form-control" value="<?php echo $r['nip']; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                	<label for="Nama">Nama</label>
     				<input type="text" name="nama"  class="form-control" value="<?php echo $r['nama']; ?>" required/>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                	<label for="Email">Email</label>       
     				<input type="text" name="email"  class="form-control" value="<?php echo $r['email']; ?>" required/>
                </div>
				
				<div class="form-group" style="padding-bottom: 10px;">
                  <label for="Mata Pelajaran">Mata Pelajaran</label>
                  <select name="id_mapel" class="form-control" id="mapel" required>
				  <option value="<?php echo $r['id_mapel']; ?>"><?php echo $r['mapel']; ?></option>
				</select>
                </div>

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Confirm
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

             <?php } ?>

            </div>

           
        </div>
    </div>