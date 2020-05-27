<?php
session_start();

if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}
require 'functions.php';

// ambil tabel dari tabel mahasiswa / query data mahasiswa
$commodities = query("SELECT * FROM komoditas");
// tombol cari ditekan
if (isset($_POST["cari"])) {
    $commodities = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
</head>

<body>
    <a href="logout.php"><button type="submit">Logout</button></a>
    <h1>Daftar Komoditas</h1>
    <a href="tambah.php">Tambah Data Produk</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="Ketikan Kata Kunci" autocomplate="off">
            <button type="submit" name="cari">Cari</button>
        </form>
        <br><br>
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Harga</th>
            <th>Pemilik</th>
            <th>ALamat</th>
        </tr>
        <?php $i = 1;  ?>
        <?php foreach ($commodities as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm ('Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="50"></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nrp"]; ?></td>
                <td><?= $row["harga"]; ?></td>
                <td><?= $row["pemilik"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
            </tr>
            <?php $i++;  ?>
        <?php endforeach; ?>
    </table>
</body>

</html>