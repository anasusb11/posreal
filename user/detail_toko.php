<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require 'templates/header.php';
require "../admin/config/function.php";
$id = $_GET['id'];

$sql = "SELECT * FROM store WHERE id_store ='$id'";

$stores = show($sql);

?>
<div class="container">
    <div class="row mt-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Detail Toko</h6>
            </div>
            <div class="card-body">
                <?php foreach ($stores as $key => $value) : ?>
                    <table class="table table-striped justify-content-center">
                        <tr>
                            <div class="text-center"><img src="../toko/img/<?= $value['img_store'] ?>" alt="logo">
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
<?php
require 'templates/footer.php'; ?>