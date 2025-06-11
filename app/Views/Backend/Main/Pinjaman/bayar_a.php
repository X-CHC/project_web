

<div class="col-md-10" style="background-color: #F5F5DC;">
  <div class="row">
    <div class="d-flex flex-column">
      <div class="p-2 " >
        <i class="bi-person-add text-decoration-none " style="color: #808080;">/Pendaftaran</i>
      </div>
        <div class="p-2 flex-grow-1 ">
          <form role="form" method="post" enctype="multipart/form-data" action="<?= base_url('/admin/post_bayar_angsuran');?>" id="loginForm">
            <div class="row">
              <div class="panel panel-default">
              <h2 class="" style="color: #808080;"> Anggota Baru</h2>
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
              <em>bayarlah sesuai besar cicilan per bulan, kalo boleh lebih.</em>
                <label for="bukti" class="form-label" id="atasBukti">Bukti Angsuran</label>
                <input type="file" class="form-control mb-3" id="bawahBukti" name="bukti_p" >

                <div class="mb-3">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>


              </div>
          </div>
          </form>


 


  


        </div>
          
        </div><!-- row  -->
      </div><!-- main -->


      

    </div><!-- row sidebar -->
</div> <!-- container sidebar-->

