<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require "../admin/config/function.php";

require 'templates/header.php';
?>
<div class="container">
    <div class="card mt-5">
        <h5 class="card-header">Form Transaksi Penukaran al-Quran</h5>
        <div class="card-body">
            <p class="alert alert-info"><strong>FORM 1.</strong> Isilah data-data berikut untuk melakukan transaksi replace Al-Quran</p>
            <form action="replace2.php" method="post">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" cols="10" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <?php

                    $sql = "SELECT id_store, nama_store FROM store";
                    $stores = show($sql);
                    ?>
                    <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">

                    <label for="id_store">Toko yang Dituju</label>

                    <select name="id_store" id="id_store" class="form-control">
                        <?php
                        foreach ($stores as $key => $store) { ?>
                            <option value="<?= $store['id_store']; ?>"><?= $store['nama_store']; ?></option>
                        <?php } ?>
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Selanjutnya</button>
            </form>
        </div>
    </div>
</div>
<?php
require 'templates/footer.php'; ?>