<div class="col-md-10" style="background-color: #F5F5DC; min-height: 100vh;">
  <div class="row">
    <div class="d-flex flex-column" >
      <div class="p-2 " >
        <i class="bi-cash text-decoration-none " style="color: #808080;">/Pinjaman</i>
      </div>
      <div class="p-2 flex-grow-1 ">        
        <div class="d-flex justify-content-between mb-3">
        <h2 class="" style="color: #808080;">Daftar Angsuran</h2>
            <div>
                <a href="/admin/form" class="btn btn-primary" style="color: #FFFFFF; background-color: #20B2AA; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Tambah</a>
            </div>
          </div>
        <hr>
          <table class="table table-striped">
              <thead>
                <tr>
                  <th data-sortable="true">NO</th>
                  <th data-sortable="true">ID Anggota</th>
                  <th data-sortable="true">Nama Anggota</th>

                  <th data-sortable="true">Besar Pinjaman</th>

                  <th data-sortable="true">Opsi</th>
				        </tr>
              </thead>
                <tbody>
                    <?php
                        $no = 0;
                        foreach($data_user as $data){
                    ?>
                    <tr>
                        <td data-sortable="true"><?= $no=$no+1;?></td>
                        <td data-sortable="true"><?= $data['id_pinjaman'];?></td>
                        <td data-sortable="true"><?= $data['nama'];?></td>
                        <td data-sortable="true"><?= $data['total_p'];?></td>


                        <td>
                          <a href="<?= base_url('admin/anggota_p/detail/'.sha1($data['id_pinjaman']));?>" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
          <div class="pager d-flex justify-content-between">
            <span id="page-num" class=" text-light">Hal : 1 </span>
              <div class="border p-2 d-flex">
                <button class="btn btn-light btn-sm me-2">Previous</button>
                <button class="btn btn-light btn-sm ms-2">Next</button>
              </div>
          </div>
        </div>
      </div>

          
        </div><!-- row  -->
      </div><!-- main -->


      

    </div><!-- row sidebar -->
</div> <!-- container sidebar -->


