<?php require '../header.php'; ?>
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
$sql = $pdo -> prepare("select item_name,item_image1,item_explanation,item_price from m_shopitems where item_id = ?");
$sql -> execute($_GET[]);
$name = $sql['item_name'];
$value = $sql['item_price'];
$img = $sql['item_image1'];
$setumei = $sql['item_explanation'];
?>
<script src = "slid.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<body>
<div class="syosai">
<div class = "log-form">
    <div id = "btn" class = "btn-on"
         onclick="OnSampleButtonClick()">
    </div>
    <div class = "img-fi">
        <ul id = "featured_img" class = "slider">
            <li><img src = "main.jpg"></li>
            <li><img src = "main1.jpg"></li>
            <li><img src = "main2.jpg"></li>
            <li><img src = "main3.jpg"></li>
        </ul>
    </div>
    <a href = ""><input type = "button" value = "カートに入れる"></a>
    <div class = "detail-fr">

    </div>
    <div class = "su-det">
        <ul id = "feature_img" class = "osu">
            <li><img src = "カテゴリ1.jpg"></li>
            <li><img src = "カテゴリ2.jpg"></li>
            <li><img src = "カテゴリ3.jpg"></li>
            <li><img src = "カテゴリ4.jpg"></li>
        </ul>
    </div>
    <h3>口コミ</h3>
    <div id = "evl" class = "eval">
        <span class = "elva">
            <input id = "1" type = "radio" name = "reveiw"><label for = "1">★</label>
            <input id = "2" type = "radio" name = "reveiw"><label for = "2">★</label>
            <input id = "3" type = "radio" name = "reveiw"><label for = "3">★</label>
            <input id = "4" type = "radio" name = "reveiw"><label for = "4">★</label>
            <input id = "5" type = "radio" name = "reveiw"><label for = "5">★</label>
        </span>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="slid.js"></script>
<?php require '../footer.php'; ?>
