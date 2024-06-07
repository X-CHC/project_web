


</body>
<script src="/Assets/js/bootstrap.bundle.min.js"></script>
<script src="/Assets/js/up_down_listgroup.js"></script>
<script src="/Assets/js/jquery.min.js"></script>
<script src="/Assets/js/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</hmtl>

<script>
    //script opsi form jenis anggota
  $(document).ready(function(){
    $('#jenisAnggota').change(function(){
      if($(this).val() == 'P') {
        $('#tipePinjamanLabel').show();
        $('#totalPinjamanLabel, #totalPinjaman').show();   
      } else {
        $('#tipePinjamanLabel').hide();
        $('#totalPinjamanLabel, #totalPinjaman').hide();
      }
    });
  });
  </script>
  <script>
    document.getElementById('totalPinjaman').addEventListener('input', function (e) {
      var max = 3000000; // maks pinjaman
      var value = parseInt(e.target.value);
  
      if (value > max) {
        e.target.value = max;
        alert('Total pinjaman tidak boleh lebih dari Rp3.000.000');
        }
      });

  </script>
  <style>
  .my-swal {
    font-size: 0.7em !important; 
    width: 500px !important; 
    height: 180px !important; 
  }
  </style>
  
  <script>
    //script form anggota
  let hasil = '<?= session()->getFlashdata('hasil') ?>';
            if (hasil == 'Berhasil') {
              Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Anggota Telah Tersimpan',
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            popup: 'my-swal'
                        }
                    });
                } else if (hasil == 'gak_jelas') {
                  Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Data Anggota Tidak Valid',
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            popup: 'my-swal'
                        }
                    });
                }  else if (hasil == 'Masuk') {
                  Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Admin Telah Tersimpan',
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            popup: 'my-swal'
                        }
                    });
                }else if (hasil == 'gagal_admin') {
                  Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Data Admin Tidak Valid',
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            popup: 'my-swal'
                        }
                    });
                }
                
                
                
  </script>




<script>
    //script tabel 
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


<script >
  // alert logout
  document.getElementById('logoutButton').addEventListener('click', function(event) {
    event.preventDefault();

    Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    }).fire({
      title: "Konfirmasi",
      text: "Apakah Anda yakin ingin keluar dari website koperasi ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Ya, saya yakin",
      cancelButtonText: "Tidak, batalkan",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/admin/logout';
        }
    });
});

</script>

<style>
  /* dekor form */
  .form-label {
    background-color: #80CBC4; /* colors border*/
    width: 100%;
    padding: .100rem .75rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529; /* Teks colors */
    border-radius: 100px; /* ukuran */
}

</style>