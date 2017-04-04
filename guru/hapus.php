<?php
include_once "./../connection.php";
if ( ! empty($_GET)) {
	$id_pengguna = $_GET['id_pengguna'];

	$sql = "delete from guru where id_pengguna='{$id_pengguna}'";
	if ($conn->query($sql)) {
		header('location: /guru');
		die();
	}
}