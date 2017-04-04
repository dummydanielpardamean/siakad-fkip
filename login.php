<?php
include_once "./connection.php";
include_once "./middleware/onlyGuest.php";

$errors = array();

if ( ! empty($_POST)) {
	$id_pengguna = trim($_POST['id_pengguna']);
	$password    = md5(trim($_POST['password']));

	if ( ! empty($_POST['type'])) {
		$sql    = "SELECT * from guru where id_pengguna='{$id_pengguna}' AND password='{$password}'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$assoc                   = $result->fetch_assoc();
			$_SESSION['id_pengguna'] = $assoc['id_pengguna'];
			if ($assoc['admin'] == '1') {
				$_SESSION['admin'] = true;
			}
			header('location: /');
		} else {
			$errors[] = "<strong>Terjadi Kesalahan saat login!</strong> Pastikan semua kolom terisi dan cocok.";
		}
	} else {
		$sql    = "SELECT * from siswa where id_pengguna='{$id_pengguna}' AND password='{$password}'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$assoc                   = $result->fetch_assoc();
			$_SESSION['id_pengguna'] = $assoc['id_pengguna'];
			$_SESSION['siswa']       = true;
			header('location: /');
		} else {
			$errors[] = "<strong>Terjadi Kesalahan saat login!</strong> Pastikan semua kolom terisi dan cocok.";
		}
	}
}

include_once "./template/header.php";
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 form-container">
                <h4 class="text-center">Form Login</h4>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="form-group">
                        <label for="id_pengguna">ID Pengguna</label>
                        <input type="text" name="id_pengguna"
                               class="form-control input-sm"
                               id="id_pengguna">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password"
                               class="form-control input-sm"
                               id="password">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="type" autocomplete="off" checked> Guru
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info btn-sm pull-right">LOGIN</button>
                    </div>
                </form>
                <br><br>
	            <?php if ( ! empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
				            <?php foreach ( $errors as $error ): ?>
                                <li><?= $error ?></li>
				            <?php endforeach; ?>
                        </ul>
                    </div>
	            <?php endif; ?>
            </div>
        </div>
    </div>
<?php include_once "./template/footer.php" ?>