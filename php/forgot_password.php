<?php
    switch ($_POST["step"]) {
        case "1":
            require("connect.php");

            $stmt = $BD->prepare("SELECT `e-mail` FROM `users` WHERE login = ?");
            $stmt->bind_param("s", $_POST["login"]);
            $stmt->execute();
            $result_array = $stmt->get_result();
            $result = $result_array->fetch_assoc();

            if ($result_array->num_rows == 0) {
                $stmt->close();
                header("Location: ../forgot_your_password.php?error=101");
                exit();
            }
            else {
                $stmt->close();
                if ($result["e-mail"] != $_POST['e-mail']) {
                    header('Location: ../forgot_your_password.php?error=102');
                    exit();
                }
            }

            $to = $_POST["e-mail"];
            
            if (empty($to) || empty($_POST["login"])) {
                header("Location: ../forgot_your_password.php?error=2");
                exit;
            }
            setcookie("login", base64_encode($_POST["login"]), time() + 360, "/");
            
            $from = "keklolkek15@gmail.com";
            
            $subject = "Восстановление пароля";
            $subject = "=?utf-8?B?".base64_encode($subject)."?=";

            $headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=utf-8\r\n";
            
            $message = rand(1000, 9999);
            setcookie("pin", base64_encode($message), time() + 120,"/");

            mail($to, $subject, $message, $headers);
            
            header("Location: ../forgot_your_password.php?pin=1");
            break;

        case "2":
            $pin_user = $_POST["pin"];

            $pin_original = $_COOKIE["pin"];

            if (!isset($pin_original)) {
                header("Location: ../forgot_your_password.php?error=1");
                exit;
            }
        
            elseif ($pin_user == base64_decode($pin_original)) {
                echo '
                <form id="Successful" method="post" action="../forgot_your_password.php">
                    <input type="hidden" name="change_password" value="successful">
                </form>
                <script type="text/javascript">
                    document.getElementById("Successful").submit();
                </script>';
            }
            break;
        
        case "3":
            $login = base64_decode($_COOKIE["login"]);
            $password = $_POST["password"];

            if (!isset($login)) {
                header("Location: ../forgot_your_password.php?error=1");
                exit;
            }

            else {
                require("connect.php");
                
                $stmt = $BD->prepare("UPDATE `users` SET password = ? WHERE login = ?");

                $stmt->bind_param("ss", $password, $login);

                $stmt->execute();

                setcookie("login", null, time() - 1, "/");
                setcookie("pin", null, time() - 1,"/");

                header("Location: ../autorisation.php");
                exit;
            }        
    }
?>
