<?php 
session_start();

unset($_SESSION['sesi']);
session_destroy();
echo "
    <script>window.location.href='../login.php'</script>
";


?>