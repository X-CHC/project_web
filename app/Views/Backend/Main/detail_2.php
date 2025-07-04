<div class="col-md-10" style="background: linear-gradient(to right, #5d8aa8, blue)">
  <div class="row">
    <div class="d-flex flex-column" >
        <div class="p-2  d-flex justify-content-between" >
          <div>
            <i class="bi-people text-decoration-none text-light">/Anggota/Detail Anggota</i>
            <hr>
          </div>
        </div>
        <div class="p-2 flex-grow-1 ">
          <div class="d-flex justify-content-between mb-3">
            <h2 class="text-light">Detail Anggota</h2>
              <div>
                <button class="btn btn-primary me-2" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Ubah</button>
                <button class="btn btn-success" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Bayar</button>
              </div>
          </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="border p-3 m-2  border-black">
                    <pre class="text-light">
Nama Lenkap       : Dian Purnama
Tanggal Lahir     : 32-02-1978
Tempat Tinggal    : JL.Margonda Raya No.201
Tanggal Masuk     : 12-11-2015
Status            : Aktif
Kode anggota      : PA001</pre>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="border p-3 m-2 border-black">
                    <pre class="text-light">
Jenis Kelamin     : Perempuan
No. telpon        : 0895351149499
Email             : dian.purnama@live.com
NIK               : 3201503478032
Total Pinjaman    : Rp.30.000.000
Total Angsuran    : Rp.12.000.000</pre>
                  </div>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                  <button class="btn btn-info text-black" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Cetak Detail Anggota</button>
                </div>
              </div>
              <div class=row>
                <p class="display-6 text-light">Rekapan Tranksasi</p>
                <div class="col-md-10">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tipe Tranksasi</th>
                        <th scope="col">Nominal </th>
                        <th scope="col">   </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">01</th>
                        <td>01/1/2023</td>
                        <td>Penyetoran</td>
                        <td>Rp.2.000.000</td>
                        <td><a href="detail.html" class="btn btn-primary">Bukti</a></td>
                      </tr>
                      <tr>
                        <th scope="row">02</th>
                        <td>19/2/2023</td>
                        <td>Penyetoran</td>
                        <td>Rp.300.000</td>
                        <td><a href="detail.html" class="btn btn-primary">Bukti</a></td>
                      </tr>
                      <tr>
                        <th scope="row">03</th>
                        <td>05/3/2023</td>
                        <td>Penyetoran</td>
                        <td>Rp.1.000.000</td>
                        <td><a href="detail.html" class="btn btn-primary">Bukti</a></td>
                      </tr>
                      <tr>
                        <th scope="row">04</th>
                        <td>17/4/2023</td>
                        <td>Penarikan</td>
                        <td>Rp.3.000.000</td>
                        <td><a href="detail.html" class="btn btn-primary">Bukti</a></td>
                      </tr>
                      <tr>
                        <th scope="row">05</th>
                        <td>12/5/2023</td>
                        <td>Penyetoran</td>
                        <td>Rp.100.000</td>
                        <td><a href="/admin/anggota/d_anggota" class="btn btn-primary">Bukti</a></td>
                      </tr>
                      <tr>
                        <th scope="row">05</th>
                        <td>12/6/2023</td>
                        <td>Penarikan</td>
                        <td>Rp.200.000</td>
                        <td><a href="/admin/anggota/d_anggota" class="btn btn-primary">Bukti</a></td>
                      </tr>
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
                  <button class="btn btn-info mb-2 text-black" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Cetak Tranksasi Anggota</button>
                  <button class="btn btn-info text-black" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Cetak Detail dan Tranksasi Anggota</button>
                </div>
              </div>
            </div>

            
          </div>
        </div><!--  dflex -->

          
        </div><!-- row  -->
      </div><!-- main -->

<script src="/Assets/js/jquery.min.js"></script>
<script>
$(function() {
    var currentPage = 0;
    var numPerPage = 5; // Ganti dengan jumlah baris per halaman
    var $table = $('table');

    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });

    $table.trigger('repaginate');

    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);

    $('.pager .btn-secondary').eq(0).bind('click', function() {
        if (currentPage !== 0) {
            currentPage--;
            $('#page-num').text(currentPage + 1); // Tambahkan baris ini
            $table.trigger('repaginate');
        }
    });

    $('.pager .btn-secondary').eq(1).bind('click', function() {
        if (currentPage < numPages - 1) {
            currentPage++;
            $('#page-num').text(currentPage + 1); // Tambahkan baris ini
            $table.trigger('repaginate');
        }
    });
});
</script>
      

    </div><!-- row sidebar -->
</div> <!-- container -->
