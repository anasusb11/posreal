<?php
require_once '../admin/config/function.php';
$id = $_GET['id'];

if (delete_user($id)) {
    echo "<script>alert('Data Berhasil dihapus!')</script>";
    header('Location: data_user.php');
} else {
    echo "<script>alert('Data Gagal dihapus!')</script>";
    header('Location: data_user.php');
}
