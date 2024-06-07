

<div class="col-md-10" style="background-color: #F5F5DC;">
  <div class="row">
    <div class="d-flex flex-column">
      <div class="p-2 " >
        <i class="bi-person-add text-decoration-none " style="color: #808080;">/Pendaftaran</i>
      </div>
        <div class="p-2 flex-grow-1 ">
          <form role="form" method="post" action="<?= base_url('/admin/simpan_admin');?>">
            <div class="row">
              <div class="panel panel-default">
                <p class="fs-4 " style="color: #808080;">Admin Baru</p>
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
                <label required="required" class="form-label">Nama Admin</label>
                <input type="text" class="form-control mb-3" name="namaAdmin" placeholder="Nama Admin">
                
                <label required="required" class="form-label">Username Admin</label>
                <input type="text" class="form-control mb-3" name="usernameAdmin">
                
                <label required="required" class="form-label">Password Admin</label>
                <input type="text" class="form-control mb-3" name="pwAdmin" placeholder="Default pass_admin">
                
                <label required="required" class="form-label">Pangkat</label>
                <select class="form-select mb-3" name="level">
                  <option value="Tengkorak">Pilih...</option>
                  <option value="Major">Member Guild</option>
                  <option value="GM">Petinggi Guild</option>
                </select>
                
                <div class="mb-3">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>


              </div>
              <div class="col-md-6"> </div>
              
          </div>
          </form>


 


  


        </div>
          
        </div><!-- row  -->
      </div><!-- main -->


      

    </div><!-- row sidebar -->
</div> <!-- container sidebar-->

