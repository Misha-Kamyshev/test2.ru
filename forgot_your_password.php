<?php 
    $change_password = $_POST["change_password"];
    $pin = $_GET['pin'];
    $title = 'Забыли пароль?';

    print(base64_decode($_COOKIE["pin"]));

    require("php/_header.php");
?>
<link rel="stylesheet" type="text/css" href="css/autorisation_registration.css">

<section>
    <div>
        <?php
            if($change_password == "successful") {
                ?>

                <form name="change_password" method="post" action="php/forgot_password.php">
                    <p>Введите новый пароль</p>
                    <input type="password" name="password" placeholder="Пароль" class="text">
                    <input type="hidden" name="step" value="3"> 
                    <p>
                        <input type="submit" value="Сохранить" id="submit">
                    </p>
                </form>

                <?php
            }

            elseif(empty($pin)) {
                ?>

                <form name='forgot_password' method='post' action='php/forgot_password.php'>
                    <p>Введите почту</p>
                    <input type="text" name="e-mail" placeholder="E-mail" class="text">
                    <p>Введите логин</p>
                    <input type="text" name="login" placeholder="Логин" class="text"> 
                    <input type="hidden" name="step" value="1">
                    <?php
                        if ($_GET['error'] == 1) {
                            ?>
                            <p style="font-size: 12pt; color: red; text-align: right; margin-top: 10px;">Превышена длительность сессии,<br>повторите попытку</p>
                            <?php
                        }
                        elseif ($_GET['error'] == 2) {
                            ?>
                            <p style="font-size: 12pt; color: red; text-align: right; margin-top: 10px;">Заполните все поля</p>
                            <?php
                        }
                        elseif ($_GET['error'] == 101) {
                            ?>
                            <p style="font-size: 12pt; color: red; text-align: right; margin-top: 10px;">Не верный логин</p>
                            <?php
                        }
                        elseif ($_GET['error'] == 102) {
                            ?>
                            <p style="font-size: 12pt; color: red; text-align: right; margin-top: 10px;">Не верный E-mail</p>
                            <?php 
                        }
                        ?>
                    <p>
                        <input type="submit" value="Отправить код" id="submit">
                    </p>
                </form>

                <?php 
            }

            elseif($pin == 1) {
                ?>

                <form name='forgot_password' method='post' action='php/forgot_password.php'>
                    <p>Введите код</p>
                    <input type="text" name="pin" placeholder="Код" class="text">
                    <input type="hidden" name="step" value="2">
                    <p>
                        <input type="submit" value="Проверить" id="submit">
                    </p>
                </form>

                <?php
            }
            ?>            

    </div>
</section>

<?php 
    require("php/_footer.php");
?>