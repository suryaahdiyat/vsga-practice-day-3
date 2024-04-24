<?php

include "util/koneksi.php";

session_start();

if (!isset($_SESSION['sesi'])) {
    echo "
        <script>window.location.href='login.php'</script>
    ";
}

$id_anggota = $_GET['id'];
$r = mysqli_query($db, "SELECT * FROM anggota WHERE id_anggota = '$id_anggota'");
$data_anggota = mysqli_fetch_assoc($r);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Halaman</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body class="p-3">
    <h1>Anggota Dengan ID <?= $data_anggota['id_anggota'] ?></h1>
    <div class="my-3 d-flex">
        <img src="assets/<?= $data_anggota['gambar'] ?> " alt="<?= $data_anggota['gambar'] ?>" width="200px" height="200px" class="border border-dark me-4">
        <div>
            <h4>Nama  : <?= $data_anggota['nama'] ?></h4>
            <h4>Email : <?= $data_anggota['email'] ?></h4>
            <h4>No Hp : <?= $data_anggota['no_hp'] ?></h4>
            <a href="index.php" class="btn btn-danger mt-2">kembali</a>
        </div>
    </div>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>

</body>

</html>