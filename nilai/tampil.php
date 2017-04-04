<?php
include_once "./../connection.php";
if (isset($_GET['matpel'])) {
	$matpel         = $_GET['matpel'];
	$sql            = "select nama from mata_pelajaran WHERE id='{$matpel}'";
	$mata_pelajaran = $conn->query($sql)->fetch_assoc()['nama'];

	$sql   = "SELECT nilai.tahun_ajaran FROM nilai WHERE nilai.id_mata_pelajaran='{$matpel}' GROUP BY tahun_ajaran";
	$tahun = $conn->query($sql);
}
include_once "./../template/header.php" ?>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <h4><?= $mata_pelajaran ?></h4>
		<?php while ( $data = $tahun->fetch_assoc() ): ?>
            <a href="/nilai/tampil.php?matpel=<?= $_GET['matpel'] ?>&tahun=<?= $data['tahun_ajaran'] ?>">
                <span class="label label-info"><?= $data['tahun_ajaran'] ?></span>
            </a>
		<?php endwhile; ?>
		<?php if (isset($_GET['tahun'])):
			$tahun = $_GET['tahun'];
			$sql = "select nilai.*, siswa.nama from nilai, siswa WHERE id_mata_pelajaran='{$matpel}' AND tahun_ajaran='{$tahun}' AND nilai.id_siswa=siswa.id_pengguna";
			$nilai = $conn->query($sql);

			?>
            <table class="table table-bordered table-responsive tabel-nilai">
                <tr>
                    <td>No.</td>
                    <td>Nama</td>
                    <td>Nilai</td>
                    <td>Tahun</td>
                    <td>Tindakan</td>
                </tr>
				<?php
				$loop = 1;
				while ( $data = $nilai->fetch_assoc() ): ?>
                    <tr>
                        <td><?= $loop ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['nilai'] ?></td>
                        <td><?= $data['tahun_ajaran'] ?></td>
						<?php if (isset($_SESSION['id_pengguna'])): ?>
							<?php if ($data['nip_guru'] == $_SESSION['id_pengguna'] OR isset($_SESSION['admin'])): ?>
                                <td>
                                    <a href="/nilai/edit.php?id=<?= $data['id'] ?>&matpel=<?= $_GET['matpel'] ?>&tahun=<?= $_GET['tahun'] ?>">
                                        <span class="edit-icon glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="/nilai/hapus.php?id=<?= $data['id'] ?>&matpel=<?= $_GET['matpel'] ?>&tahun=<?= $_GET['tahun'] ?>">
                                        <span class="delete-icon glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
							<?php else: ?>
                                <td>-</td>
							<?php endif; ?>
						<?php else: ?>
                            <td>-</td>
						<?php endif; ?>
                    </tr>
					<?php
					$loop ++;
				endwhile; ?>
            </table>
		<?php endif; ?>
    </div>
</div>
<?php include_once "./../template/footer.php" ?>
