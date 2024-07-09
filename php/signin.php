<?php
    $login = $_POST['login'];
    $password = $_POST['password'];

    require("connect.php");

    $stmt = $BD->prepare("SELECT * FROM `users` WHERE login = ?");

    $stmt->bind_param

    $check_login = mysqli_query($BD, "SELECT * FROM `users` WHERE login=$login");
    print($check_login);
?>