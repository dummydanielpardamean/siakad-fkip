<?php
include_once "./../connection.php";
if ( ! empty($_GET)) {
	$id_pengguna = $_GET['id_pengguna'];

	$sql = "delete from siswa where id_pengguna='{$id_pengguna}'";
	if ($conn->query($sql)) {
		header('location: /siswa');
		die();
	}
}