<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require "../admin/config/function.php";

if (isset($_POST['submit'])) {
    // cek data berhasil ditambahkan
    if (addDonasi($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            </script>";
        header('Location: riwayat_donasi.php');
    } else {
        echo "<script>
            alert('Data Gagal ditambahkan!');
            </script>";
        header('Location: donasi.php');
    }
}


if (!$username) {
    header("Location: login.php");
}
require 'templates/header.php';
?>
<div class="container">
    <div class="card mt-5">
        <h5 class="card-header">Form Donasi</h5>
        <div class="card-body">
            <p class="alert alert-info">Isilah data-data berikut untuk melakukan transaksi donasi</p>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">

                    <label for="jenis_donasi">Jenis Donasi : &nbsp; &nbsp;</label>

                    <input type="radio" name="jenis_donasi" id="jenis_donasi" value="Tunai"> Uang Tunai
                    <input type="radio" name="jenis_donasi" id="jenis_donasi" value="Alquran"> Alquran
                </div>

                <div class="form-group">
                    <label for="jumlah_donasi">Jumlah Donasi</label>
                    <input type="text" class="form-control" placeholder="Masukkan jumlah" name="jumlah_donasi" id="jumlah_donasi" class="form-control">
                </div>

                <div class="form-group">
                    <label for="jumlah_donasi">Upload bukti transfer :</label>
                    <input type="file" name="image_bukti" id="image_bukti" class="form-control-file">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
            </form>
            <p class="alert alert-info mt-3">
                Silahkan melakukan pembayaran ke Bank AlifLaamMim <br />
                No. Rekening : <strong>000-1111-2222-334567 (A/N Annas Usbah)</strong><br />
                Setelah melakukan transfer uang, mohon untuk konfirmasi ke no. 08570011223344
            </p>

        </div>
    </div>
</div>
<?php
require 'templates/footer.php'; ?>