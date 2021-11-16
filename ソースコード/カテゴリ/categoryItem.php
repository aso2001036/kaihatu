<?php
session_start();
?>
<?php require '../header.php'; ?>
<div class="category">
<h1 class="categoryTitle">カテゴリー名</h1>
<div class="content">
    <a href="../商品詳細/slid.php">
        <div class="item">
        <img class="itemImage" src="./img/test.png">
        <div class="itemExplanation">
            <h2>商品名</h2>
            <p>販売会社</p>
            <h2>値段</h2>
        </div></a>
    </div>
    <div class="item">
        <img class="itemImage" src="./img/test.png">
        <div class="itemExplanation">
            <h2>商品名</h2>
            <p>販売会社</p>
            <h2>値段</h2>
        </div>
    </div>
    <div class="item">
        <img class="itemImage" src="./img/test.png"><div class="itemExplanation">
            <h2>商品名</h2>
            <p>販売会社</p>
            <h2>値段</h2>
        </div>
    </div>
</div>
</div>
<?php require '../footer.php'; ?>