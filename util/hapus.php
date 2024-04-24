<?php 

include "koneksi.php";

session_start();

if(isset($_GET['id'])){
    $id_anggota = $_GET['id'];
    $r = mysqli_query($db, "DELETE FROM anggota WHERE id_anggota = '$id_anggota'");


    echo "
        <script>
            window.location.href='../index.php?d=y'
        </script>
    ";
}


?>