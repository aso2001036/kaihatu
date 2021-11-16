<?php
session_start();
?>
<?php require '../header.php'; ?>
<div class="message">
    <p>ようこそ<?php if(isset($_SESSION['user'])){echo $_SESSION['user']['name'];}
else{echo 'ゲスト';} ?>さん！！</p>
</div>
<ul class="slider">
    <li><a href="text"><img src="img/アルセウス.jpg" alt=""></a></li>
    <li><a href="text"><img src="img/ダイパ.jpg" alt=""></a></li>
    <li><a href="text"><img src="img/nintendoswitch.jpg" alt=""></a></li>
    <li><a href="text"><img src="img/hajipro.jpg" alt=""></a></li>
</ul>
<div class="separation"></div>
<div class="recommendation">
    <h2 class="recommendation-tag">おすすめ商品</h2>
    <ul class="recommendation-ul">
        <li class="recommendation-list">
            <a href="test" class="re-link">
                <div class="re-item">
                    <img src="img/minecraft.jpg" alt="MINECRAFT">
                    <h3 class="re-item-title">MINECRAFT</h3>
                    <div class="re-item-price">
                        <span>3960</span>
                        <small>円</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="recommendation-list">
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
        <a href="test" class="re-link">
            <div class="re-item">
                <img src="img/ポケモンアルセウス.jpg" alt="ポケットモンスターレジェンド　アルセウス">
                <h3 class="re-item-title">ポケットモンスターレジェンド　アルセウス</h3>
                <div class="re-item-price">
                    <span>6578</span>
                    <small>円</small>
                </div>
            </div>
        </a>
    </li>
    </ul>
</div>
<div class="separation"></div>
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
<?php require '../footer.php'; ?>