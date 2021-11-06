<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require 'templates/header.php';
require "../admin/config/function.php";
$id = $_SESSION["id_user"];
$sql = "SELECT *, user.nama, store.nama_store FROM transaksi 
JOIN user ON user.id_user = transaksi.id_user
JOIN store ON store.id_store = transaksi.id_store 
WHERE user.id_user = $id";

$transaksi = show($sql);



?>
<div class="container">
    <div class="row">
        <?php
        foreach ($transaksi  as $trans) {
        ?>
            <div class="col">
                <div class="card mt-5" style="width: 18rem;">
                    <div class="card-header text-muted text-right">
                        <?= date(
                            'd-M-Y',
                            strtotime($trans['create_transaksi'])
                        ) ?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group mb-1 p-2">Nama Toko : <?= $trans['nama_store'] ?></li>
                        <li class="list-group mb-1 p-2">Jumlah Barang : <?= $trans['jumlah_barang']; ?></li>
                        <li class="list-group mb-1 p-2">No. Kurir : <?= ($trans['no_kurir']) ?   $trans['no_kurir'] : '-' ?></li>
                        <?= ($trans['no_kurir']) ?  "<li class='list-group mb-1 p-2'><a href='cetak_struk.php?id=$trans[id_transaksi]' class='btn btn-primary' target='_blank'><i class='fa fa-print'></i> Print</a></li>" : false ?>
                    </ul>
                </div>
            </div>
        <?php
            // if ($trans['no_kurir']) {
            //     echo $trans['no_kurir'];
            // } else {
            //     echo " -";
            // }
        } ?>
    </div>
</div>
<?php
require 'templates/footer.php'; ?>