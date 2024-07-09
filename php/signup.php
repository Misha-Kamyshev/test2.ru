<?php
    $name = $_POST["name"];
    $login = $_POST["login"];
    $password = $_POST["password"];

    require('connect.php');

    $stmt = $BD->prepare("INSERT INTO `users` (name, login, password) values (?, ?, ?)");

    $stmt->bind_param("sss", $name, $login, $password);

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
