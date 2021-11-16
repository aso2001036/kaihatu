<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
    <title>ECサイト（仮）</title>
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="../button.css">
<link rel="stylesheet" href="../header.css">
</head>
<body>
<header>
    <div class="serch" id="serch">
        <span class="magnifying_glass"></span>
    </div>
    <div class="text_wrapper" id="text_wrapper">
        <div class="text">
            <input type="text" value="探しものはなんですか" >
        </div>
    </div>
    <h1 class="title" id="title"><a href="../top/toppage">あSONY</h1></a>
    <div class="ham" id="ham">
        <span class="ham_line ham_line1"></span>
        <span class="ham_line ham_line2"></span>
        <span class="ham_line ham_line3"></span>
    </div>

    <div class="menu_wrapper" id="menu_wrapper">
        <script type="text/javascript"
                src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js">
        </script>
        <div class="menu">
            <div class="menu_img">
            <ul>
                <a href="#2"><img src="../img/Frame%2011.png" alt="お気に入り" class="menu_favo"></a>
               <a href="../top/toppage.php"><img src="../img/Group%205.png" alt="カテゴリ" class="menu_kategorry"></a>
            </ul>
        </div>
            <div class="txt-hide">
                <ul>
                    <?php
                    if(!isset($_SESSION['user'])){echo '<li><h3><a href="../login/login-in.php">ログイン</a></h3></li>';}
                    else{echo '<li><h3><a href="../logout/login-out.php">ログアウト</a></h3></li>';}
                    ?>
                    <li><h3><a href="#5">カート</a></h3></li>
                    <li><h3><a href="../q_a/Q&A.php">お問い合わせ</a></h3></li>
                    <li><h3><a href="../制作者情報/editorINF.php">製作者情報</a></h3></li>
                </ul>
            </div>
            <button class="more" name="hm_button"></button>
        </div>
    </div>
</header>