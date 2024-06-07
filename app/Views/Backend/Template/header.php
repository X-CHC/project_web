<?php
if(session()->get('ses_id') == "" or session()->get('ses_user') == "" or session()->get('ses_level') == "" ){
  ?>
  <script>
    alert("login expired, silahkan login ulang");
    document.location = "<?= base_url('admin/login');?>";
  </script>
<?php
}
?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Koperasi Simpan Pinjam</title>

<link rel="stylesheet" type="css" href="/Assets/css/all_manual.css">
<link href="/Assets/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="/Assets/font/bootstrap-icons.css">
<link href="/Assets/css/sweetalert2.min.css" rel="stylesheet">





<nav class="navbar sticky-top navbar-expand-lg " style="background-color: #20B2AA;">
  
  <div class="container-fluid">
  <a class="navbar-brand bi-bank" href="/admin/main" style="color: #D3D3D3;"> KOPERASI DEADLINER</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      <ul class="navbar-nav ms-auto me-5  ">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle bi-person " style="color: #D3D3D3;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">
              <img src="/Assets/img/profil.jpg" alt="bonk" class="img-thumbnail rounded-circle" style="width: 50px; height: 50px;">
              <h10 class="d-inline ms-2 text-dark-emphasis"><?= session()->get('ses_user'); ?></h10>
            </li>
              <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url('/admin/setting')?>">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url('admin/logout');?>" id="logoutButton">Logout</a></li>
          </ul>
        </li>
        
      </ul>
      
    
  </div>
</nav>
<style>
.swal2-styled.swal2-cancel {
  margin-left: 100px !important; /* Mengubah jarak antara tombol */
}
</style>

</head>

<body>
