<div class="col-md-10" style="background-color: #F5F5DC; min-height: 100vh;">
  <div class="row">
    <div class="d-flex flex-column" >
      <div class="p-2 " >
        <i class="bi-piggy-bank text-decoration-none" style="color: #808080;">/Simpanan</i>
      </div>
        <div class="p-2 flex-grow-1 ">
          <div class="d-flex justify-content-between mb-3">
            <?php if($status=='aktif') {echo '<h2 class="" style="color: #808080;">Daftar Anggota Simpanan Aktif</h2>';} elseif ($status = "taktif"){echo '<h2 class="" style="color: #808080;">Daftar Anggota Simpanan Tidak Aktif</h2>';}?>
            <div>
              <a href="/admin/form" class="btn btn-primary" style="color: #FFFFFF; background-color: #20B2AA; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Tambah</a>
              <a class="btn btn-info" style="color: #FFFFFF; background-color: #20B2AA; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Cetak Daftar Anggota</a>
            </div>
          </div>
          <hr>
          <table class="table table-striped">
              <thead>
                <tr>
                  <th data-sortable="true">NO</th>
                  <th data-sortable="true">ID Anggota</th>
                  <th data-sortable="true">Nama Anggota</th>
                  <th data-sortable="true">Tanggal Masuk</th>

                  <th data-sortable="true">Total Simpanan Wajib</th>
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
                        <td data-sortable="true"><?= $data['id_simpanan'];?></td>
                        <td data-sortable="true"><?= $data['nama'];?></td>
                        <td data-sortable="true"><?= $data['created'];?></td>

                        <td data-sortable="true">Rp. <?= $data['total'];?></td>
                        <td>
                          <a href="<?= base_url('admin/anggota_s/detail/'.sha1($data['id_simpanan']));?>" class="btn btn-primary">Detail</a>
                          <a href="#" onclick="doUbahS('<?= sha1($data['id_simpanan']);?>')"><button type="button" class="btn btn-sm btn-danger">Ubah Status</button></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
          <div class="pager d-flex justify-content-between">
            <span id="page-num" class=" text-light">Hal : 1</span>
              <div class="border p-2 d-flex">
                <button class="btn btn-light btn-sm me-2">Previous</button>
                <button class="btn btn-light btn-sm ms-2">Next</button>
              </div>
          </div>
        </div>
      </div>
    </div>

          
  </div><!-- row  -->
</div><!-- main -->


      

    </div><!-- row sidebar -->
</div> <!-- container sidebar -->


