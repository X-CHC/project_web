

<div class="col-md-10" style="background-color: #F5F5DC;">
  <div class="row">
    <div class="d-flex flex-column">
      <div class="p-2 " >
        <i class="bi-person-add text-decoration-none " style="color: #808080;">/Simpanan</i>
      </div>
        <div class="p-2 flex-grow-1 ">
          <form role="form" method="post" enctype="multipart/form-data" action="<?= base_url('admin/post_form_sukarela');?>" id="loginForm">
            <div class="row">
              <div class="panel panel-default">
              <h2 class="" style="color: #808080;"> Simpanan Sukarela</h2>
                  <hr>
                  <?php 
                    if(session()->get('error_list')!=""){
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?= session()->get('error_list');?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php 
                    }
                  ?>

              </div>
              <div class="col-md-6">
                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control mb-3" name="namaLengkap" placeholder="Nama Lengkap">


                <label for="bukti" class="form-label" id="atasBukti" >Bukti Simpanan Sukarela</label>
                <input type="file" class="form-control mb-3" id="bawahBukti" name="bukti_p" >

                
                <div class="mb-3">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>


              </div>
              <div class="col-md-6">
                
                <label for="noTelpon" class="form-label">Total Bayar</label>
                <input type="tel" class="form-control mb-3" name="noTelpon" placeholder="masukan Angka Saja">
                


              </div>
          </div>
          </form>


 


  


        </div>
          
        </div><!-- row  -->
      </div><!-- main -->


      

    </div><!-- row sidebar -->
</div> <!-- container sidebar-->

