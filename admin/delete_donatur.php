<?php
require_once '../admin/config/function.php';
$id = $_GET['id'];

if (delete_donatur($id)) {
    echo "<script>alert('Data Berhasil dihapus!')</script>";
    header('Location: donasi_selesai.php');
} else {
    echo "<script>alert('Data Gagal dihapus!')</script>";
    header('Location: donasi_selesai.php');
}
