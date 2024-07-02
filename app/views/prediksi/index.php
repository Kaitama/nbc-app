<div class="ui segments">
	<div class="ui segment">
		<a href="<?= BASE_URL ?>/home/index" class="ui labeled icon button">
			<i class="chevron left icon"></i>Kembali
		</a>
	</div>
	<div class="ui segment">
		<div class="ui header">Prediksi Penyakit Diabetes</div>
	</div>
	<div class="ui segment">
		<form action="<?= BASE_URL ?>/prediksi/create" method="post" class="ui form">
			<h4 class="ui dividing header">Data Pasien</h4>
			<div class="field required">
				<label>Nama Lengkap</label>
				<input type="text" name="nama" required>
			</div>
			<div class="two fields">
				<div class="field required">
					<label>Usia</label>
					<input type="number" name="usia" required>
				</div>
				<div class="field required">
					<label>Jenis Kelamin</label>
					<div class="inline fields">
						<div class="field">
							<input type="radio" name="gender" value="1" id="pria" required>
							<label for="pria">Pria</label>
						</div>
						<div class="field">
							<input type="radio" name="gender" value="0" id="wanita" required>
							<label for="wanita">Wanita</label>
						</div>
					</div>
				</div>
			</div>
			<div class="two fields">
				<div class="field required">
					<label>Berat Badan</label>
					<input type="number" min="1" name="berat" required>
				</div>
				<div class="field">
					<label>Telepon</label>
					<input type="tel" name="telepon">
				</div>
			</div>
			<div class="field">
				<label>Alamat</label>
				<textarea name="alamat" rows="4"></textarea>
			</div>

			<h4 class="ui dividing header">Hasil Lab</h4>
			<div class="field required">
				<label>Kadar Gula Darah</label>
				<input type="number" name="gd" min="1" required>
			</div>
			<div class="field required">
				<label>Polyuria</label>
				<div class="inline fields">
					<div class="field">
						<input type="radio" name="pu" value="1" id="pu-t" required>
						<label for="pu-t">Ya</label>
					</div>
					<div class="field">
						<input type="radio" name="pu" value="0" id="pu-f" required>
						<label for="pu-f">Tidak</label>
					</div>
				</div>
			</div>
			<div class="field required">
				<label>Polydipsia</label>
				<div class="inline fields">
					<div class="field">
						<input type="radio" name="pd" value="1" id="pd-t" required>
						<label for="pd-t">Ya</label>
					</div>
					<div class="field">
						<input type="radio" name="pd" value="0" id="pd-f" required>
						<label for="pd-f">Tidak</label>
					</div>
				</div>
			</div>
			<div class="field required">
				<label>Polyphagia</label>
				<div class="inline fields">
					<div class="field">
						<input type="radio" name="pp" value="1" id="pp-t" required>
						<label for="pp-t">Ya</label>
					</div>
					<div class="field">
						<input type="radio" name="pp" value="0" id="pp-f" required>
						<label for="pp-f">Tidak</label>
					</div>
				</div>
			</div>
			<div class="field required">
				<label>Berat Badan Menurun Drastis</label>
				<div class="inline fields">
					<div class="field">
						<input type="radio" name="swl" value="1" id="swl-t" required>
						<label for="swl-t">Ya</label>
					</div>
					<div class="field">
						<input type="radio" name="swl" value="0" id="swl-f" required>
						<label for="swl-f">Tidak</label>
					</div>
				</div>
			</div>
			<div class="field required">
				<label>Sering Merasa Kelelahan</label>
				<div class="inline fields">
					<div class="field">
						<input type="radio" name="wn" value="1" id="wn-t" required>
						<label for="wn-t">Ya</label>
					</div>
					<div class="field">
						<input type="radio" name="wn" value="0" id="wn-f" required>
						<label for="wn-f">Tidak</label>
					</div>
				</div>
			</div>
			<div class="ui basic right aligned segment">
				<button type="submit" class="ui labeled positive icon button">
					<i class="search icon"></i>Prediksi
				</button>
			</div>
		</form>
	</div>
</div>
<div class="ui basic segment"></div>