<?php
if (isset($_SESSION['siswa'])){
	if ( ! empty($_SESSION['id_pengguna'])) {
		$id_pengguna  = $_SESSION['id_pengguna'];
		$sql  = "select nama from siswa WHERE id_pengguna='{$id_pengguna}'";
		$nama = $conn->query($sql)->fetch_assoc()['nama'];
	}
}else{
	if ( ! empty($_SESSION['id_pengguna'])) {
		$id_pengguna  = $_SESSION['id_pengguna'];
		$sql  = "select nama from guru WHERE id_pengguna='{$id_pengguna}'";
		$nama = $conn->query($sql)->fetch_assoc()['nama'];
	}
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/journal.css">
    <link rel="stylesheet" href="/css/custom.css">
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <title>Siakad</title>
</head>
<body>
<nav class="navbar navbar-default navigation-component">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Siakad</a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="/jadwal">Jadwal</a></li>
            <li><a href="/kalender">Kalender Akademik</a></li>
            <li><a href="/supervisi">Supervisi Guru</a></li>
        </ul>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
				<?php if ( ! empty($_SESSION['id_pengguna'])): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true"
                           aria-expanded="false"><?= $nama ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/nilai">Nilai Siswa</a></li>
							<?php if (isset($_SESSION['admin'])): ?>
                                <li><a href="/pelajaran">Mata pelajaran</a></li>
                                <li><a href="/guru">Guru</a></li>
                                <li><a href="/siswa">Siswa</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/jadwal/edit.php">Edit Halaman Jadwal</a>
                                </li>
                                <li><a href="/kalender/edit.php">Edit Halaman Kalender
                                Akademik</a></li>
                                <li><a href="/supervisi/edit.php">Edit Halaman Supervisi
                                Guru</a></li>
							<?php endif; ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="/logout.php">Logout</a></li>
                        </ul>
                    </li>
				<?php else: ?>
                    <li><a href="/login.php">Login</a></li>
				<?php endif; ?>
            </ul>
        </div>
    </div>
</nav>