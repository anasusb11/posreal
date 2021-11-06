<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if ($username) {
    header("Location: index.php");
}

require "../admin/config/function.php";


if (isset($_POST['submit'])) {
    // cek data berhasil ditambahkan
    if (addToko($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            </script>";
        header('Location: login.php');
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            </script>";
        header('Location: register.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AdminToko - Register</title>

    <!-- Custom fonts for this template-->
    <link href="sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat akun toko!</h1>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="img_store">Logo</label>
                                    <input type="file" name="img_store" id="img_store" class="form-control-file">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Masukkan Username">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="nama_store">Nama Toko</label>
                                        <input type="text" class="form-control form-control-user" name="nama_store" id="nama_store" placeholder="Masukkan Nama Toko">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_store">Alamat</label>
                                    <textarea name="alamat_store" id="alamat_store" class="form-control" cols="30" rows="3" placeholder="Masukkan Alamat Toko"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tentang_store">Deskripsi Toko</label>
                                    <textarea name="tentang_store" id="tentang_store" class="form-control" cols="30" rows="7" placeholder="Masukkan Deskripsi Toko"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="contact_store">Kontak Toko</label>
                                    <input type="number" class="form-control form-control-user" name="contact_store" id="contact_store" placeholder="Masukkan Kontak Toko">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="password2">Konfirmasi Password</label>
                                        <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sbadmin/js/sb-admin-2.min.js"></script>

</body>

</html>