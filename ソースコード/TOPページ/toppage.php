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
<div class="subete">
<ul class="slider">
  <li><img src="img/アルセウス.jpg" alt=""></li>
    <li><img src="img/ダイパ.jpg" alt=""></li>
    <li><img src="img/nintendoswitch.jpg" alt=""></li>
    <li><img src="img/hajipro.jpg" alt=""></li>
    <!--/slider--></ul>
<div class="separation"></div>
<div class="top-container">
<div class="top-category">
    <h2 class="top-category-name">カテゴリーから探す</h2>
    <ul class="top-category-list">
        <li class="top-category-item">
            <a href="../category/categoryItem.php" class="top-category-link">
            <div class="top-category-label">ソフト</div>
            <div class="top-category-imgArea">
                <div class="category-img">
                    <img src="img/soft.jpg" alt=""></div>
            </div>
            </a>
        </li>
        <li class="top-category-item">
            <a href="../category/categoryItem.php" class="top-category-link">
            <div class="top-category-label">周辺機器</div>
            <div class="top-category-imgArea">
                <div class="category-img">
                    <img src="img/syuhenkiki.jpg" alt=""></diV>
            </div>
            </a>
        </li>
        <li class="top-category-item">
            <a href="../category/categoryItem.php" class="top-category-link">
            <div class="top-category-label">本体</div>
            <div class="top-category-imgArea">
                <div class="category-img">
                    <img src="img/syuhenkiki.jpg" alt=""></diV>
            </div>
            </a>
        </li>
        <li class="top-category-item">
            <a href="../category/categoryItem.php" class="top-category-link">
            <div class="top-category-label">グッズ</div>
            <div class="top-category-imgArea">
                <div class="category-img">
                    <img src="img/soft.jpg" alt=""></diV>
            </div>
            </a>
        </li>
    </ul>
</div>
</div>
<div class="separation"></div>
<div class="recommendation">
    <h2 class="recommendation-tag">おすすめ商品</h2>
    <ul class="recommendation-ul">
        <li class="recommendation-list">
            <a href="test" class="re-link">
                <div class="re-item">
                    <img src="img/minecraft.jpg">
                <h3 class="re-item-title">MINECRAFT</h3>
                    <div class="re-item-price">
                    <span>3960</span>
                    <small>円</small>
                    </div>
                </div>
            </a>
        </li>
        <!--<li class="recommendation-list">
            <a href="test" class="re-link">
                <div class="re-item">
                    <img src="img/RISE.jpg" alt="MONSTER HUNTER RISE">
                    <h3 class="re-item-title">MONSTER HUNTER RISE</h3>
                    <div class="re-item-price">
                        <span>5990</span>
                        <small>円</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="recommendation-list">
            <a href="test" class="re-link">
                <div class="re-item">
                    <img src="img/undertale.jpg" alt="UNDERTALE">
                    <h3 class="re-item-title">UNDERTALE</h3>
                    <div class="re-item-price">
                        <span>1620</span>
                        <small>円</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="recommendation-list">
            <a href="test" class="re-link">
                <div class="re-item">
                    <img src="img/あつ森.jpg" alt="あつまれどうぶつの森">
                    <h3 class="re-item-title">あつまれどうぶつの森</h3>
                    <div class="re-item-price">
                        <span>6578</span>
                        <small>円</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="recommendation-list">
            <a href="../商品詳細/slid.php" class="re-link">
                <div class="re-item">
                    <img src="img/ソード.jpg" alt="ポケットモンスター　ソード">
                    <h3 class="re-item-title">ポケットモンスター　ソード</h3>
                    <div class="re-item-price">
                        <span>6578</span>
                        <small>円</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="recommendation-list">
            <a href="test" class="re-link">
                <div class="re-item">
                    <img src="img/シールド.jpg" alt="ポケットモンスター　シールド">
                    <h3 class="re-item-title">ポケットモンスター　シールド</h3>
                    <div class="re-item-price">
                        <span>6578</span>
                        <small>円</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="recommendation-list">
            <a href="test" class="re-link">
                <div class="re-item">
                    <img src="img/ブレワイ.jpg" alt="ゼルダの伝説　ブレス オブ ザ ワイルド">
                    <h3 class="re-item-title">ゼルダの伝説　ブレス オブ ザ ワイルド</h3>
                    <div class="re-item-price">
                        <span>7678</span>
                        <small>円</small>
                    </div>
                </div>
            </a>
        </li>-->
    </ul>
</div>
<div class="ranking">
    <h2>人気ランキング</h2>
    <ul class="ra-ul">
        <li class="ra-li">
            <a href="test" class="ra-link">
                <div class="ra-box">
                    <div class="num1-box">
                <div class="ra-num">1</div>
                </div>
                    <div class="ra-img">
                    <img src="img/ダイアモンド.jpg" alt="ポケットモンスター　ブリリアントダイアモンド">
                    </div>
                    <h3 class="ra-item-title">ポケットモンスター　ブリリアントダイアモンド</h3>
                    <div class="ra-item-price">
                        <span>6578</span>
                        <small>円</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="ra-li">
            <a href="test" class="ra-link">
                <div class="ra-box">
                    <div class="num2-box">
                        <div class="ra-num">2</div>
                    </div>
                    <div class="ra-img">
                        <img src="img/パール.jpg" alt="ポケットモンスター　シャイニングパール">
                    </div>
                </div>
                <h3 class="ra-item-title">ポケットモンスター　シャイニングパール</h3>
                <div class="ra-item-price">
                    <span>6578</span>
                    <small>円</small>
                </div>
            </a>
        </li>
        <li class="ra-li">
            <a href="test" class="ra-link">
                <div class="ra-box">
                    <div class="num3-box">
                        <div class="ra-num">3</div>
                    </div>
                    <div class="ra-img">
                        <img src="img/ポケモンアルセウス.jpg" alt="ポケットモンスター　レジェンドアルセウス">
                    </div>
                </div>
                <h3 class="ra-item-title">ポケットモンスター　レジェンドアルセウス</h3>
                <div class="ra-item-price">
                    <span>7678</span>
                    <small>円</small>
                </div>
            </a>
        </li>
        <li class="ra-li">
            <a href="test" class="ra-link">
                <div class="ra-box">
                    <div class="num-box">
                        <div class="ra-num">4</div>
                    </div>
                    <div class="ra-img">
                        <img src="img/あつ森.jpg" alt="あつまれどうぶつの森">
                    </div>
                </div>
                <h3 class="ra-item-title">あつまれどうぶつの森</h3>
                <div class="ra-item-price">
                    <span>6578</span>
                    <small>円</small>
                </div>
            </a>
        </li>
        <li class="ra-li">
            <a href="test" class="ra-link">
                <div class="ra-box">
                    <div class="num-box">
                        <div class="ra-num">5</div>
                    </div>
                    <div class="ra-img">
                        <img src="img/ブレワイ.jpg" alt="ゼルダの伝説　ブレスオブザワイルド">
                    </div>
                </div>
                <h3 class="ra-item-title">ゼルダの伝説　ブレスオブザワイルド</h3>
                <div class="ra-item-price">
                    <span>7678</span>
                    <small>円</small>
                </div>
            </a>
        </li>
    </ul>
</div>
</div>
<?php require '../footer.php'; ?>