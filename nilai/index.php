<?php
include_once "./../connection.php";

$sql    = "select * from mata_pelajaran WHERE id IN (SELECT id_mata_pelajaran from nilai GROUP BY id_mata_pelajaran)";
$result = $conn->query($sql);

include_once "./../template/header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h4 style="margin-top: 23px;" class="pull-left">Nilai siswa</h4>
				<?php if ( ! isset($_SESSION['siswa'])): ?>
					<?php if (!isset($_SESSION['admin'])): ?>
                        <a href="/nilai/buat.php">
                            <button class="btn btn-info btn-sm pull-right btn-masukkan-nilai">
                                Masukkan Nilai
                            </button>
                        </a>
					<?php endif; ?>
                    <table class="table">
						<?php while ( $data = $result->fetch_assoc() ): ?>
                            <tr>
                                <td><?= $data['nama'] ?></td>
                                <td><a href="/nilai/tampil.php?matpel=<?= $data['id'] ?>"
                                       class="btn btn-info btn-sm">Show</a></td>
                            </tr>
						<?php endwhile; ?>
                    </table>
				<?php else:
					$id_pengguna = $_SESSION['id_pengguna'];
					$sql = "select nilai.nilai AS nilai_siswa, mata_pelajaran.nama AS mata_pelajaran, nilai.tahun_ajaran from nilai, siswa, mata_pelajaran where id_siswa='{$id_pengguna}' AND nilai.id_siswa=siswa.id_pengguna AND  nilai.id_mata_pelajaran=mata_pelajaran.id ORDER BY tahun_ajaran DESC ";
					$result = $conn->query($sql);
					?>
                    <table class="table table-bordered">
                        <tr>
                            <td>No</td>
                            <td>Mata Pelajaran</td>
                            <td>Tahun Ajaran</td>
                            <td>Nilai</td>
                        </tr>
						<?php
						$loop = 1;
						while ( $data = $result->fetch_assoc() ): ?>
                            <tr>
                                <td><?= $loop ?></td>
                                <td><?= $data['mata_pelajaran'] ?></td>
                                <td><?= $data['tahun_ajaran'] ?></td>
                                <td><?= $data['nilai_siswa'] ?></td>
                            </tr>
							<?php
							$loop ++;
						endwhile; ?>
                    </table>
				<?php endif; ?>
            </div>
        </div>
    </div>
<?php include_once "./../template/footer.php" ?>