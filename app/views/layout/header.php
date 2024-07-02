<!DOCTYPE html>
<html>

<head>
	<title><?php echo APP_NAME ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/css/semantic.css">
</head>

<body>

	<div class="ui secondary pointing menu">
		<div class="header item">
			<?= APP_NAME ?>
		</div>
		<a href="#" class="item">Home</a>
		<a href="#" class="item">Produk</a>
		<?php
		if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') :
		?>

			<a href="<?php echo BASE_URL ?>/user/index" class="item">User</a>

		<?php endif; ?>

		<div class="right menu">

			<?php if (!isset($_SESSION['user'])) : ?>
				<a href="<?php echo BASE_URL ?>/login/index" class="ui item">Login</a>
				<a href="<?php echo BASE_URL ?>/register/index" class="ui item">Daftar akun</a>
			<?php else : ?>
				<a href="<?php echo BASE_URL ?>/login/logout" class="ui item">Logout</a>
			<?php endif; ?>

		</div>


	</div>