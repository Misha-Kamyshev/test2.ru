<?php
    $name = $_POST["name"];
    $login = $_POST["login"];
    $e_mail = $_POST["e-mail"];
    $password = $_POST["password"];

    if (empty($login) || empty($password) || empty($name) || empty($e_mail)) {
        echo '
        <form id="Empty" method="post" action="../registration.php">
            <input type="hidden" name="message" value="Empty">
        </form>
        <script type="text/javascript">
            document.getElementById("Empty").submit();
        </script>';
        exit;
    }

    require('connect.php');

    $stmt = $BD->prepare("INSERT INTO `users` (name, login, e_mail, password) values (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $name, $login, $e_mail, $password);

    if ($stmt->execute()) {
        $stmt->close();
        setcookie("name", $name, time() + 3600, "/");

        echo '
            <form id="Successful" method="post" action="../index.php">
                <input type="hidden" name="message" value="successful">
            </form>
            <script type="text/javascript">
                document.getElementById("Successful").submit();
            </script>';
    }
    else {
        $stmt->close();
        setcookie("name", 0, time() + 3600, "/");
        
        echo '
            <form id="Error" method="post" action="../registration.php">
                <input type="hidden" name="message" value="Error">
            </form>
            <script type="text/javascript">
                document.getElementById("Error").submit();
            </script>';
    }
?>
