<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require_once '../admin/config/function.php';

$resultStores = mysqli_query($conn, 'SELECT * FROM store');
$store = mysqli_num_rows($resultStores);
$resultUser = mysqli_query($conn, 'SELECT * FROM user');
$user = mysqli_num_rows($resultUser);
$id = $_SESSION['id_store'];
require_once '../admin/config/function.php';
$resultproduk = mysqli_query(
    $conn,
    "SELECT * FROM product_store WHERE id_store='$id'"
);
$produk = mysqli_num_rows($resultproduk);

$resultTransaksiBerjalan = mysqli_query(
    $conn,
    "SELECT * FROM transaksi WHERE konfirmasi_toko='belum' AND id_store='$id'"
);
$transaksiBerjalan = mysqli_num_rows($resultTransaksiBerjalan);

$resultTransaksiSelesai = mysqli_query(
    $conn,
    "SELECT * FROM transaksi WHERE konfirmasi_admin='Ya' AND konfirmasi_toko='Ya' AND id_store='$id'"
);
$transaksiSelesai = mysqli_num_rows($resultTransaksiSelesai);
$nama = $_SESSION['nama_store'];
$title = "$nama - Dashboard";
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Produk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $produk ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Transaksi Berjalan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transaksiBerjalan ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Transaksi Selesai </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transaksiSelesai ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <?php require_once 'templates/footer.php'; ?>