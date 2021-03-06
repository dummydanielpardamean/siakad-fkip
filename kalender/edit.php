<?php
include_once "./../connection.php";
include_once "./../middleware/adminOnly.php";
if ( ! empty($_POST)) {
	$content_halaman = htmlspecialchars($_POST['content_halaman'], ENT_QUOTES);
	$sql             = "update halaman set content_halaman='{$content_halaman}' WHERE nama_halaman='kalender'";
	$conn->query($sql);
} else {
	$sql             = "select content_halaman from halaman where nama_halaman='kalender'";
	$content_halaman = $conn->query($sql)->fetch_assoc()['content_halaman'];
}
?>
<?php include_once "./../template/header.php"; ?>
<div class="container div col-md-8 col-md-offset-2">
    <h3>Halaman Kalender</h3>
    <form style="margin-top: 20px" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <textarea name="content_halaman"
                  rows="15"><?= ! empty($content_halaman) ? $content_halaman : "" ?></textarea>
        <div class="form-group">
            <button style="margin-top: 10px;" class="btn btn-info btn-sm pull-right">
                SIMPAN
            </button>
        </div>
    </form>
</div>
<script src="/js/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({selector: 'textarea',
table_toolbar: "tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
plugins: "table",
  table_appearance_options: false
});
</script>
<?php include_once "./../template/footer.php"; ?>
