<?php

session_start();

if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}

require 'functions.php';

// Ambil data dari url
$id = $_GET["id"];

// query data komoditas berdasarkan id
$commodity = query("SELECT * FROM komoditas WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau blm
if (isset($_POST["submit"])) {

    // cek data sudah diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data BERHASIL diubah');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data GAGAL diubah!');
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
    <title>Ubah Data</title>
</head>

<body>
    <h1>Ubah Data Produk</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $commodity["id"]; ?>">
        <ul>
            <li>
                <label for="nrp">NRP:</label>
                <input type="text" name="nrp" id="nrp" required value="<?= $commodity["nrp"]; ?>">
            </li>
            <li>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" required value="<?= $commodity["nama"]; ?>">
            </li>
            <li>
                <label for="harga">Harga:</label>
                <input type="text" name="harga" id="harga" required value="<?= $commodity["harga"]; ?>">
            </li>
            <li>
                <label for="pemilik">Pemilik:</label>
                <input type="text" name="pemilik" id="pemilik" required value="<?= $commodity["pemilik"]; ?>">
            </li>
            <li>
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" required value="<?= $commodity["alamat"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar:</label>
                <input type="text" name="gambar" id="gambar" required value="<?= $commodity["gambar"]; ?>">
            </li>
            <button type="submit" name="submit">Ubah</button>
        </ul>
    </form>
</body>

</html>