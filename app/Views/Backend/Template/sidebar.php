

<div class="container-fluid ">
    <div class="row">
      <div class="col-md-2 " style="background-color: #20B2AA; min-height: 100vh;">
          <ul class="list-group">
            <li class="list-group-item <?php if($asal=='main') {echo 'active';}?>" style="color: #808080;" aria-current="true"><a href="/admin/main" class="d-flex justify-content-between bi-house  align-items-center text-decoration-none text-black">Beranda <i class="">     </i></a>
            <li class="list-group-item <?php if($asal=='form') {echo 'active';}?>" style="color: #808080;" aria-current="true"><a href="/admin/form" class="d-flex justify-content-between bi-person-add  align-items-center text-decoration-none text-black"> Pendaftaran <i class=""></i></a></li>
            <li class="list-group-item <?php if($asal=='simpanan') {echo 'active';}?>">
                <a class="d-flex justify-content-between bi-piggy-bank align-items-center text-decoration-none text-black" data-bs-toggle="collapse" href="#collapseSimpanan" role="button" aria-expanded="false" aria-controls="collapseExample">Simpanan
                <i class="bi bi-chevron-down"></i>
                </a>
              <div class="collapse" id="collapseSimpanan">
              <ul class="list-group">
                <li class="list-group-item"><a href="/admin/simpanan_aktif" class="text-decoration-none text-black" style="font-size: 0.875rem;">Anggota Aktif</a></li>
                <li class="list-group-item"><a href="/admin/simpanan_t_aktif" class="text-decoration-none text-black" style="font-size: 0.875rem;">Anggota Tidak Aktif</a></li>
                <li class="list-group-item"><a href="/admin/simpanan_pokok" class="text-decoration-none text-black" style="font-size: 0.875rem;">Simpanan Pokok</a></li>
                <li class="list-group-item"><a href="/admin/simpanan_sukarela" class="text-decoration-none text-black" style="font-size: 0.875rem;">Simpanan Sukarela</a></li>
              </ul>
              </div>
            </li>
            <li class="list-group-item  <?php if($asal=='pinjaman') {echo 'active';}?>">
                <a class="d-flex justify-content-between bi-cash align-items-center text-decoration-none text-black" data-bs-toggle="collapse" href="#collapsePinjaman" role="button" aria-expanded="false" aria-controls="collapseExample">Pinjaman
                <i class="bi bi-chevron-down"></i>
                </a>
              <div class="collapse" id="collapsePinjaman">
              <ul class="list-group">
                <li class="list-group-item"><a href="/admin/pinjaman_l" class="text-decoration-none text-black" style="font-size: 0.875rem;">Anggota Lunas</a></li>
                <li class="list-group-item"><a href="/admin/pinjaman_bel" class="text-decoration-none text-black" style="font-size: 0.875rem;">Anggota Belum Lunas</a></li>
                <li class="list-group-item"><a href="/admin/angsuran" class="text-decoration-none text-black" style="font-size: 0.875rem;">Angsuran</a></li>
              </ul>
              </div>
            </li>
            <li class="list-group-item <?php if($asal=='pengaturan') {echo 'active';}?>" style="color: #808080;" aria-current="true"><a href="/admin/pengaturan" class="d-flex justify-content-between bi-gear  align-items-center text-decoration-none text-black"> Pengaturan <i class=""></i></a></li>



      </div>
    
    
