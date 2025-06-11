<div class="col-md-10" style="background-color: #F5F5DC; min-height: 100vh;">
    <div class="row">
      <div class="d-flex flex-column" >
        <div class="p-2 d-flex justify-content-between"  > 
          <div>
            <i class="bi-house text-decoration-none " style="color: #808080;">/Beranda</i>
          </div>
          
        </div>
        <div class="p-2 flex-grow-1 ">
          <div class="row">
            <div class="col-md-4">
              <form>
                <div class="mb-3">
                  <div class="card " style="width: 20rem;">
                    <div class="card-body text-center">
                      <h5 class="card-title text-black bi-person-fill" style="background-color: #80CBC4;"> Total Anggota Simpanan Aktif</h5>
                      <p class="card-text"><?=$totalAnggotaSimpanan?> Anggota</p>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="card " style="width: 20rem;">
                    <div class="card-body text-center">
                      <h5 class="card-title text-black bi-person-fill" style="background-color: #80CBC4;"> Total Anggota Pinjaman Belum Lunas</h5>
                      <p class="card-text"><?=$totalAnggotaPinjaman?> Anggota</p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-4">
              <form>
                <div class="mb-3">
                  <div class="card " style="width: 20rem;">
                    <div class="card-body text-center">
                      <h5 class="card-title text-black bi-upload" style="background-color: #80CBC4;">Total Pinjaman</h5>
                      <p class="card-text">RP <?=$totalPinjaman?></p>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  
                </div>
              </form>
            </div>
        </div>
      </div>
          
    </div><!-- row  -->
  </div><!-- main -->


      

  </div><!-- row sidebar -->
</div> <!-- container sidebar -->
