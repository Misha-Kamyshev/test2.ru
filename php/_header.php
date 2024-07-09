<!DOCTYPE html>
<html>
<head>
<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/_header.css">

</head>
<body>
	<header>
		<div>
			<h1><a href="../index.php">Тестирование<br>онлайн</a></h1>
			<ul>
				<?php
					if ($_COOKIE['name'] == '0') {
						?>
						<li><a href="autorisation.php">Войти</a></li>
						<li><a href="registration.php">Зарегистрироваться</a></li>
						<?php
					}
					else {
						?>
						<li><a href="#"><?php echo "{$_COOKIE['name']}";?></a></li>
						<li><a href="#">Выйти из акаунта</a></li>
						<?php
					}
				?>
			</ul>
		</div>
	</header>