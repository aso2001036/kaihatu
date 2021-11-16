<?php
session_start();

$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

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

$flag = false;

if(empty($_GET)) {

    if(isset($_SESSION['join']['token'])){
        if ($_SESSION['join']['token'] == ''){
            $error['urltoken'] = "トークンがありません。";
        }else{
            try{
                // DB接続
                //flagが0の未登録者 or 仮登録日から24時間以内
                $sql = "SELECT pre_user_mail FROM m_pre_users WHERE pre_user_token=(:pre_user_token) AND flag =0 AND reg_date > now() - interval 24 hour";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':pre_user_token', $_SESSION['join']['token'], PDO::PARAM_STR);
                $stm->execute();


                //レコード件数取得
                $row_count = $stm->rowCount();

                //24時間以内に仮登録され、本登録されていないトークンの場合
                if( $row_count ==1){
                    $mail_array = $stm->fetch();
                    $mail = $mail_array["pre_user_mail"];
                    $_SESSION['mail'] = $mail;
                    $urltoken = $_SESSION['join']['token'];
                    $flag = true;
                }else{
                    $error['urltoken_timeover'] = "このURLはご利用できません。有効期限が過ぎたかURLが間違えている可能性がございます。もう一度登録をやりなおして下さい。";
                }
                //データベース接続切断
                $stm = null;
            }catch (PDOException $e){
                print('Error:'.$e->getMessage());
                die();
            }
        }
    }else{
        header("Location: ../メール入力/MailInput.php");
        exit();
    }

}else{
    //GETデータを変数に入れる
    $urltoken = isset($_GET["urltoken"]) ? $_GET["urltoken"] : NULL;
    //メール入力判定
    if ($urltoken == ''){
        $error['urltoken'] = "トークンがありません。";
    }else{
        try{
            // DB接続
            //flagが0の未登録者 or 仮登録日から24時間以内
            $sql = "SELECT pre_user_mail FROM m_pre_users WHERE pre_user_token=(:pre_user_token) AND flag =0 AND reg_date > now() - interval 24 hour";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':pre_user_token', $urltoken, PDO::PARAM_STR);
            $stm->execute();


            //レコード件数取得
            $row_count = $stm->rowCount();

            //24時間以内に仮登録され、本登録されていないトークンの場合
            if( $row_count ==1){
                $mail_array = $stm->fetch();
                $mail = $mail_array["pre_user_mail"];
                $_SESSION['mail'] = $mail;
            }else{
                $error['urltoken_timeover'] = "このURLはご利用できません。有効期限が過ぎたかURLが間違えている可能性がございます。もう一度登録をやりなおして下さい。";
            }
            //データベース接続切断
            $stm = null;
        }catch (PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
    }
}

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
        $member = $pdo->prepare('SELECT COUNT(*) as cnt FROM m_users WHERE user_mail=?');
        $member->execute(array(
            $_POST['mail']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }

        $member = $pdo->prepare('SELECT COUNT(*) as cnt FROM m_users WHERE user_id=?');
        $member->execute(array(
            $_POST['id']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['id'] = 'duplicate';
        }

        /* エラーがなければ次のページへ */
        if (!isset($error)) {
            $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
            if(!isset($_SESSION['join']['token'])){
                $_SESSION['join']['token'] = $urltoken;
            }
            header('Location:../登録確認/newlogin-out.php');
            exit();
        }
    }

}

require '../header.php'; ?>

<?php if (!empty($_GET) || $flag):?>
  <?php if (isset($error['urltoken'])) :?>
    <div class="singUpInMail">
        <h2 class="singUpInputTitle">エラー</h2>
        <p class="singUpNotes"><?=$error['urltoken']?></p>
        <!-- <a href="login.php" class="beforePage">前のページへ戻る</a> -->
    </div>
<?php elseif (isset($error['urltoken_timeover'])  ): ?>
    <div class="singUpInMail">
        <h2 class="singUpInputTitle">エラー</h2>
        <p class="singUpNotes"><?=$error['urltoken_timeover']?></p>
        <!-- <a href="login.php" class="beforePage">前のページへ戻る</a> -->
    </div>
<?php else :?>

<form action="" method="post">
    <div class="new-login">
        <h1 class="new-login-title">新規登録</h1>
        <p>-登録情報を入力してください-</p>
        <input type="text" name="name" placeholder="氏名">
        <?php if (!empty($error["name"]) && $error['name'] === 'blank'): ?>
            <p class="error">＊氏名を入力してください</p>
        <?php endif ?>
        <input type="text" name="furigana" placeholder="フリガナ">
        <?php if (!empty($error["furigana"]) && $error['furigana'] === 'blank'): ?>
            <p class="error">＊フリガナを入力してください</p>
        <?php endif ?>
        <input type="text" name="id"placeholder="ID">
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
<input type="text" name="mail"placeholder="メール" value="<?php echo $mail ?>" readonly>
        <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
            <p class="error">＊メールアドレスを入力してください</p>
        <?php elseif (!empty($error["email"]) && $error['email'] === 'duplicate'): ?>
            <p class="error">＊このメールアドレスはすでに登録済みです</p>
        <?php endif ?>
        <input type="text" name="zipcode" placeholder="郵便番号">
        <?php if (!empty($error["zipcode"]) && $error['zipcode'] === 'blank'): ?>
            <p class="error">＊郵便番号を入力してください</p>
        <?php endif ?>
        <input type="text" name="address" placeholder="住所">
        <?php if (!empty($error["address"]) && $error['address'] === 'blank'): ?>
            <p class="error">＊住所を入力してください</p>
        <?php endif ?>
        <button type="submit" name="action" value="send">登録</button>
    </div>
</form>
    <?php endif; ?>
<?php endif; ?>
<?php require '../footer.php'; ?>
