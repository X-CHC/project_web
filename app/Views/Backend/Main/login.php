<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="/Assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Assets/font/bootstrap-icons.css">

</head>
<body  style="background-color: #ebe39a ;  " >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5 bg-transparent text-dark" >
                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><i class="bi bi-person-fill"></i> Login</h3></div>
                    <div class="card-body">
                        <form role="form" method="post" action="<?= base_url('admin/autentikasi');?>" id="loginForm">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="username" name="username" />
                                <label for="inputUsename">Username</label>
                            </div>
                            <div class="form-floating mb-3" >
                                <input class="form-control"  type="password" placeholder="Password" name="password" />
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Loading',
            didOpen: () => {
            Swal.showLoading()
            }
        });

        setTimeout(() => {
            this.submit();
        }, 0);
    });
    </script>
    <script>let hasil = '<?= session()->getFlashdata('hasil') ?>';
        if (hasil) {
            let title, text, icon, url;
            if (hasil == 'Berhasil') {
                title = 'Login successful!';
                text = 'Selamat Datang ';
                icon = 'success';
            } else {
                title = 'Login failed!';
                text = 'Silahkan cek kembali Username dan password anda';
                icon = 'error';
            }
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                confirmButtonText: 'ok'
            }).then(() => {
                if (hasil == 'Berhasil') {
                    window.location.href = '/admin/main';
                } 
            });
        }
    </script>
</body>
</html>
