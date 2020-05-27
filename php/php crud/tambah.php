<?php

session_start();

if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}

require 'functions.php';
// cek apakah tombol submit sudah ditekan atau blm
if (isset($_POST["submit"])) {

    // var_dump($_POST);
    // cek data sudah ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data BERHASIL ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data GAGAL ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Produk</title>
</head>

<body>
    <h1>Tambah Data Produk</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP:</label>
                <input type="text" name="nrp" id="nrp">
            </li>
            <li>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="harga">Harga:</label>
                <input type="text" name="Hhrga" id="harga">
            </li>
            <li>
                <label for="pemilik">Pemilik:</label>
                <input type="text" name="pemilik" id="pemilik">
            </li>
            <li>
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat">
            </li>
            <li>
                <label for="gambar">Gambar:</label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <button type="submit" name="submit">Tambah</button>
        </ul>
    </form>
</body>

</html>