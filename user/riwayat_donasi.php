<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require 'templates/header.php';
require "../admin/config/function.php";
$id = $_SESSION["id_user"];

$sql = "SELECT * FROM donatur WHERE id_user ='$id'";

$donatur = show($sql);



?>
<div class="container">
    <div class="row">
        <?php
        foreach ($donatur  as $don) {
        ?>
            <div class="col">
                <div class="card mt-5" style="width: 18rem;">
                    <div class="card-header text-muted text-right">
                        <?= date(
                            'd-M-Y',
                            strtotime($don['create_donatur'])
                        ) ?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group mb-1 p-2">Jenis Donasi : <?= $don['jenis_donasi'] ?></li>
                        <li class="list-group mb-1 p-2">Jumlah Donasi : <?= $don['jumlah_donasi']; ?></li>
                        <li class="list-group mb-1 p-2 ml-auto"><?= ($don['status'] == 'Belum') ?   "<span class='badge badge-pill badge-primary'>Sedang di Proses</span>" : "<span class='badge badge-pill badge-success'>Sukses</span>" ?></li>
                    </ul>
                </div>
            </div>
        <?php
            // if ($don['no_kurir']) {
            //     echo $don['no_kurir'];
            // } else {
            //     echo " -";
            // }
        } ?>
    </div>
</div>
<?php
require 'templates/footer.php'; ?>