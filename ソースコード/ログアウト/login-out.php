<?php
session_start();
?>
<?php require '../header.php'; ?>
<?php
$_SESSION=array();
session_destroy();
setcookie("cookie","",time() -30);

echo '<p>','ログアウトしました。','</p>';
?>
<form>
<a href="test"><button type="button">TOPページへ</button></a>
</form>
<?php require '../footer.php'; ?>