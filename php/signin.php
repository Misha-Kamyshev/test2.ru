<?php
    $login = $_POST['login'];
    $password = $_POST['password'];

    require("connect.php");

    $stmt = $BD->prepare("SELECT password FROM `users` WHERE login = ?");

    $stmt->bind_param("s", $login);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $result_password = $result->fetch_assoc();

        if($result_password["password"] == $password) {
            echo '
            <form id="Successful" method="post" action="../index.php">
                <input type="hidden" name="message" value="successful">
             </form>
            <script type="text/javascript">
                document.getElementById("Successful").submit();
            </script>
            ';
        }
    }
    
    echo '
        <form id="ErrorMessage" method="post" action="autorisation.php">
            <input type="hidden" name="message" value="Error">
        </form>
        <script type="text/javascript">
            document.getElementById("ErrorMessage").submit();
        </script>';

    $stmt->close();
    
    print($check_login);
?>

