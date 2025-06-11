<div class="col-md-10" style="background-color: #F5F5DC; min-height: 100vh;">
  <div class="row">
    <div class="d-flex flex-column" >
        <div class="p-2  d-flex justify-content-between" >
          <div>
            <i class="bi-people text-decoration-none" style="color: #808080;">/Anggota/Detail Anggota</i>
            <hr>
          </div>
        </div>
        <div class="p-2 flex-grow-1 ">
          <div class="d-flex justify-content-between mb-3">
            <h2 class=" "style="color: #808080;">Detail Anggota</h2>
              <div>
                <a href="<?= base_url('admin/edit_anggota_s/'.sha1($data['id_simpanan']));?>"><button type="button" class="btn btn-secondary me-2" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</button></a>
                <a href="<?= base_url('admin/bayar_simpanan_wajib/'.sha1($data['id_simpanan']));?>"><button type="button" class="btn btn-success me-2" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Bayar</button></a>              
              </div>
          </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="border p-3 m-2  border-black">
                    <pre class="text-dark">
Kode anggota   : <?= $data['id_simpanan']?> 
Nama           : <?= $data['nama'];?> 
Tanggal Lahir  : <?= $data['tgl_lahir']?> 
Tempat Tinggal : <?= $data['alamat']?> 
Tanggal Masuk  : <?= $data['created']?> 
</pre>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="border p-3 m-2 border-black">
                    <pre class="text-dark">
No. telpon     : <?= $data['telpon']?> 
Email          : <?= $data['email']?> 
NIK            : <?= $data['nik']?> 
Jenis Kelamin  : <?= $data['jenis_kelamin']?> 
Status         : <?php if($data['status']=='0') {echo 'aktif';} elseif ($data['status'] = "1"){echo 'Tidak Aktif';}?>
</pre>
                  </div>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">

                </div>

              </div>
              <div class=row>
                <h2 class=" "style="color: #808080;">Rekapan Transaksi</h2>
                <div class="col-md-10">
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th data-sortable="true">NO</th>
                        <th data-sortable="true">Tanggal Bayar</th>
                        <th data-sortable="true">Total Dibayar</th>
                        <th data-sortable="true"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0; 
                    foreach ($data_s as $item){
                        
                    ?>
                    <tr>
                        <td data-sortable="true"><?= $no=$no+1;?></td>
                        <td data-sortable="true"><?= $item['tgl_bayar']; ?></td>
                        <td data-sortable="true">Rp. 250000</td>
                        <td>
                          <a href="/Assets/Bukti_W/<?php echo $item['bukti'];?>" target="_blank"><?php echo $item['bukti'];?></a>
                        </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                  <div class="pager d-flex justify-content-between">
                    <span id="page-num" class=" text-light">Hal : 1 dari 1</span>
                      <div class="border border-black p-2 d-flex">
                        <button class="btn btn-light btn-sm me-2">Previous</button>
                        <button class="btn btn-light btn-sm ms-2">Next</button>
                      </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                 
                </div>
              </div>
            </div>

            
          </div>
        </div><!--  dflex -->

          
        </div><!-- row  -->
      </div><!-- main -->

      

    </div><!-- row sidebar -->
</div> <!-- container -->
