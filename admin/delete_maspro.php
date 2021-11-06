<?php
require_once '../admin/config/function.php';
$id = $_GET['id'];

if (delete_maspro($id)) {
    echo "<script>alert('Data Berhasil dihapus!')</script>";
    header('Location: master_produk.php');
} else {
    echo "<script>alert('Data Gagal dihapus!')</script>";
    header('Location: master_produk.php');
}
