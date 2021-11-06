<?php
require_once '../admin/config/function.php';
$id = $_GET['id'];

if (konfirmasi_donasi($id)) {
    echo "<script>alert('Data Berhasil dikonfirmasi!')</script>";
    header('Location: donasi_selesai.php');
} else {
    echo "<script>alert('Data Gagal dikonfirmasi!')</script>";
    header('Location: donasi_berjalan.php');
}
