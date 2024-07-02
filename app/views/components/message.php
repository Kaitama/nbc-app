<?php
if (isset($_SESSION['message'])) :
	$m = $_SESSION['message'];
	// icon dinamis sesuai dengan type
	switch ($m['type']) {
		case 'positive':
			$icon = 'check circle';
			break;
		case 'info':
			$icon = 'info circle';
			break;
		case 'warning':
			$icon = 'exclamation triangle';
			break;
		default:
			$icon = 'exclamation circle';
			break;
	}
?>

	<div class="ui icon <?php echo $m['type'] ?> message">
		<i class="<?php echo $icon ?> icon"></i>
		<div class="content">
			<div class="header">
				<?php echo $m['title'] ?>
			</div>
			<p>
				<?php echo $m['body'] ?>
			</p>
		</div>
	</div>

<?php
	unset($_SESSION['message']);
endif;
?>