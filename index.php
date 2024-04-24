<?php

include "util/koneksi.php";

session_start();

if (!isset($_SESSION['sesi'])) {
    echo "
        <script>window.location.href='login.php'</script>
    "; //untuk mengatisipasi orang tanpa login masuk kehalaman index, jika ada maka diarahkan kehalaman login
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
    <title>Main File</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style_index.css"> -->
</head>

<body class="">
    <div class="bg-success px-4 py-2 d-flex justify-content-between align-items-center">
        <h1 class="text-light fw-bold">Selamat Datang <?= $_SESSION['sesi']['nm_admin'] ?></h1>
        <a href="util/logout.php" class="btn btn-danger">Log out</a>
    </div>
    <div class="d-flex w-100 vh-100">
        <div class="w-25 bg-dark p-4">
            <a href="" class="btn btn-light text-dark text-decoration-none py-3 fw-semibold w-100 fs-4">Kelola Anggota</a>
        </div>
        <div class="w-75 bg-dark p-4" style="--bs-bg-opacity: .9;">
            <?php if (isset($_GET['d'])) : ?>
                <p class="mb-4 position-relative bg-info p-2 border border-info text-light rounded" style="--bs-bg-opacity: .4;">data berhasil dihapus<a href="index.php" class="text-center position-absolute d-block text-decoration-none fs-6 text-danger bg-light rounded-circle border border-danger top-0 start-100 translate-middle" style="width: 28px;height: 28px;--bs-bg-opacity: .7;">x</a></p>
            <?php endif; ?>
            <div class="rounded-top bg-success d-flex justify-content-between align-items-center py-3 px-4">
                <h2 class="text-light">Kelola Semua Anggota</h2>
                <a href="cetak.php" class="rounded btn btn-primary fs-6 px-4 ">Cetak</a>
                <a href="tambah.php" class="rounded btn btn-light fs-6 fw-bold px-4">+</a>
            </div>
            <table class="table table-dark table-striped w-100 bg-tansparent">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>no hp</th>
                    <th>aksi</th>
                </tr>
                <?php $index = 1; ?>
                <?php foreach ($anggota as $a) : ?>
                    <tr>
                        <td class="fw-semibold"><?= $index ?></td>
                        <td><img src="assets/<?= $a['gambar'] ?>" alt="<?= $a['gambar'] ?>" style="width: 50px; height:50px"></td>
                        <td><?= $a['nama'] ?></td>
                        <td><?= $a['email'] ?></td>
                        <td><?= $a['no_hp'] ?></td>
                        <td>
                            <div>
                                <a href="ubah.php?id=<?= $a['id_anggota'] ?>" class="btn btn-success text-decoration-none">Ubah</a>
                                <a href="cetakAnggota.php?id=<?= $a['id_anggota'] ?>" class="btn btn-primary text-decoration-none">Cetak</a>
                                <a href="util/hapus.php?id=<?= $a['id_anggota'] ?>" onclick="return confirm('Apakah Anda Yakin Menghapus?')" class="btn btn-danger text-decoration-none">Hapus</a>
                            </div>
                        </td>
                    </tr>

                    <?php $index++; ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>