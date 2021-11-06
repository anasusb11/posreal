<?php

require_once 'config/function.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin  WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        "<script>alert('Username dan password yang kamu masukkan salah!')</script>";
        header('Location: login.php');
    } else {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['username'] = $row['username'];
        header('Location: index.php');
    }
}
