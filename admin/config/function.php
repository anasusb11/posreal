<?php

$localhost = 'localhost';
$username = 'root';
$password = '';
$database = 'db_posreal';

($conn = mysqli_connect($localhost, $username, $password, $database)) or
    die(mysqli_error($conn));

function query($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function show($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function addUser($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $username = htmlspecialchars($data['username']);
    $password1 = htmlspecialchars($data['password1']);
    $password2 = htmlspecialchars($data['password2']);

    if ($password1 != $password2) {
        echo "<script>alert('Kata sandi tidak cocok')</script>";
    } else {
        // query insert
        $query = "INSERT INTO user VALUES ('','$nama','$alamat','$email', '$no_hp', '$username', '$password1', current_timestamp())";
        // var_dump($query);
        // exit;
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
}
function addToko($data)
{
    global $conn;
    $username = htmlspecialchars($data['username']);
    $nama_store = htmlspecialchars($data['nama_store']);
    $alamat_store = htmlspecialchars($data['alamat_store']);
    $tentang_store = htmlspecialchars($data['tentang_store']);
    $contact_store = htmlspecialchars($data['contact_store']);
    $password1 = htmlspecialchars($data['password1']);
    $password2 = htmlspecialchars($data['password2']);
    $img_store = uploadLogo();

    // milih gambar baru opo gak

    if ($password1 != $password2) {
        echo "<script>alert('Kata sandi tidak cocok')</script>";
    } else {
        // query insert
        $query = "INSERT INTO store VALUES ('', '$username' ,'$nama_store','$alamat_store','$tentang_store', '$contact_store', '$img_store', '$password1', current_timestamp())";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
}

function addMasterProduct($data)
{
    global $conn;
    $nama_product = htmlspecialchars($data['nama_product']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $ukuran = htmlspecialchars($data['ukuran']);
    $img_product = upload();

    if (!$img_product) {
        return false; // query insert tidak dijalankan
    }

    // query insert
    $query = "INSERT INTO master_product VALUES ('','$nama_product','$penerbit','$ukuran','$img_product')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ConfirmTransaction($data)
{
    global $conn;
    $id = $data['id_transaksi'];
    $no_kurir = htmlspecialchars($data['no_kurir']);

    // query update
    $query = "UPDATE transaksi SET no_kurir='$no_kurir', konfirmasi_admin='Ya' WHERE id_transaksi=$id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ConfirmStore($id)
{
    global $conn;

    // query update
    $query = "UPDATE transaksi SET konfirmasi_toko='Ya', status='Ya' WHERE id_transaksi=$id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editMasterProduct($data)
{
    global $conn;
    $id = $data['id_master_product'];
    $nama_product = htmlspecialchars($data['nama_product']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $ukuran = htmlspecialchars($data['ukuran']);
    $oldPhoto = htmlspecialchars($data['oldPhoto']);

    // milih gambar baru opo gak

    if ($_FILES['img_product']['error'] === 4) {
        $img_product = $oldPhoto;
    } else {
        $img_product = upload();
    }

    // query update
    $query = "UPDATE master_product SET nama_product='$nama_product', penerbit='$penerbit',ukuran='$ukuran',img_product='$img_product' WHERE id_master_product = $id";
    // var_dump($query);
    // exit();
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $nameFile = $_FILES['img_product']['name'];
    $sizeFile = $_FILES['img_product']['size'];
    $errorFile = $_FILES['img_product']['error'];
    $tmpFile = $_FILES['img_product']['tmp_name'];

    //cek apakah tidak ada gambar yg di upload

    if ($errorFile === 4) {
        echo "<script>
        alert('Please select an image first');
        </script>";
        return false;
    }

    // Valid File Extension
    $ValidFileExtension = ['jpg', 'png', 'jpeg', 'jfif'];
    $FileExtension = explode('.', $nameFile); // explode --memecah string menjadi array
    $FileExtension = strtolower(end($FileExtension)); // mengambil yang paling akhir dan (extensi gambar format kecil)

    if (!in_array($FileExtension, $ValidFileExtension)) {
        echo "<script>
        alert('The uploaded file is not an image');
        </script>";
        return false;
    }

    // cek ukuran file yang terlalu besar

    if ($sizeFile > 7000000) {
        echo "<script>
        alert('The size of the file you uploaded is too big');
        </script>";
        return false;
    }

    // Generate nama file baru
    $newnamaFile = uniqid();
    $newnamaFile .= '.';
    $newnamaFile .= $FileExtension;
    // lolos cek
    move_uploaded_file($tmpFile, '../toko/img/' . $newnamaFile);

    return $newnamaFile;
}

function konfirmasi_donasi($id)
{
    global $conn;

    // query update
    $query = "UPDATE donatur SET status='Ya' WHERE id_donatur = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_user($id)
{
    global $conn;
    $sql = "DELETE FROM user  WHERE id_user = $id";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}
function delete_donatur($id)
{
    global $conn;
    $sql = "DELETE FROM donatur WHERE id_donatur = $id";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function delete_maspro($id)
{
    global $conn;
    $sql = "DELETE FROM master_product  WHERE id_master_product = $id";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function editStore($data)
{
    global $conn;
    $id = $data['id_store'];
    $username = htmlspecialchars($data['username']);
    $nama_store = htmlspecialchars($data['nama_store']);
    $alamat_store = htmlspecialchars($data['alamat_store']);
    $tentang_store = htmlspecialchars($data['tentang_store']);
    $oldLogo = htmlspecialchars($data['oldLogo']);

    // milih gambar baru opo gak

    if ($_FILES['img_store']['error'] === 4) {
        $img_store = $oldLogo;
    } else {
        $img_store = uploadLogo();
    }

    // query update
    $query = "UPDATE store SET username='$username', nama_store='$nama_store',alamat_store='$alamat_store', tentang_store='$tentang_store', img_store='$img_store' WHERE id_store = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function uploadLogo()
{
    $nameFile = $_FILES['img_store']['name'];
    $sizeFile = $_FILES['img_store']['size'];
    $errorFile = $_FILES['img_store']['error'];
    $tmpFile = $_FILES['img_store']['tmp_name'];

    //cek apakah tidak ada gambar yg di upload

    if ($errorFile === 4) {
        echo "<script>
        alert('Please select an image first');
        </script>";
        return false;
    }

    // Valid File Extension
    $ValidFileExtension = ['jpg', 'png', 'jpeg', 'jfif'];
    $FileExtension = explode('.', $nameFile); // explode --memecah string menjadi array
    $FileExtension = strtolower(end($FileExtension)); // mengambil yang paling akhir dan (extensi gambar format kecil)

    if (!in_array($FileExtension, $ValidFileExtension)) {
        echo "<script>
        alert('The uploaded file is not an image');
        </script>";
        return false;
    }

    // cek ukuran file yang terlalu besar

    if ($sizeFile > 7000000) {
        echo "<script>
        alert('The size of the file you uploaded is too big');
        </script>";
        return false;
    }

    // Generate nama file baru
    $newnamaFile = uniqid();
    $newnamaFile .= '.';
    $newnamaFile .= $FileExtension;
    // lolos cek
    move_uploaded_file($tmpFile, '../toko/img/' . $newnamaFile);

    return $newnamaFile;
}

function editProduk($data)
{
    global $conn;
    $id = $data['id_product'];
    $harga_product = htmlspecialchars($data['harga_product']);

    // milih gambar baru opo gak


    // query update
    $query = "UPDATE product_store SET harga_product='$harga_product' WHERE product_store.id_product = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function addTransaksi($data)
{
    global $conn;
    $id_user = htmlspecialchars($data['id_user']);
    $alamat = htmlspecialchars($data['alamat']);
    $id_store = htmlspecialchars($data['id_store']);
    $id_product = htmlspecialchars($data['id_product']);
    $jumlah_barang = htmlspecialchars($data['jumlah_barang']);
    $image_bukti = uploadBukti();

    if (!$image_bukti) {
        return false; // query insert tidak dijalankan
    }

    // query insert
    $query = "INSERT INTO transaksi VALUES ('', '$id_user', '$alamat', '$id_store', '$id_product', '', '$jumlah_barang', '$image_bukti', 'Belum', 'Belum', 'Belum', current_timestamp())";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadBukti()
{
    $nameFile = $_FILES['image_bukti']['name'];
    $sizeFile = $_FILES['image_bukti']['size'];
    $errorFile = $_FILES['image_bukti']['error'];
    $tmpFile = $_FILES['image_bukti']['tmp_name'];

    //cek apakah tidak ada gambar yg di upload

    if ($errorFile === 4) {
        echo "<script>
        alert('Please select an image first');
        </script>";
        return false;
    }

    // Valid File Extension
    $ValidFileExtension = ['jpg', 'png', 'jpeg', 'jfif'];
    $FileExtension = explode('.', $nameFile); // explode --memecah string menjadi array
    $FileExtension = strtolower(end($FileExtension)); // mengambil yang paling akhir dan (extensi gambar format kecil)

    if (!in_array($FileExtension, $ValidFileExtension)) {
        echo "<script>
        alert('The uploaded file is not an image');
        </script>";
        return false;
    }

    // cek ukuran file yang terlalu besar

    if ($sizeFile > 7000000) {
        echo "<script>
        alert('The size of the file you uploaded is too big');
        </script>";
        return false;
    }

    // Generate nama file baru
    $newnamaFile = uniqid();
    $newnamaFile .= '.';
    $newnamaFile .= $FileExtension;
    // lolos cek
    move_uploaded_file($tmpFile, '../toko/img/' . $newnamaFile);

    return $newnamaFile;
}

function addDonasi($data)
{
    global $conn;
    $id_user = htmlspecialchars($data['id_user']);
    $jenis_donasi = htmlspecialchars($data['jenis_donasi']);
    $jumlah_donasi = htmlspecialchars($data['jumlah_donasi']);
    $status = "Belum";
    $image_bukti = uploadBukti();

    if (!$image_bukti) {
        return false; // query insert tidak dijalankan
    }

    // query insert
    $query = "INSERT INTO donatur VALUES ('','$id_user','$jenis_donasi','$jumlah_donasi','$image_bukti', '$status', current_timestamp())";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
