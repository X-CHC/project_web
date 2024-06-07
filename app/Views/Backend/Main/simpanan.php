<div class="col-md-10" style="background-color: #F5F5DC; min-height: 100vh;">
  <div class="row">
    <div class="d-flex flex-column" >
      <div class="p-2 " >
        <i class="bi-piggy-bank text-decoration-none" style="color: #808080;">/Simpanan</i>
      </div>
        <div class="p-2 flex-grow-1 ">
          <div class="d-flex justify-content-between mb-3">
            <h2 class="" style="color: #808080;">Daftar Anggota simpanan</h2>
            <div>
              <a href="/admin/form" class="btn btn-primary" style="color: #FFFFFF; background-color: #20B2AA; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Tambah</a>
              <a class="btn btn-info" style="color: #FFFFFF; background-color: #20B2AA; --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Cetak Daftar Anggota</a>
            </div>
          </div>
          <hr>
          <form class="d-flex mb-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari berdasarkan nama/kode" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <table class="table table-light">
            <thead>
              <tr>
                <th scope="col">Kode</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Email</th>
                <th scope="col">Simpanan</th>
                <th scope="col">   </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">SP001</th>
                <td>Andi Pratama</td>
                <td>01/12/2023</td>
                <td>andi.pratama@gmail.com</td>
                <td>Rp.20.000.000</td>
                <td><a href="#" class="btn btn-primary">Detail</a></td>
              </tr>
              <tr>
                <th scope="row">SP002</th>
                <td>Budi Santoso</td>
                <td>03/12/2023</td>
                <td>budi.santoso@yahoo.com</td>
                <td>Rp.9.000.000</td>
                <td><a href="#" class="btn btn-primary">Detail</a></td>
              </tr>
              <tr>
                <th scope="row">SP003</th>
                <td>Cinta Dewi</td>
                <td>05/12/2023</td>
                <td>cinta.dewi@outlook.com</td>
                <td>Rp.15.000.000</td>
                <td><a href="#" class="btn btn-primary">Detail</a></td>
              </tr>
            </tbody>
          </table>
          <div class="pager d-flex justify-content-between">
            <span id="page-num" class=" text-light">Hal : 1 dari 1</span>
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


<script src="/Assets/js/jquery.min.js"></script>
<script>
$(function() {
    var currentPage = 0;
    var numPerPage = 5; // maks data per hal
    var $table = $('table');

    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });

    $table.trigger('repaginate');

    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);

    $('.pager .btn-light').eq(0).bind('click', function() {
    if (currentPage !== 0) {
        currentPage--;
        $('#page-num').text('Hal : ' + (currentPage + 1) + ' dari ' + numPages);
        $table.trigger('repaginate');
    }
});

$('.pager .btn-light').eq(1).bind('click', function() {
    if (currentPage < numPages - 1) {
        currentPage++;
        $('#page-num').text('Hal : ' + (currentPage + 1) + ' dari ' + numPages);
        $table.trigger('repaginate');
    }
});
});
</script>