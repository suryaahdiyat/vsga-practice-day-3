<?php

include "util/koneksi.php";

session_start();

if (!isset($_SESSION['sesi'])) {
    echo "
        <script>window.location.href='login.php'</script>
    "; //untuk mengatisipasi orang tanpa login masuk kehalaman index, jika ada maka diarahkan kehalaman login
}

if(isset($_GET['id'])){
    $id_anggota = $_GET['id'];
    $r = mysqli_query($db, "SELECT * FROM anggota WHERE id_anggota = '$id_anggota'");
    $data_anggota = mysqli_fetch_assoc($r);

    if (isset($_POST['btn-submit'])) {
        $name = $_POST['nama'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $gambar = $_POST['gambar'] ? $_POST['gambar'] : $data_anggota['gambar'];

        $r = mysqli_query($db, "UPDATE anggota SET nama = '$name', email = '$email', no_hp = '$no_hp',gambar = '$gambar' WHERE id_anggota = '$id_anggota'");
        if (mysqli_affected_rows($db)) {
            echo "
                <script>
                    window.location.href='ubah.php?id=$id_anggota&ed=y'
                </script>
            ";
        }
    }
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

</head>

<body>
    <div class="bg-success px-4 py-2 d-flex justify-content-between align-items-center">
        <h1 class="text-light fw-bold">Selamat Datang <?= $_SESSION['sesi']['nm_admin'] ?></h1>
        <a href="logout.php" class="btn btn-danger">Log out</a>
    </div>
    <div class="d-flex w-100 vh-100">
        <div class=" w-25 bg-dark p-4">
            <a href="index.php" class="btn btn-light text-dark text-decoration-none py-3 fw-semibold w-100 fs-4">Kelola Anggota</a>
        </div>
        <div class="w-75 bg-dark p-4" style="--bs-bg-opacity: .9;">
            <?php if (isset($_GET['ed'])) : ?>
                <p class="mb-4 position-relative bg-info p-2 border border-info text-light rounded" style="--bs-bg-opacity: .4;">data berhasil diubah<a href="ubah.php?id=<?= $id_anggota ?>" class="text-center position-absolute d-block text-decoration-none fs-6 text-danger bg-light rounded-circle border border-danger top-0 start-100 translate-middle" style="width: 28px;height: 28px;--bs-bg-opacity: .7;">x</a></p>
            <?php endif; ?>
            <h1 class="text-light">Tambah Anggota</h1>
            <form method="POST" class="">
                <div class="input-group w-100 mb-2">
                    <div class="w-25">
                        <label class="text-light" for="gambar">Gambar</label>
                    </div>
                    <div class="w-50 d-flex">
                        <img src="assets/<?= $data_anggota['gambar'] ?>" alt="" width="50px" height="50px" class="border mx-2">
                        <input class="form-control focus-ring" type="file" id="gambar" name="gambar" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)">
                    </div>
                </div>
                <div class="input-group w-100 mb-2">
                    <div class="w-25">
                        <label class="text-light" for="nama">Nama</label>
                    </div>
                    <div class="w-25">
                        <input class="focus-ring form-control" type="text" id="nama" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)" name="nama" value="<?= $data_anggota['nama'] ?>">
                    </div>
                </div>
                <div class="input-group w-100 mb-2">
                    <div class="w-25">

                        <label class="text-light" for="email">Email</label>
                    </div>
                    <div class="w-25">

                        <input class="focus-ring form-control" type="email" id="email" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)" name="email" value="<?= $data_anggota['email'] ?>">
                    </div>
                </div>
                <div class="input-group w-100 mb-2">
                    <div class="w-25">

                        <label class="text-light" for="no_hp">No HP</label>
                    </div>
                    <div class="w-25">

                        <input class="focus-ring form-control" type="number" id="no_hp" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)" name="no_hp" value="<?= $data_anggota['no_hp'] ?>">
                    </div>
                </div>
                <button name="btn-submit" class="btn btn-primary">Ubah</button>
                <a href="index.php" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>