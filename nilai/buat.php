<?php
include_once "./../connection.php";
include_once "./../middleware/AuthOnly.php";
include_once "./../middleware/teacherOnly.php";

if ( ! empty($_POST)) {
	$mataPelajaran = $_POST['mata_pelajaran'];
	$tahunAjaran   = $_POST['tahun_ajaran'];
	$idSiswa       = $_POST['id_siswa'];
	$nilaiSiswa    = $_POST['nilai_siswa'];
	$nipGuru       = $_SESSION['id_pengguna'];

	for ( $i = 0; $i < count($idSiswa); $i ++ ) {
		$errors = array();
		$success = array();
		$id_siswa = $idSiswa[ $i ];
		$nilai    = $nilaiSiswa[ $i ];
		$sql      = "insert into 
                nilai (id_mata_pelajaran, tahun_ajaran, nip_guru, id_siswa, nilai) 
                VALUES  ('{$mataPelajaran}', '{$tahunAjaran}', '{$nipGuru}', '{$id_siswa}', '{$nilai}')";
		if ($conn->query($sql)) {
			$success[] = "Berhasil memasukkan data.";
		} else {
			$errors[] = "Terjadi kesalahan didalam memasukkan data.";
		}
	}
}

include_once "./../template/header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3>Form Nilai Siswa</h3>
                <?php include_once "./../alert.php" ?>
                <div class="alert alert-warning" role="alert">
                    <strong>Perhatian!</strong> Pastikan semua kolom terisi sebelum upload
                    nilai.
                </div>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mata_pelajaran">Mata Pelajaran</label>
                                <select name="mata_pelajaran" id="mata_pelajaran"
                                        class="form-control input-sm">
									<?php
									$sql    = "select * from mata_pelajaran";
									$result = $conn->query($sql);
									?>
									<?php while ( $mata_pelajaran = $result->fetch_assoc() ): ?>
                                        <option value="<?= $mata_pelajaran['id'] ?>"><?= $mata_pelajaran['nama'] ?></option>
									<?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran"
                                       class="form-control input-sm" id="tahun_ajaran">
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                    <div class="btn btn-info btn-sm" onclick="tambahField()">
                        Tambah
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="form-wrapper">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="nama_siswa">Nama Siswa</label>
                                        <input type="text" name="id_siswa[]"
                                               class="form-control input-sm"
                                               id="nama_siswa">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="nilai_siswa">Nilai Siswa</label>
                                        <input type="text" name="nilai_siswa[]"
                                               class="form-control input-sm"
                                               id="nilai_siswa">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="btn btn-primary btn-sm pull-right form-delete-btn"
                                             onclick="hapusForm(this)">Hapus
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn-info btn btn-sm pull-right">UPLOAD
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
		html = `
        <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="nama_siswa">Nama Siswa</label>
                                        <input type="text" name="id_siswa[]"
                                               class="form-control input-sm"
                                               id="nama_siswa">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="nilai_siswa">Nilai Siswa</label>
                                        <input type="text" name="nilai_siswa[]"
                                               class="form-control input-sm"
                                               id="nilai_siswa">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="btn btn-primary btn-sm pull-right form-delete-btn" onclick="hapusForm(this)">Hapus</div>
                                    </div>
                                </div>
                            </div>`;
		function tambahField () {
			$('#form-wrapper').append(html);
			return false;
		}

		function hapusForm (e) {
			e.closest('div.row').remove();
			return false;
		}
    </script>
<?php include_once "./../template/footer.php" ?>