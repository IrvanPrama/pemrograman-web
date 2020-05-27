<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $harga = htmlspecialchars($data["harga"]);
    $pemilik = htmlspecialchars($data["pemilik"]);
    $berat = htmlspecialchars($data["berat"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gambar = htmlspecialchars($data["gambar"]);
    // // upload gambar
    // $Gambar = upload();
    // if (!$Gambar) {
    //     return false;
    // }

    $query = "INSERT INTO komoditas
            VALUES
            ('', '$nrp', '$nama', '$harga', '$pemilik', '$berat', '$alamat', '$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM komoditas WHERE id = $id ");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $harga = htmlspecialchars($data["harga"]);
    $pemilik = htmlspecialchars($data["pemilik"]);
    $berat = htmlspecialchars($data["berat"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE komoditas SET
                nama = '$nama',
                nrp = '$nrp',
                harga = '$harga',
                pemilik = '$pemilik',
                alamat = '$alamat',
                gambar = '$gambar'
                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM komoditas
                WHERE 
                Nama LIKE '%$keyword%' OR
                NRP LIKE '%$keyword%' OR
                Harga LIKE '%$keyword%' OR
                Pemilik LIKE '%$keyword%' OR
                Alamat LIKE '%$keyword%'
                ";
    return query($query);
}

// function upload()
// {

//     $namaFile = $_FILES['Gambar']['name'];
//     $ukuranFile = $_FILES['Gambar']['size'];
//     $error = $_FILES['Gambar']['error'];
//     $tmpName = $_FILES['Gambar']['tmp_name'];

//     // cek apakah tidak ada gambar yang di-upload
//     if ($error === 4) {
//         echo
//             "<script> 
//             alert('Pilih Gambar Dulu!');
//         </script>";

//         return false;
//     }
//     // cek ukuran gambar
//     if ($ukuranFile > 1000000) {
//         echo "< script >
//             alert('ukuran file terlalu besar, pastika ukuran file kurang dari 1 MB');
//             </script >";
//     }
//     // cek yang di upload hanya gambar
//     $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
//     $ekstensiGambar = explode('.', '$namaFile');
//     $ekstensiGambar = strtolower(end($ekstensiGambar));
//     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//         echo "<script>
//             alert('File yang anda upload bukan gambar!');
//             </script>";
//         return false;
//     }

//     // lolos pengecekan
//     move_uploaded_file($tmpName, 'img/' . $namaFile);

//     return $namaFile;
// }

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username tidak tersedia');
            </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
