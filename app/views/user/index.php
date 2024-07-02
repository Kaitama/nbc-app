<div class="ui container">
	<div class="ui segments">
		<div class="ui right aligned segment">
			<a href="<?php echo BASE_URL ?>/user/create" class="ui button">Tambah</a>
		</div>
		<div class="ui segment">
			<table class="ui celled table">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Role</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
					<!-- Looping data user -->
					<?php foreach ($data as $i => $user) : ?>
						<tr>
							<td>
								<?php echo $i + 1 ?>
							</td>
							<td>
								<?php echo $user['username'] ?>
							</td>
							<td>
								<?php echo $user['role'] ?>
							</td>
							<td>
								<!-- tombol edit -->
								<a href="<?php echo BASE_URL ?>/user/edit" class="ui icon button">
									<i class="edit icon"></i>
								</a>
								<!-- tombol hapus -->
								<button class="ui negative icon button">
									<i class="trash icon"></i>
								</button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>