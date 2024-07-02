<div style="margin-top: 4rem; display:flex; justify-content:center">
	<div class="ui raised card" style="min-width: 420px;">
		<div class="content">
			<div class="header">Daftar yuk!</div>
			<div class="meta">
				<div class="category">Dapatkan harga murah cuma disini.</div>
			</div>
			<div class="description">

				<!-- Pesan error gagal register -->
				<?php include_once('../app/views/components/message.php') ?>

				<form id="frm-register" action="<?php echo BASE_URL ?>/register/process" method="post" class="ui form">
					<!-- form login -->
					<div class="field">
						<label>Username</label>
						<input type="text" name="username" id="username" required>
					</div>
					<div class="field">
						<label>Password</label>
						<input type="password" name="password" id="password" minlength="6" required>
					</div>
					<div class="field">
						<label>Konfirmasi Password</label>
						<input type="password" name="password_confirmation" id="password_confirmation" required>
					</div>

				</form>
			</div>
		</div>
		<div class="extra content">
			<button onclick="document.getElementById('frm-register').submit()" class="ui right floated positive button">Daftar</button>
		</div>
	</div>
</div>