<?php

include "util/koneksi.php";

session_start();

if (!isset($_SESSION['sesi'])) {
    echo "
        <script>window.location.href='login.php'</script>
    ";
}

$r = mysqli_query($db, "SELECT * FROM anggota");
$anggota = [];
while ($a = mysqli_fetch_assoc($r)) {
    $anggota[] = $a;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Halaman</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body class="p-4">
    <h1>Semua Anggota</h1>
    <table class="table w-100 table-striped">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>email</th>
            <th>no hp</th>
            <!-- <th>aksi</th> -->
        </tr>
        <?php $index = 1; ?>
        <?php foreach ($anggota as $a) : ?>
            <tr>
                <td class="fw-semibold"><?= $index ?></td>
                <td><img src="assets/<?= $a['gambar'] ?>" alt="<?= $a['gambar'] ?>" style="width: 50px; height:50px"></td>
                <td><?= $a['nama'] ?></td>
                <td><?= $a['email'] ?></td>
                <td><?= $a['no_hp'] ?></td>
            </tr>

            <?php $index++; ?>
        <?php endforeach; ?>

    </table>
    <a href="index.php" class="btn btn-danger">kembali</a>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>

</body>

</html>