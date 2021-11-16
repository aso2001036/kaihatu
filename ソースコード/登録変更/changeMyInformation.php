<?php
session_start();

$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

$flag = false;

if(isset($_SESSION['user']) || isset($_SESSION['change'])){
    $flag = true;
}

if(!$flag){
    header("Location: ../");
}

try {
    $pdo = new PDO(
        'mysql:host=mysql147.phy.lolipop.lan;
    dbname=LAA1290630-gamesite;charaset=utf8',
        'LAA1290630',
        'PassGameASONY');
}catch(PDOException $e){
    echo "データベース接続エラー :".$e->getMessage();
    $error['db'] = $e->getMessage();
};

if(!empty($_POST)){
    if($_POST['name'] === ""){
        $error['name'] = 'blank';
    }
    if($_POST['furigana'] === ""){
        $error['furigana'] = 'blank';
    }
    if($_POST['id'] === ""){
        $error['id'] = 'blank';
    }
    if($_POST['zipcode'] === ""){
        $error['zipcode'] = 'blank';
    }
    if($_POST['address'] === ""){
        $error['address'] = 'blank';
    }
    if($_POST['password'] === "" || $_POST['saipassword'] === "" ){
        $error['password'] = 'blank';
    }elseif(strcmp($_POST['password'], $_POST['saipassword'])){
        $error['password'] = 'notSame';
    }

    if(!isset($error)){
        if($_SESSION['user']['mail'] != $_POST['mail']){
            $member = $pdo->prepare('SELECT COUNT(*) as cnt FROM m_users WHERE user_mail=?');
            $member->execute(array(
                $_POST['mail']
            ));
            $record = $member->fetch();
            if ($record['cnt'] > 0) {
                $error['email'] = 'duplicate';
            }
        }

        if($_SESSION['user']['id'] != $_POST['id']){
            $member = $pdo->prepare('SELECT COUNT(*) as cnt FROM m_users WHERE user_id=?');
            $member->execute(array(
                $_POST['id']
            ));
            $record = $member->fetch();
            if ($record['cnt'] > 0) {
                $error['id'] = 'duplicate';
            }
        }

        /* エラーがなければ次のページへ */
        if (!isset($error)) {
            $_SESSION['change'] = $_POST;
            header('Location: ../checkMyInformation/checkMyInformation.php');
            exit();
        }
    }

}

require '../header.php'; ?>

<?php if ($flag):?>
<form action="" method="post">
    <div class="new-login">
        <h1 class="new-login-title">登録情報変更</h1>
        <p>-登録情報を入力してください-</p>
<input type="text" name="name" placeholder="氏名"value="<?php echo $_SESSION['user']['name']?>">
        <?php if (!empty($error["name"]) && $error['name'] === 'blank'): ?>
            <p class="error">＊氏名を入力してください</p>
        <?php endif ?>
<input type="text" name="furigana" placeholder="フリガナ" value="<?php echo $_SESSION['user']['name_kana']?>">
        <?php if (!empty($error["furigana"]) && $error['furigana'] === 'blank'): ?>
            <p class="error">＊フリガナを入力してください</p>
        <?php endif ?>
<input type="text" name="id"placeholder="ID" value="<?php echo $_SESSION['user']['id']?>">
        <?php if (!empty($error["id"]) && $error['id'] === 'blank'): ?>
            <p class="error">＊IDを入力してください</p>
        <?php elseif (!empty($error["id"]) && $error['id'] === 'duplicate'): ?>
            <p class="error">＊このIDはすでに登録済みです</p>
        <?php endif ?>
        <input type="password" name="password" placeholder="PASS">
        <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
            <p class="error">＊パスワードを入力してください</p>
        <?php endif ?>
        <?php if (!empty($error["password"]) && $error['password'] === 'notSame'): ?>
            <p class="error">＊パスワードが一致しません</p>
        <?php endif ?>
        <input type="password" name="saipassword" placeholder="PASS(再入力)">
<input type="text" name="mail"placeholder="メール" value="<?php echo $_SESSION['user']['mail']?>" readonly>
        <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
            <p class="error">＊メールアドレスを入力してください</p>
        <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
            <p class="error">＊このメールアドレスはすでに登録済みです</p>
        <?php endif ?>
<input type="text" name="zipcode" placeholder="郵便番号" value="<?php echo $_SESSION['user']['postal_code']?>">
        <?php if (!empty($error["zipcode"]) && $error['zipcode'] === 'blank'): ?>
            <p class="error">＊郵便番号を入力してください</p>
        <?php endif ?>
<input type="text" name="address" placeholder="住所" value="<?php echo $_SESSION['user']['address']?>">
        <?php if (!empty($error["address"]) && $error['address'] === 'blank'): ?>
            <p class="error">＊住所を入力してください</p>
        <?php endif ?>
        <button type="submit" name="action" value="send">登録</button>
    </div>
</form>
<?php else :?>
<?php endif; ?>
<?php require '../footer.php'; ?>
