<?php
session_start();

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
    if($_POST['mail'] === ""){
        $error['email'] = 'blank';
    }
    else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['mail'])){
        $error['email'] = "notMatch";
    }
    if(!isset($error)){
        $member = $pdo->prepare('SELECT COUNT(*) as cnt FROM m_users WHERE user_mail=?');
        $member->execute(array(
                $_POST['mail']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }
    }
    if(!isset($error)){
        $urltoken = hash('sha256',uniqid(rand(),1));
        $url = "http://aso2001036.heavy.jp/systemkaihatu/new-input/newregistration.php?urltoken=".$urltoken;
        //ここでデータベースに登録する
        try{
            //例外処理を投げる（スロー）ようにする
            $sql = "INSERT INTO m_pre_users (pre_user_token, pre_user_mail, reg_date, flag) VALUES (:pre_user_token, :pre_user_mail, now(), '0')";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':pre_user_token', $urltoken, PDO::PARAM_STR);
            $stm->bindValue(':pre_user_mail', $_POST['mail'], PDO::PARAM_STR);
            $stm->execute();
            $pdo = null;
            $message = "メールをお送りしました。24時間以内にメールに記載されたURLからご登録下さい。";
        }catch (PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
        /*
        * メール送信処理
        * 登録されたメールアドレスへメールをお送りする。
        * 今回はメール送信はしないためコメント
        */
        $companyname = 'テスト';
        $companymail = 'info@aso2001026.itigo.jp';
        $registation_subject ='本人確認メール';
        $mailTo = $_POST['mail'];
        $body = <<< EOM
            この度はご登録いただきありがとうございます。
            24時間以内に下記のURLからご登録下さい。
            {$url}
EOM;
        mb_language('ja');
        mb_internal_encoding('UTF-8');

        //Fromヘッダーを作成
        $header = 'From: ' . mb_encode_mimeheader($companyname). ' <' . $companymail. '>';

        if(mb_send_mail($mailTo, $registation_subject, $body, $header, '-f'. $companymail)){
            //セッション変数を全て解除
            $_SESSION = array();
            //クッキーの削除
            if (isset($_COOKIE["PHPSESSID"])) {
                setcookie("PHPSESSID", '', time() - 1800, '/');
            }
            //セッションを破棄する
            session_destroy();
            $message = "メールをお送りしました。24時間以内にメールに記載されたURLからご登録下さい。";
        }

    }
}

require '../header.php';
?>
<?php if (!empty($_POST) && !isset($error)): ?>
    <div class="singUpInMail">
        <h2 class="singUpInputTitle">認証メール送信</h2>
        <p class="singUpNotes"><?=$message?></p>
        <!--<p>↓TEST用(後ほど削除)：このURLが記載されたメールが届きます。</p>
        <a href="<?=$url?>"><?=$url?></a>-->
        <!-- <a href="login.php" class="beforePage">前のページへ戻る</a> -->
    </div>
<?php else: ?>
    <form action="" method="post">
        <div class="new-login">
            <h1 class="new-login-title">メール入力</h1>
            <p>-メールアドレスを入力してください-</p>
            <input type="text" name="mail" placeholder="メール">
            <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                <p class="error">＊メールアドレスを入力してください</p>
            <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
                <p class="error">＊このメールアドレスはすでに登録済みです</p>
            <?php elseif (!empty($error["email"]) && $error['email'] === 'notMatch'): ?>
                <p class="error">＊メールアドレスの形式が正しくありません</p>
            <?php endif ?>
            <button type="submit" name="action" value="send">登録</button>
        </div>
    </form>
<?php endif; ?>
<?php
$pdo = null;
require '../footer.php';
?>