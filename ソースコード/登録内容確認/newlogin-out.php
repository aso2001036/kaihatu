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

if (!isset($_SESSION['join'])) {
header('Location:../top/toppage.php');
exit();
}

if (!empty($_POST['check'])) {
// パスワードを暗号化
    $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);
    date_default_timezone_set('Asia/Tokyo');
    $date = date('Y-m-d H:i:s');

// 入力情報をデータベースに登録
    $statement = $pdo->prepare("INSERT INTO m_users SET user_id=?,user_name=?, user_name_kana=?, user_mail=?,user_postal_code=?,user_address=?,user_pass=?,reg_date=?");
    $statement->execute(array(
        $_SESSION['join']['id'],
        $_SESSION['join']['name'],
        $_SESSION['join']['furigana'],
        $_SESSION['join']['mail'],
        $_SESSION['join']['zipcode'],
        $_SESSION['join']['address'],
        $hash,
        $date
    ));

    unset($_SESSION['join']);   // セッションを破棄
    session_destroy();
    header('Location: ../top/toppage.php');
    // 移動させたいリンクを入力　修正必要
    exit();
}

require '../header.php';
?>

<?php
    echo '<form action="" method="post">';
    echo '<div class="new-login2">';
    echo '<input type="hidden" name="check" value="true">';
    echo '<h1>', '内容を確認してください', '</h1>';
    echo '<p>', htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES),'</p>';
    echo '<p>', htmlspecialchars($_SESSION['join']['furigana'], ENT_QUOTES), '</P>';
    echo '<p>', htmlspecialchars($_SESSION['join']['id'], ENT_QUOTES), '</p>';
    $cnt = Strlen(htmlspecialchars($_SESSION['join']['password'], ENT_QUOTES));
    for ($i = 0; $i < $cnt; $i++) {
        echo '*';
    }
    echo '<p>', htmlspecialchars($_SESSION['join']['mail'], ENT_QUOTES), '</p>';
    echo '<p>', htmlspecialchars($_SESSION['join']['zipcode'], ENT_QUOTES), '</p>';
    echo '<p>', htmlspecialchars($_SESSION['join']['address'], ENT_QUOTES), '</p>';
    echo '<button type="submit" name="action" value="send">', '登録', '</button>';
    echo '</div>';
    echo '</form>';
?>
<a href="../新規登録/newregistration.php">戻る</a>
<?php require '../footer.php'; ?>