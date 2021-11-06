<?php
require_once '../admin/config/function.php';
$id = $_GET['id'];

if (ConfirmStore($id)) {
    echo "<script>alert('Data Berhasil dikonfirmasi!')</script>";
    header('Location: transaksi_selesai.php');
} else {
    echo "<script>alert('Data Gagal dikonfirmasi!')</script>";
    header('Location: transaksi_berjalan.php');
}
