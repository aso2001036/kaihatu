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
}

if (!isset($_SESSION['change'])) {
header('Location:../メール入力/MailInput.php');
exit();
}

if (!empty($_POST['check'])) {
// パスワードを暗号化
    $hash = password_hash($_SESSION['change']['password'], PASSWORD_BCRYPT);
    date_default_timezone_set('Asia/Tokyo');
    $date = date('Y-m-d H:i:s');

// 入力情報をデータベースに登録
    $statement = $pdo->prepare("update m_users SET user_id=?,user_name=?, user_name_kana=?, user_mail=?,user_postal_code=?,user_address=?,user_pass=?, upd_date=? where user_id=?");
    $flag = $statement->execute(array(
        $_SESSION['change']['id'],
        $_SESSION['change']['name'],
        $_SESSION['change']['furigana'],
        $_SESSION['change']['mail'],
        $_SESSION['change']['zipcode'],
        $_SESSION['change']['address'],
        $hash,
        $date,
        $_SESSION['user']['id']
    ));


    if($flag){
        $_SESSION['user']=[
            'id'=>$_SESSION['change']['id'],
            'name'=>$_SESSION['change']['name'],
            'name_kana' => $_SESSION['change']['furigana'],
            'address' =>$_SESSION['change']['address'],
            'postal_code'=>$_SESSION['change']['zipcode'],
            'mail' => $_SESSION['change']['mail']
        ];
        unset($_SESSION['change']);// セッションを破棄
        header('Location: ../myページ/mypage.php');
        // 移動させたいリンクを入力　修正必要
        exit();
    }
}

require '../header.php';
?>

<?php
    echo '<form action="" method="post">';
    echo '<div class="new-login2">';
    echo '<input type="hidden" name="check" value="true">';
    echo '<h1>', '内容を確認してください', '</h1>';
    echo '<p>', htmlspecialchars($_SESSION['change']['name'], ENT_QUOTES),'</p>';
    echo '<p>', htmlspecialchars($_SESSION['change']['furigana'], ENT_QUOTES), '</P>';
    echo '<p>', htmlspecialchars($_SESSION['change']['id'], ENT_QUOTES), '</p>';
    $cnt = Strlen(htmlspecialchars($_SESSION['change']['password'], ENT_QUOTES));
    for ($i = 0; $i < $cnt; $i++) {
        echo '*';
    }
    echo '<p>', htmlspecialchars($_SESSION['change']['mail'], ENT_QUOTES), '</p>';
    echo '<p>', htmlspecialchars($_SESSION['change']['zipcode'], ENT_QUOTES), '</p>';
    echo '<p>', htmlspecialchars($_SESSION['change']['address'], ENT_QUOTES), '</p>';
    echo '<button type="submit" name="action" value="send">', '変更', '</button>';
    echo '</div>';
    echo '</form>';
?>
<a href="../changeMyInformation/changeMyInformation.php">戻る</a>
<?php require '../footer.php'; ?>