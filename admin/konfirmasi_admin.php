<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require 'config/function.php';

$id = $_GET['id'];
$transaksi = query(
    "SELECT id_transaksi, no_kurir FROM transaksi WHERE id_transaksi = $id"
);

if (isset($_POST['submit'])) {
    // cek data berhasil ditambahkan
    if (ConfirmTransaction($_POST) > 0) {
        echo "<script>
                                            alert('Data berhasil ditambahkan!');
                                        </script>";
        header('Location: transaksi_selesai.php');
    } else {
        echo "<script>
                                        alert('Data gagal ditambahkan!');
                                    </script>";
        header('Location: konfirmasi_admin.php');
    }
}

$title = 'SB Admin 2 - Konfirmasi ';
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
                            <h6 class="m-0 font-weight-bold text-primary">Form Konfirmasi Admin</h6>
                        </div>
                                <div class="card-body">
                                    <?php foreach ($transaksi as $t) { ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_transaksi" value="<?= $t[
                                            'id_transaksi'
                                        ] ?>">

                                        <div class="form-group">
                                            <label for="no_kurir">No Kurir</label>
                                            <input type="number" class="form-control" name="no_kurir" width="100%" placeholder="Masukkan Nomor Kurir" id="no_kurir"value="<?= $t[
                                                'no_kurir'
                                            ] ?>"required>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                                    </form>
                                    <?php } ?>
                                </div>
                            </div>

                </div>

                <!-- /.container-fluid -->

<?php require_once 'templates/footer.php'; ?>
