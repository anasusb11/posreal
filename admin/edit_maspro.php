<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require 'config/function.php';
$title = 'SB Admin 2 - Form Edit Produk';

$id = $_GET['id'];
$maspro = query("SELECT * FROM master_product WHERE id_master_product = $id");

if (isset($_POST['submit'])) {
    // cek data berhasil ditambahkan
    if (editMasterProduct($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah!');
        </script>";
        header('Location: master_produk.php');
    } else {
        echo "<script>
        alert('Data gagal diubah!');
    </script>";
        header('Location: edit_maspro.php');
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

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once 'templates/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php require_once 'templates/navbar.php'; ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Master Produk</h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($maspro as $mp) { ?>


                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_master_product" value="<?= $mp['id_master_product'] ?>">
                                    <input type="hidden" name="oldPhoto" value="<?= $mp['img_product'] ?>">

                                    <div class="form-group">
                                        <label for="img_product">Gambar Produk</label>
                                        <input type="file" class="form-control-file" name="img_product" id="img_product"> <img src="../toko/img/<?= $mp['img_product'] ?>" alt="img produk" width="200px" height="200px">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_product">Nama Produk</label>
                                        <input type="text" class="form-control" name="nama_product" placeholder="Masukkan Nama Produk" id="nama_product" value="<?= $mp['nama_product'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit" id="penerbit" value="<?= $mp['penerbit'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="ukuran">Ukuran</label>
                                        <input type="text" class="form-control" name="ukuran" width="100%" placeholder="Masukkan Ukuran" id="ukuran" value="<?= $mp['ukuran'] ?>">
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                                </form>
                            <?php } ?>
                        </div>
                    </div>

                </div>


                <?php require_once 'templates/footer.php'; ?>