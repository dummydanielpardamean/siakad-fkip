<?php
if (isset($_SESSION['admin'])) {
	header('location: /nilai');
	die();
}