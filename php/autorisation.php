<?php
    $title = 'Вход в аккаунт';

    require('_header.php');
?>

<link rel="stylesheet" type="text/css" href="../css/autorisation.css">

<section>
    <div>
        <form name='signIn' method='post' action='signin.php'>
            <p>Введите имя пользователя</p>
            <input type="text" name="login" placeholder="Имя пользователя" class="text">
            <p>Введите пароль</p>
            <input type="password" name="password" placeholder='Пароль' class="text">
            <p>
                <a href="">Забыли пароль?</a>
                <input type="submit" value="Войти" id="submit">
            </p>
    </div>
</section>

<?php
    require('_footer.php');
?>