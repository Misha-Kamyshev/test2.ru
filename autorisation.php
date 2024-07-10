<?php
    $message_error = $_POST['message'];

    $title = 'Вход в аккаунт';

    require('php/_header.php');
?>

<link rel="stylesheet" type="text/css" href="css/autorisation_registration.css">

<section>
    <div>
        <form name='signIn' method='post' action='php/signin.php'>
            <p>Введите логин</p>
            <input type="text" name="login" placeholder="Логин" class="text">
            <p>Введите пароль</p>
            <input type="password" name="password" placeholder='Пароль' class="text">
            <?php
                if ($_GET["Error"] == "202") {
                    ?>
                    <p style="font-size: 12pt; color: red; text-align: right; margin-top: 10px;">Логин или пароль<br>введены не верно</p>
                    <?php
                }
                elseif ($_GET["Error"] == '201') {
                    ?>
                    <p style="font-size: 12pt; color: red; text-align: right; margin-top: 10px;">Все поля должны быть заполнены</p>
                    <?php
                }
            ?>
            <p>
                <a href="forgot_your_password.php">Забыли пароль?</a>
                <input type="submit" value="Войти" id="submit">
            </p>
    </div>
</section>

<?php
    require('php/_footer.php');
?>