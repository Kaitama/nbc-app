<!DOCTYPE html>
<html>

<head>
	<title><?php echo APP_NAME ?></title>
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/semantic-ui/semantic.min.css">
</head>

<body>

	<div class="ui secondary pointing menu">
		<a href="<?= BASE_URL ?>/home/index" class="header item">
			<?= APP_NAME ?>
		</a>
		<?php if (isset($_SESSION['user'])) : ?>
		<a href="<?= BASE_URL ?>/dataset/index" class="item">Dataset</a>
		<a href="<?= BASE_URL ?>/prediksi/index" class="item">Prediksi</a>

		<?php endif; ?>

		<div class="right menu">

			<?php if (!isset($_SESSION['user'])) : ?>
			<a href="<?= BASE_URL ?>/login/index" class="ui item">Login</a>
			<?php else : ?>
			<a href="<?= BASE_URL ?>/login/logout" class="ui item">Logout</a>
			<?php endif; ?>

		</div>


	</div>

	<div class="ui container">