<?php
include_once "./../connection.php";

if (!empty($_POST)){
	$id_pengguna = trim($_POST['id_pengguna']);
	$password = md5(trim($_POST['password']));
	$nama = ucwords(trim($_POST['nama']));

	$sql = "insert into siswa (id_pengguna, password, nama) VALUES ('{$id_pengguna}', '{$password}', '{$nama}')";

	if ($conn->query($sql)){
		header('location: /siswa');
		die();
	}else{
	    $errors[] = "Terjadi kesalahan didalam memasukkan data.";
    }
}

include_once "./../template/header.php" ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form action="<?= $_SERVER['PHP_SELF'] ?>" METHOD="post">
					<div class="form-group">
						<label for="nis">NIS</label>
						<input type="text" name="id_pengguna"
						       class="form-control input-sm"
						       id="nis">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password"
						       class="form-control input-sm"
						       id="password">
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama"
						       class="form-control input-sm"
						       id="nama">
					</div>
					<div class="form-group">
						<button class="btn btn-sm btn-info pull-right">BUAT</button>
					</div>
				</form>
                <br><br>
                <?php include_once "./../alert.php"?>
			</div>
		</div>
	</div>
<?php include_once "./../template/footer.php" ?>