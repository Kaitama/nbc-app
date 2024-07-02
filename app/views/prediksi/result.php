<div class="ui segments">
	<div class="ui segment">
		<a href="<?= BASE_URL ?>/prediksi/index" class="ui labeled icon button">
			<i class="chevron left icon"></i>Kembali
		</a>
	</div>
	<div class="ui segment">
		<div class="ui header">Hasil Prediksi Penyakit Diabetes</div>
	</div>
	<div class="ui center aligned segment">
		<p>Berdasarkan hasil perhitungan Metode Naïve Bayesian Classifier dalam memprediksi penyakit Diabetes, pasien atas
			nama <strong><?= $data['patient']['name'] ?></strong> mendapatkan hasil prediksi:</p>
		<?php $positive = $data['patient']['ket'] ?>
		<div class="ui massive icon <?= $positive ? 'green' : 'red' ?> label">
			<i class="<?= $positive ? 'check' : 'times' ?> icon"></i>
			<?= $positive ? 'Positif' : 'Negatif' ?> Diabetes
		</div>
	</div>
	<div class="ui right aligned segment">
		<a href="<?= BASE_URL ?>/prediksi/store" class="ui labeled icon button">
			<i class="save icon"></i>Simpan sebagai dataset
		</a>
		<a href="<?= BASE_URL ?>/prediksi/index" class="ui black button">Selesai</a>
	</div>
</div>