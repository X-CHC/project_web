


<div class="col-md-10" style="background-color: #F5F5DC; min-height: 100vh;">
  <div class="row">
    <div class="d-flex flex-column" >
      <div class="p-2 ">
        <div>
          <i class="bi-cash-coin text-decoration-none " style="color: #808080;">/Angsuran/Pembayaran</i>
        </div>
      </div>
      <div class="p-2 flex-grow-1 ">
        <form class="d-flex mb-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Cari berdasarkan nama/kode" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
          <p class="fs-4 " style="color: #808080;">Data Anggota</p>
          <div>
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#myModal" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Ubah</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Bayar</button>
          </div> 
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="p-3 m-2" style="border: 1px solid #808080; background-color: #F5F5DC; color: #808080;"><pre>
Nama Lengkap   : -
Tanggal Lahir  : -
Tempat Tinggal : -
Tanggal Masuk  : -
Status         : -
Kode anggota   : -
            </pre>
            </div>
          </div>
          <div class="col-md-5">
          <div class="p-3 m-2" style="border: 1px solid #808080; background-color: #F5F5DC; color: #808080;"><pre>
Jenis Kelamin     : -
No. telpon        : -
Email             : -
NIK               : -
Total Pinjaman    : -
Total Angsuran    : -</pre>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
        <div class=row>
          <p class="display-6 " style="color: #808080;">Rekapan Tranksasi</p>
          <div class="col-md-10">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Tanggal Masuk</th>
                  <th scope="col">Tipe Tranksasi</th>
                  <th scope="col">Nominal </th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>

                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>

                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>

                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>

                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>

                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>

                </tr>
              </tbody>
            </table>
            <div class="pager d-flex justify-content-between">
              <span id="page-num" class=" mx-2 text-light">Hal : 1 dari 1</span>
                <div class="border p-2 d-flex">
                  <button class="btn btn-light btn-sm me-2">Previous</button>
                  <button class="btn btn-light btn-sm ms-2">Next</button>
                </div>
            </div>
          </div>
          <div class="col-md-2 "></div>
        </div>
      </div>
    </div>
          
        </div><!-- row  -->
      </div><!-- main -->

<!-- jendela mengambang -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Judul Jendela Mengambang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Isi dari jendela mengambang Anda.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Simpan Perubahan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- Gunakan kelas .modal-lg untuk modal yang lebih lebar -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulir</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulir Anda di sini -->
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <!-- Tambahkan lebih banyak input sesuai kebutuhan Anda -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!-- jendela mengambang -->

    </div><!-- row sidebar -->
</div> <!-- container sidebar -->

