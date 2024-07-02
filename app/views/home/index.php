<div class="ui placeholder segment">
	<div class="ui icon header">
		<i class="user icon"></i>
		Hi, <?= $_SESSION['user']['username'] ?>
		<div class="ui sub header">Selamat datang di Aplikasi Prediksi Penyakit Diabetes Menggunakan Algoritma Naïve Bayes
			Classifier</div>
	</div>

	<div class="inline">
		<a href="<?= BASE_URL ?>/dataset/index" class="ui huge positive labeled icon button">
			<i class="database icon"></i>Dataset
		</a>
		<a href="<?= BASE_URL ?>/prediksi/index" class="ui huge blue labeled icon button">
			<i class="search icon"></i>Prediksi
		</a>
	</div>
</div>