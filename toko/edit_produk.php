<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require '../admin/config/function.php';
$nama = $_SESSION['nama_store'];
$title = "$nama - Edit Produk";

$id = $_SESSION['id_store'];
$product = $_GET['id'];
$produk = query("SELECT master_product.nama_product, product_store.harga_product, product_store.id_product FROM product_store JOIN master_product ON master_product.id_master_product=product_store.id_master_product WHERE id_store='$id' AND id_product = $product");
if (isset($_POST['submit'])) {
    // cek data berhasil ditambahkan
    if (editProduk($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah!');
        </script>";
        header('Location: data_produk.php');
    } else {
        echo "<script>
        alert('Data gagal diubah!');
    </script>";
        header('Location: edit_produk.php');
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
                            <?php foreach ($produk as $produk) { ?>


                                <form action="" method="post">
                                    <input type="hidden" name="id_product" value="<?= $produk['id_product'] ?>">

                                    <div class="form-group">
                                        <label for="nama_product">Nama Produk</label>
                                        <input type="text" class="form-control" name="nama_product" placeholder="Masukkan Nama Produk" id="nama_product" value="<?= $produk['nama_product'] ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="harga_product">Harga Produk</label>
                                        <input type="text" class="form-control" name="harga_product" placeholder="Masukkan harga" id="harga_product" value="<?= $produk['harga_product'] ?>">
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                                </form>
                            <?php } ?>
                        </div>
                    </div>

                </div>


                <?php require_once 'templates/footer.php'; ?>