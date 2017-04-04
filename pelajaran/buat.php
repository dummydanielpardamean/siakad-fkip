<?php
include_once "./../connection.php";

if (!empty($_POST)){
	$nama = ucwords(trim($_POST['nama']));

	$sql = "insert into mata_pelajaran (nama) VALUES ('{$nama}')";

	if ($conn->query($sql)){
		header('location: /pelajaran');
		die();
	}else{
	    $errors[] = "Terjadi Kesalahan didalam memasukkan data.";
    }
}

include_once "./../template/header.php" ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 form-container">
				<form action="<?= $_SERVER['PHP_SELF'] ?>" METHOD="post">
					<div class="form-group">
						<label for="nama">Nama Mata Pelajaran</label>
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