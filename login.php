<?php

include 'util/koneksi.php';//pemanggilan file koneksi

session_start();//memulai session

$_SESSION['sesi'] = null;//meinisiasi Session['sesi'] menjadi null

//mengecek jika button dengan name btn-submit ditekan maka jalankan perintah dibawah ini
if (isset($_POST['btn-submit'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $passw = isset($_POST['passw']) ? $_POST['passw'] : 1;

    $r = mysqli_query($db, "SELECT * FROM admin where username = '$username' AND passw = '$passw'");

    if (mysqli_num_rows($r)) {
        $data_admin = mysqli_fetch_assoc($r);
        $_SESSION['sesi'] = $data_admin;

        echo "
            <script>
                alert('Anda Berhasil Login')
                window.location.href='index.php'
            </script>
        ";
    } else {
        echo "
            <script>
                window.location.href='login.php?e=y'
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
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/stye_login.css"> -->
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="row bg-success py-4 px-3 text-center rounded-4 shadow-lg" style="width: 35%;">
            <h1 class="mb-5 text-light">Login Form</h1>
            <?php if (isset($_GET['e'])) : ?>
                <p class="position-relative bg-info py-3 border border-info text-light" style="--bs-bg-opacity: .4;">username dan password tidak cocok <a href="login.php" class="position-absolute d-block text-decoration-none text-danger fs-6 bg-light rounded-circle border border-danger top-0 start-100 translate-middle" style="width: 28px;height: 28px;--bs-bg-opacity: .7;">x</a></p>
            <?php endif; ?>
            <form action="" method="POST" class="d-flex flex-column justify-content-center align-items-center">
                <div class="w-75 mb-3 bg-light text-dark rounded-2 p-2 d-flex flex-column">
                    <label for="username" class="text-start fs-5 mb-2">username</label>
                    <input type="text" id="username" name="username" class="focus-ring px-2 py-1 rounded border-0 border-bottom border-success" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)" required>
                </div>
                <div class="w-75 mb-3 bg-light text-dark rounded-2 p-2 d-flex flex-column">

                    <label for="passw" class="text-start fs-5 mb-2">password</label>
                    <input type="password" id="passw" name="passw" class="focus-ring px-2 py-1 rounded border-0 border-bottom border-success" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)" required>
                </div>
                <button class="btn w-75 border-0 py-2 fw-semibold btn-light" name="btn-submit">Login</button>
            </form>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
-->
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>