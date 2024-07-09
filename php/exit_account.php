<?php 
    setcookie("name", 0, time() + 3600, "/");
    header("Location: ../index.php");
    exit;
?>