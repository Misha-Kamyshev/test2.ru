<?php
    $name = $_POST["name"];
    $login = $_POST["login"];
    $e_mail = $_POST["e-mail"];
    $password = $_POST["password"];

    if (empty($login) || empty($password) || empty($name) || empty($e_mail)) {
        header("Location: ../registration.php?Error=201");
        exit;
    }

    require('connect.php');

    $stmt = $BD->prepare("INSERT INTO `users` values (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $name, $login, $e_mail, $password);

    if ($stmt->execute()) {
        $stmt->close();
        setcookie("name", $name, time() + 3600, "/");
        header("Location: ../index.php");
        exit;
    }
    else {
        $stmt->close();
        // setcookie("name", 0, time() + 3600, "/");
        header("Location: ../registration.php?Error=202");
        exit;
    }
?>
