<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require_once 'config/function.php';
$title = 'SB Admin 2 - Data Toko';

$sql = 'SELECT * FROM store';

$stores = show($sql);
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
                    <h1 class="h3 mb-4 text-gray-800">Data Toko</h1>                            <!-- Default Card Example -->
                            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Toko</h6>
                        </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Nama Toko</th>
                                            <th>Alamat</th>
                                            <th>Kontak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($stores as $key => $value): ?>
                                    <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['username'] ?></td>
                                    <td><?= $value['nama_store'] ?></td>
                                    <td><?= $value['alamat_store'] ?></td>
                                    <td><?= $value['contact_store'] ?></td>
                                    <td><a class="btn btn-warning btn-sm" href="detail_toko.php?id=<?= $value[
                                        'id_store'
                                    ] ?>">Detail</a> | <a class="btn btn-danger btn-sm" href="delete_toko.php?id=<?= $value[
    'id_store'
] ?>" onclick="return confirm('Are you sure delete?')">Delete</a></td>
                                    </tr>
                                    <?php endforeach;
                                    ?> 
                                    </tbody>
                                </table>
                            </div>
                                </div>
                            </div>

                </div>

                <!-- /.container-fluid -->

<?php require_once 'templates/footer.php'; ?>
