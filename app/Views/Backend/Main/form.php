

<div class="col-md-10" style="background-color: #F5F5DC;">
  <div class="row">
    <div class="d-flex flex-column">
      <div class="p-2 " >
        <i class="bi-person-add text-decoration-none " style="color: #808080;">/Pendaftaran</i>
      </div>
        <div class="p-2 flex-grow-1 ">
          <form role="form" method="post" action="<?= base_url('admin/post_form');?>" id="loginForm">
            <div class="row">
              <div class="panel panel-default">
                <p class="fs-4 " style="color: #808080;">Anggota Baru</p>
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
                
                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control mb-3" name="tanggalLahir">
                
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control mb-3" name="alamat" placeholder="Alamat lengkap">
                
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control mb-3" name="nik" placeholder="Nomor Induk Kependudukan">
                
                <div class="mb-3">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>


              </div>
              <div class="col-md-6">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select mb-3" name="jenisKelamin">
                  <option value="">Pilih...</option>
                  <option value="1">Laki-laki</option>
                  <option value="2">Perempuan</option>
                </select>
                
                <label for="noTelpon" class="form-label">No. Telpon</label>
                <input type="tel" class="form-control mb-3" name="noTelpon" placeholder="No Telpon Aktif">
                
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control mb-3" name="email" placeholder="Email Aktif">

                <label for="jenisAnggota" class="form-label">Jenis Anggota</label>
                <select class="form-select mb-3" id="jenisAnggota" name="jenisAnggota">
                  <option selected>Pilih...</option>
                  <option value="SP">Simpanan</option>
                  <option value="P">Pinjaman</option>
                </select>



                <label for="totalPinjaman" class="form-label" id="totalPinjamanLabel" style="display: none;">Total Pinjaman</label>
                <input type="text" class="form-control mb-3" id="totalPinjaman" placeholder="Total Pinjaman" name="totalPinjaman" style="display: none;">
              </div>
          </div>
          </form>


 


  


        </div>
          
        </div><!-- row  -->
      </div><!-- main -->


      

    </div><!-- row sidebar -->
</div> <!-- container sidebar-->

