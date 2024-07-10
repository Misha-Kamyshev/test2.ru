<!DOCTYPE html>
<html>
<head>
<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/_header.css">

</head>
<body>
	<header>
		<div class="navigation">
			<h1><a href="../index.php">Тестирование<br>онлайн</a></h1>
			<ul class="menu">
				<?php
					if ($_COOKIE['name'] == '0' || !isset($_COOKIE['name'])) {
						?>
						<li><a href="autorisation.php">Войти</a></li>
						<li><a href="registration.php">Зарегистрироваться</a></li>
						<?php
					}
					else {
						?>
						<li><a href="#"><?php echo "{$_COOKIE['name']}";?></a>
							<div class="outputList">
								<ul class="submenu">
									<li><a href="#">Тесты</a></li>
									<li><a href="settings.php">Настройки</a></li>
									<li><a href="php/exit_account.php">Выйти из акаунта</a></li>
									</ul>
							</div>
						</li>
						<?php
					}
				?>
			</ul>
		</div>
	</header>