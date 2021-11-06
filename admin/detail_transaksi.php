<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require_once '../admin/config/function.php';
$title = 'SB Admin 2 - Detail Toko';
$id = $_GET['id'];

$sql = "SELECT *, user.nama FROM transaksi JOIN user ON user.id_user = transaksi.id_user WHERE id_transaksi ='$id'";

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                            <h6 class="m-0 font-weight-bold text-primary">Detail Toko</h6>
                        </div>
                                <div class="card-body">
<?php foreach ($profil as $key => $value): ?>
                                    <table class="table table-striped justify-content-center">
                                        <tr>
                                    <div class="text-center">
                                    <td>Id Transaksi</td>
                                    <td>:</td>
                                    <td><?= $value['id_transaksi'] ?></td>
                                    </tr>

                                    <tr>
                                    <td>Nama Pemesan</td>
                                    <td>:</td>
                                    <td><?= $value['nama'] ?></td>
                                    </tr>
                                    <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $value['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                    <td>No Kurir</td>
                                    <td>:</td>
                                    <td><?= $value['no_kurir'] ?></td>
                                    </tr>
                                    <tr>
                                    <td>Tanggal Buat</td>
                                    <td>:</td>
                                    <td><?= date(
                                        'd-M-Y',
                                        strtotime($value['create_transaksi'])
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
