<?php
include_once "./../connection.php";
$sql             = "select content_halaman from halaman where nama_halaman='jadwal'";
$content_halaman = $conn->query($sql)->fetch_assoc()['content_halaman'];
?>
<?php include_once "./../template/header.php"; ?>
<div class="container div col-md-8 col-md-offset-2">
    <h1>Jadwal</h1>
	<?= htmlspecialchars_decode($content_halaman, ENT_QUOTES) ?>
</div>
<script type="text/javascript">
    $('div.container table').addClass('table table-condensed table-bordered');
</script>
<?php include_once "./../template/footer.php"; ?>
