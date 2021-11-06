<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if ($username) {
    header("Location: index.php");
}
require "../admin/config/function.php";


if (isset($_POST['submit'])) {
    // cek data berhasil ditambahkan
    if (addUser($_POST) > 0) {
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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>POSREAL - Register</title>
</head>

<body>
    <div class="container">
        <div class="card shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap..">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat..." cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor HP">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control" name="password1" id="password1" placeholder="Masukkan Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-block">
                                    Register Account
                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Forgot Password?</a>
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
    <?php
    require 'templates/footer.php'; ?>