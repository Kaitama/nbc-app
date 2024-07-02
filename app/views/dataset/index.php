<div class="ui segments">
	<div class="ui segment">
		<a href="<?= BASE_URL ?>" class="ui labeled icon button">
			<i class="chevron left icon"></i>Kembali
		</a>
	</div>
	<div class="ui segment">
		<div class="ui header">Dataset Pasien Terdahulu</div>
		<?php include_once('../app/views/components/message.php') ?>
	</div>
	<div class="ui segment">
		<form action="<?= BASE_URL ?>/dataset/store" method="post" class="ui form" enctype="multipart/form-data">
			<div class="inline fields">
				<div class="field">
					<label>File Excel</label>
					<input type="file" name="excel">
				</div>
				<div class="field">
					<button type="submit" name="submit" class="ui positive labeled icon button">
						<i class="upload icon"></i>Upload
					</button>
				</div>
			</div>
		</form>
	</div>
	<div class="ui segment">
		<table class="ui celled table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pasien</th>
					<th>US</th>
					<th>JK</th>
					<th>GD</th>
					<th>PU</th>
					<th>PD</th>
					<th>PP</th>
					<th>SWL</th>
					<th>WN</th>
					<th>BB</th>
					<th>KET</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($data as $k => $dt) : ?>
				<tr>
					<td><?= $k + 1 ?></td>
					<td><?= $dt['name'] ?></td>
					<td><?= $dt['usia'] ?></td>
					<td><?= $dt['gender'] ? 'P' : 'W' ?></td>
					<td><?= $dt['gd'] ?></td>
					<td><?= $dt['pu'] ?></td>
					<td><?= $dt['pd'] ?></td>
					<td><?= $dt['pp'] ?></td>
					<td><?= $dt['swl'] ?></td>
					<td><?= $dt['wn'] ?></td>
					<td><?= $dt['berat'] ?></td>
					<td>
						<?php if ($dt['ket']) : ?>
						<div class="ui circular red label">
							<i class="plus icon"></i> Positif
						</div>
						<?php else : ?>
						<div class="ui circular label">
							<i class="minus icon"></i> Negatif
						</div>
						<?php endif; ?>
					</td>
					<td class="collapsing">
						<a href="<?= BASE_URL ?>/dataset/destroy/<?= $dt['id'] ?>" class="ui labeled icon button"
							onclick="return confirm('Yakin ingin menghapus?')">
							<i class="trash icon"></i> Hapus
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>