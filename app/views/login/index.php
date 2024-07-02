<div style="margin-top: 4rem; display:flex; justify-content:center">
	<div class="ui raised card" style="min-width: 420px;">
		<div class="content">
			<div class="header">Login user</div>
			<div class="meta">
				<div class="category">Masuk dan mulai berbelanja</div>
			</div>
			<div class="description">

				<!-- Pesan error gagal login -->
				<?php include_once('../app/views/components/message.php') ?>

				<form id="frm-login" action="<?php echo BASE_URL ?>/login/process" method="post" class="ui form">
					<!-- form login -->
					<div class="field">
						<label>Username</label>
						<input type="text" name="username" id="username">
					</div>
					<div class="field">
						<label>Password</label>
						<input type="password" name="password" id="password">
					</div>

				</form>
			</div>
		</div>
		<div class="extra content">
			<button onclick="document.getElementById('frm-login').submit()" class="ui right floated positive button">Login</button>
		</div>
	</div>
</div>