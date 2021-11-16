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

$passFlag = false;
$idFlag = false;
$flag = false;

if(!empty($_POST)){
$id = htmlspecialchars($_POST['ID']);
$pass = htmlspecialchars($_POST['PASS']);
    $statement = $pdo->prepare("select user_pass from m_users where user_id=? ");
    $statement->execute(array(
        $id,
    ));
    foreach ($statement as $row) {
        $hash = $row['user_pass'];
        $idFlag = true;
        $passFlag = password_verify($pass,$hash);
    }

    if($idFlag && $passFlag){
      $statement = $pdo->prepare("select * from m_users where user_id=?");
      $statement->execute(array(
          $id
      ));
      foreach ($statement as $row) {
        $_SESSION['user']=[
            'id'=>$row['user_id'],
            'name'=>$row['user_name'],
            'name_kana' => $row['user_name_kana'],
            'address' =>$row['user_address'],
            'postal_code'=>$row['user_postal_code'],
            'mail' => $row['user_mail']
        ];
        $flag = true;
      }
    }
}

if($flag && isset($_SESSION['user'])){
    header("Location: ../top/toppage.php");
}


require '../header.php';
?>
<?php if (empty($_POST))  : ?>
<form method="post" action="">
    <div class="log-form">
        <h1 class="login-title">ログイン</h1>
        <input type="ID" name="ID" placeholder="ID">
        <input type="password" name="PASS" placeholder="PASS">
        <button type="submit" name="action" value="send">ログイン</button>
    </div>
</form>
<?php else: ?>
<?php if ($flag) : ?>
<p>ようこそ<?php echo $_SESSION['user']['name'] ?>さん</p>
<?php else: ?>
<p>ログインが失敗しました。もう一度入力してください。</p>
        <form method="post" action="">
            <div class="log-form">
                <h1 class="login-title">ログイン</h1>
                <input type="ID" name="ID" placeholder="ID">
                <input type="password" name="PASS" placeholder="PASS">
                <button type="submit" name="action" value="send">ログイン</button>
            </div>

        </form>
<?php endif; ?>

<?php endif; ?>
<?php require '../footer.php'; ?>

