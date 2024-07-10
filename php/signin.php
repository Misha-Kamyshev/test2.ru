<?php
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty($login) || empty($password)) {
        header('Location: ../autorisation.php?Error=201');
        exit;
    }

    require("connect.php");

    $stmt = $BD->prepare("SELECT password, name FROM `users` WHERE login = ?");

    $stmt->bind_param("s", $login);

    $stmt->execute();

    $result_array = $stmt->get_result();
    
    $stmt->close();

    if ($result_array->num_rows == 1) {
        $result = $result_array->fetch_assoc();

        if($result["password"] == $password) {
            setcookie('name', $result['name'], time() + 3600,'/');
            header('Location: ../index.php');
            exit;
        }
    }
    header("Location: ../autorisation.php?Error=202");
    exit;
?>
