<?php
include_once "./../connection.php";

if (!empty($_GET)){
	$id = $_GET['id'];
	$matpel = $_GET['matpel'];
	$tahun = $_GET['tahun'];
	$sql = "delete from nilai where id='{$id}'";
	if ($conn->query($sql)){
		header("location: /nilai/tampil.php?matpel={$matpel}&tahun={$tahun}");
	}else{
		header("location: /nilai/tampil.php?matpel={$matpel}&tahun={$tahun}");
	}
}