<?php

require '../admin/config/function.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user  WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) == 0) {
        echo '<script>alert("Welcome")</script>';
        header('Location: login.php');
    } else {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $row['username'];
        header('Location: index.php');
    }
}
