<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require '../admin/config/function.php';
$nama = $_SESSION['nama_store'];
$title = "$nama - Edit Profil Toko";

$id = $_SESSION['id_store'];
$stores = query("SELECT * FROM store WHERE id_store = '$id'");
if (isset($_POST['submit'])) {
    // cek data berhasil ditambahkan
    if (editStore($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah!');
        </script>";
        header('Location: data_profil.php');
    } else {
        echo "<script>
        alert('Data gagal diubah!');
    </script>";
        header('Location: edit_profil.php');
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
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Profile</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            foreach ($stores as $store) { ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_store" value="<?= $store['id_store'] ?>">
                                    <input type="hidden" name="oldLogo" value="<?= $store['img_store'] ?>">

                                    <div class="form-group">
                                        <label for="img_store">Logo Toko</label>
                                        <br>
                                        <img src="img/<?= $store['img_store']; ?>" alt="" width="100" height="100">
                                        <input type="file" class="form-control-file" name="img_store" id="img_store">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" id="username" value="<?php echo $store['username']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="penerbit">Nama Toko</label>
                                        <input type="text" class="form-control" name="nama_store" placeholder="Masukkan Nama Toko" id="nama_store" value="<?= $store['nama_store'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_store">Alamat Toko</label>
                                        <textarea class="form-control" placeholder="Masukkan Alamat" id="alamat_store" name="alamat_store"><?= $store['alamat_store'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="tentang_store">Deskripsi Toko</label>
                                        <textarea class="form-control" placeholder="Masukkan Deskripsi" id="tentang_store" name="tentang_store"><?= $store['tentang_store'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_store">Kontak Toko</label>
                                        <input type="text" class="form-control" name="contact_store" placeholder="Masukkan Kontak Toko" id="contact_store" value="<?= $store['contact_store'] ?>">
                                    </div>


                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                                </form>
                            <?php }
                            ?>
                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->

                <?php require_once 'templates/footer.php'; ?>