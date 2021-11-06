<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require 'templates/header.php';
require "../admin/config/function.php";
$sql = "SELECT * FROM store";
$stores = show($sql);

?>
<div class="container">
    <div class="row">
        <?php
        foreach ($stores as $store) {
        ?>
            <div class="col">
                <div class="card mt-5" style="width: 18rem;">
                    <img src="../toko/img/<?= $store["img_store"]; ?>" class="card-img-top" height="200px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $store["nama_store"]; ?></h5>
                        <p class="card-text"><?= $store["alamat_store"]; ?></p>
                        <a href="detail_toko.php?id=<?= $store["id_store"]; ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
require 'templates/footer.php'; ?>