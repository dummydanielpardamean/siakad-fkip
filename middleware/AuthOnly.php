<?php
if ( ! isset($_SESSION['id_pengguna'])) {
	header('location: /');
	die();
}