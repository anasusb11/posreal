<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require_once '../admin/config/function.php';
$nama = $_SESSION['nama_store'];
$title = "$nama - Profil Toko";
$id = $_SESSION['id_store'];

$sql = "SELECT * FROM store WHERE id_store ='$id'";

$profil = show($sql);
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Profil Toko</h6>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-warning btn-sm float-right" href="edit_profil.php">Edit Profile</a>
                            <?php foreach ($profil as $key => $value) : ?>
                                <table class="table table-striped justify-content-center">
                                    <tr>
                                        <div class="text-center"><img src="img/<?= $value['img_store'] ?>" alt="">
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><?= $value['username'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Nama Toko</td>
                                        <td>:</td>
                                        <td><?= $value['nama_store'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $value['alamat_store'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td><?= $value['tentang_store'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kontak Toko</td>
                                        <td>:</td>
                                        <td><?= $value['contact_store'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Buat</td>
                                        <td>:</td>
                                        <td><?= date(
                                                'd-M-Y',
                                                strtotime($value['create_store'])
                                            ) ?></td>
                                    </tr>
                        </div>
                    <?php endforeach; ?>
                    </table>
                    </div>
                </div>

            </div>

            <!-- /.container-fluid -->

            <?php require_once 'templates/footer.php'; ?>