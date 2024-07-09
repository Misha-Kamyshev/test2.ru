<?php
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty($login) || empty($password)) {
        echo '
        <form id="Empty" method="post" action="../autorisation.php">
            <input type="hidden" name="message" value="Empty">
        </form>
        <script type="text/javascript">
            document.getElementById("Empty").submit();
        </script>';
        exit;
    }

    require("connect.php");

    $stmt = $BD->prepare("SELECT password, name FROM `users` WHERE login = ?");

    $stmt->bind_param("s", $login);

    $stmt->execute();

    $result_array = $stmt->get_result();

    if ($result_array->num_rows == 1) {
        $result = $result_array->fetch_assoc();

        if($result["password"] == $password) {
            setcookie('name', $result['name'], time() + 3600,'/');

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
        <form id="ErrorMessage" method="post" action="../autorisation.php">
            <input type="hidden" name="message" value="Error">
        </form>
        <script type="text/javascript">
            document.getElementById("ErrorMessage").submit();
        </script>';

    $stmt->close();
    
    print($check_login);
?>

