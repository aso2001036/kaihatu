<?php
session_start();
?>
<?php
try {
    $pdo = new PDO(
        'mysql:host=mysql147.phy.lolipop.lan;
    dbname=LAA1290630-gamesite;charaset=utf8',
        'LAA1290630',
        'PassGameASONY');
}catch(PDOException $e){
    echo "データベース接続エラー :".$e->getMessage();
    $error['db'] = $e->getMessage();
}
?>
<?php require '../header.php'; ?>
<form action = "" method = "post">
    <div class = "log-form">
        <div class = "fav-de">
            <img src = "カテゴリ1.jpg" width = 100 height = 100>
            <div class = "right">
                <p class = "title">カテゴリ1</p>
                <p class = "text">1500円</p>
                <input type = "submit" class = "buton" value = "カート内へ">
            </div>
        </div>
        <input type = "submit" value = "全てカート内へ">
        <ul class = "slider">
            <li><img src = "カテゴリ2.jpg"></li>
            <li><img src = "カテゴリ3.jpg"></li>
            <li><img src = "カテゴリ4.jpg"></li>
            <li><img src = "カテゴリ5.jpg"></li>
        </ul>
    </div>
</form>
<?php require '../footer.php'; ?>