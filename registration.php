<?php
    $message_error = $_POST['message'];

    $title = 'Регистрация';

    require('php/_header.php');
?>

<link rel="stylesheet" type="text/css" href="css/autorisation_registration.css">

<section>
    <div>
        <form name='signIn' method='post' action='php/signup.php'>
            <p>Введите имя пользователя</p>
            <input type="text" name="name" placeholder="Имя пользователя" class="text">
            <p>Введите логин</p>
            <input type="text" name="login" placeholder="Логин" class="text">
            <p>Введите пароль</p>
            <input type="password" name="password" placeholder='Пароль' class="text">
            <?php
                if ($message_error == 'Error') {
                    ?>
                    <p style="font-size: 12pt; color: red; text-align: right; margin-top: 10px;">Имя пользователя уже занято</p>
                    <?php
                }
                elseif ($message_error == 'Empty') {
                    ?>
                    <p style="font-size: 12pt; color: red; text-align: right; margin-top: 10px;">Все поля должны быть заполнены</p>
                    <?php
                }
            ?>
            <p>
                <input type="submit" value="Зарегистрироваться" id="submit">
            </p>
            
    </div>
</section>

<?php
    require('php/_footer.php');
?>