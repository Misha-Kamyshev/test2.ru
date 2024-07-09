<?php 
	if (!isset( $_COOKIE['name'])) {
		setcookie('name', '0', time() + 3600,'/');
	}

	$title = 'Главная';

	require ('php/_header.php');
?>


<section>
	
</section>


<?php
	require('php/_footer.php');
?>