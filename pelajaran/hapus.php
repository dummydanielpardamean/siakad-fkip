<?php
include_once "./../connection.php";
if ( ! empty($_GET)) {
	$id = $_GET['id'];

	$sql = "delete from mata_pelajaran where id='{$id}'";
	if ($conn->query($sql)) {
		header('location: /pelajaran');
		die();
	}
}