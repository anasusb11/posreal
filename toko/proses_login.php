<?php

require_once '../admin/config/function.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM store  WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        header('Location: login.php');
    } else {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['id_store'] = $row['id_store'];
        $_SESSION['nama_store'] = $row['nama_store'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['img_store'] = $row['img_store'];
        header('Location: index.php');
    }
}
