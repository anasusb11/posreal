<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require "../admin/config/function.php";

if (isset($_POST['submit'])) {
    // cek data berhasil ditambahkan
    if (addTransaksi($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            </script>";
        header('Location: transaksi.php');
    } else {
        echo "anuu";
        // header('Location: replace1.php');
    }
}

if (!$username) {
    header("Location: login.php");
}
require 'templates/header.php';
?>
<div class="container">
    <div class="card mt-5">
        <h5 class="card-header">Form Transaksi Penukaran al-Quran</h5>
        <div class="card-body">
            <p class="alert alert-info"><strong>FORM 2.</strong> Isilah data-data berikut untuk melakukan transaksi replace Al-Quran</p>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= $_POST['id_user']; ?>">
                <input type="hidden" name="id_store" value="<?= $_POST['id_store']; ?>">
                <input type="hidden" name="alamat" value="<?= $_POST['alamat']; ?>">
                <div class="form-group">
                    <?php
                    $id = $_POST['id_store'];
                    $sql = "SELECT product_store.id_product, store.id_store, master_product.nama_product FROM product_store 
                    JOIN master_product ON master_product.id_master_product = product_store.id_master_product 
                    JOIN store ON store.id_store = product_store.id_store 
                    WHERE store.id_store='$id'";
                    $stores = show($sql);
                    ?>
                    <label for="id_product">Pilih Produk</label>

                    <select name="id_product" id="id_product" class="form-control">
                        <?php
                        foreach ($stores as $key => $store) { ?>
                            <option value="<?= $store['id_product']; ?>"><?= $store['nama_product']; ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="jumlah_barang">Jumlah barang</label>
                    <input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang">
                </div>
                <div class="form-group">
                    <label for="image_bukti">Foto Quran Bekas</label>
                    <input type="file" class="form-control-file" name="image_bukti" id="image_bukti">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>
<?php
require 'templates/footer.php'; ?>