<?php
include_once "./../connection.php";
$nip    = $_SESSION['id_pengguna'];
$sql    = "select * from siswa";
$result = $conn->query($sql);
include_once "./../template/header.php" ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<a href="/siswa/buat.php">
					<button style="margin: 10px 0;"
					        class="btn btn-info btn-sm pull-right">Tambah
					</button>
				</a>
				<table class="table table-bordered">
					<tr>
						<td>No</td>
						<td>NIS</td>
						<td>Nama</td>
						<td>Tindakan</td>
					</tr>
					<?php
					$loop = 1;
					while ( $data = $result->fetch_assoc() ): ?>
						<tr>
							<td><?= $loop ?></td>
							<td><?= $data['id_pengguna'] ?></td>
							<td><?= $data['nama'] ?></td>
							<td>
								<a href="/siswa/hapus.php?id_pengguna=<?= $data['id_pengguna'] ?>">
									<span class="delete-icon glyphicon glyphicon-trash"></span>
								</a></td>
						</tr>
						<?php
						$loop++;
					endwhile; ?>
				</table>
			</div>
		</div>
	</div>
<?php include_once "./../template/footer.php" ?>