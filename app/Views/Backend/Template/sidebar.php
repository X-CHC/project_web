

<div class="container-fluid ">
    <div class="row">
      <div class="col-md-2 " style="background-color: #20B2AA; min-height: 100vh;">
          <ul class="list-group">
            <li class="list-group-item bi-house <?php if($asal=='main') {echo 'active';}?>" style="color: #808080;" aria-current="true"><a href="/admin/main" class="text-decoration-none text-black"> Beranda</a></li>
            <li class="list-group-item bi-person-add <?php if($asal=='form') {echo 'active';}?>" style="color: #808080;" aria-current="true"><a href="/admin/form" class="text-decoration-none text-black"> Pendaftaran</a></li>
            <li class="list-group-item bi-people <?php if($asal=='anggota') {echo 'active';}elseif ($asal==="d_anggota"){echo "active";}?>" style="color: #808080;" aria-current="true"><a href="/admin/anggota" class="text-decoration-none text-black"> Anggota</a></li>
            <li class="list-group-item bi-piggy-bank <?php if($asal=='simpanan') {echo 'active';}?>" style="color: #808080;" aria-current="true"><a href="/admin/simpanan" class="text-decoration-none text-black"> Simpanan</a></li>
            <li class="list-group-item bi-cash <?php if($asal=='pinjaman') {echo 'active';}?>" style="color: #808080;" aria-current="true"><a href="/admin/pinjaman" class="text-decoration-none text-black"> Pinjaman</a></li>
            <li class="list-group-item bi-cash-coin <?php if($asal=='angsuran') {echo 'active';}?>" style="color: #808080;" aria-current="true"><a href="/admin/angsuran" class="text-decoration-none text-black"> Angsuran</a></li>
            <li class="list-group-item bi-cash-stack <?php if($asal=='pembayaran') {echo 'active';}?>" style="color: #808080;" aria-current="true"><a href="/admin/pembayaran" class="text-decoration-none text-black"> Pembayaran</a></li>
              


      </div>
    
    
