<?php
include_once "./../connection.php";
if ( ! empty($_POST)) {
	$id          = $_POST['id'];
	$nomor_siswa  = $_POST['nomor_siswa'];
	$nilai_siswa = $_POST['nilai_siswa'];

	$matpel = $_POST['matpel'];
	$tahun  = $_POST['tahun'];

	$sql = "update nilai set id_siswa='{$nomor_siswa}', nilai='{$nilai_siswa}' WHERE id='{$id}'";
	if ($conn->query($sql) AND false) {
		header("location: /nilai/tampil.php?matpel={$matpel}&tahun={$tahun}");
	}
} else {
	if (isset($_GET['id'])) {
		$id  = $_GET['id'];
		$sql = "select * from nilai WHERE id='{$id}'";

		$result = $conn->query($sql)->fetch_assoc();
	}
}
include_once "./../template/header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 form-container">
            <h4>Edit Nilai Siswa</h4>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="hidden" name="matpel" value="<?= $_GET['matpel'] ?>">
                <input type="hidden" name="tahun" value="<?= $_GET['tahun'] ?>">
                <div class="form-group">
                    <label for="nomor_siswa">Nomor Siswa</label>
                    <input type="text" name="nomor_siswa"
                           class="form-control input-sm"
                           id="nomor_siswa" value="<?= $result['id_siswa'] ?>">
                </div>
                <div class="form-group">
                    <label for="nilai_siswa">Nilai Siswa</label>
                    <input type="text" name="nilai_siswa"
                           class="form-control input-sm"
                           id="nilai_siswa" value="<?= $result['nilai'] ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-sm pull-right">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once "./../template/footer.php" ?>
