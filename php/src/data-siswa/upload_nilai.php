<?php  

include '../../koneksi.php';

if (isset($_POST['upload'])) {
    $targetfolderBase   = "../assets/uploads/";

    $fileNameTranskip   = date("h-m-s").basename( $_FILES['transkip']['name']);
    $fileNameIjazah  = date("h-m-s").basename( $_FILES['ijazah']['name']);

    $targetfolder   = $targetfolderBase . $fileNameTranskip;
    $targetfolder2  = $targetfolderBase . $fileNameIjazah;
    
    
    $ok=1;

    $file_type=$_FILES['transkip']['type'];
    $file_type2=$_FILES['ijazah']['type'];


    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpeg") {

         if(move_uploaded_file($_FILES['transkip']['tmp_name'], $targetfolder))

         {

            $query  = "UPDATE pendaftaran SET upload_transkip='$fileNameTranskip' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
             echo "<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Berhasil!</strong> Upload Transkip(PDF, JPEG, PNG).
            </div>";   
            }
             
         }

         else {

         echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Transkip(PDF, JPEG, PNG).
        </div>";

         }

        }

    else {

     echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Transkip harus format(.PDF, JPEG, PNG).
        </div>";

    }

    if ($file_type2=="application/pdf" || $file_type2=="image/png" || $file_type2=="image/jpeg") {
        if(move_uploaded_file($_FILES['ijazah']['tmp_name'], $targetfolder2))

         {

            $query  = "UPDATE pendaftaran SET upload_ijazah='$fileNameIjazah' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
                echo "<div class='alert alert-success alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Berhasil!</strong> Upload Ijazah(PDF, JPEG, PNG).
                </div>";                
            }


         }

         else {

         echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Ijazah(PDF, JPEG, PNG).
        </div>";

         }
    }else{
        echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Ijazah harus format(PDF, JPEG, PNG).
        </div>";
    }
    
    
}

?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Upload Transkip(PDF, JPEG, PNG) dan Ijazah(PDF, JPEG, PNG)</h4>
                <p class="category">Upload dengan format yang benar(PDF, JPEG, PNG)</p>
                <a href="index.php?page=4" class="btn btn-primary btn-md pull-right" style="margin-top: -40px;"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        

                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Transkip(PDF, JPEG, PNG) : </label>
                            <label class="btn btn-primary" for="my-file-selector">
                                <input id="my-file-selector" name="transkip" type="file" style="display:none" 
                                onchange="$('#upload-file-info').html(this.files[0].name)">
                                Upload Transkip (PDF, JPEG, PNG)
                            </label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Ijazah(PDF, JPEG, PNG) : </label>
                            <label class="btn btn-primary" for="my-file-selector2">
                                <input id="my-file-selector2" name="ijazah" type="file" style="display:none" 
                                onchange="$('#upload-file-info2').html(this.files[0].name)">
                                Upload Ijazah (PDF, JPEG, PNG)
                            </label>
                            <span class='label label-info' id="upload-file-info2"></span>
                        </div>
                    </div>
                       
                    <hr> 

                    <button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
                </form>
            </div>
        </div>
    </div>
</div>