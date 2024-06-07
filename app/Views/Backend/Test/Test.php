<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .swal2-popup {
      font-size: 1rem !important;
    }
  </style>
</head>
<body>
  <button id="myButton" class="btn btn-primary">Klik Saya</button>

</body>



<script>
    document.getElementById('myButton').addEventListener('click', function() {
      Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'success',
        confirmButtonText: 'Dukpatingting joss'
      });
    });
  </script>