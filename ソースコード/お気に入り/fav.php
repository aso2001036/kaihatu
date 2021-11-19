<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel = "stylesheet" href = "fav.css">
</head>
<body>
<form action = "" method = "post">
    <div class = "log-form">
        <?php
        $pdo = new PDO('mysql:host=mysql152.phy.lolipop.lan;
                                dbname=LAA1290559-school;charset=utf8',
            'LAA1290559',
            'PhsUdsd13200133');

        if(isset($_POST['delete'])){
            $sql=$pdo->prepare("delete from fav where id=?");
            $sql->bindParam(1,$_POST['delete']);
            $sql->execute();
        }

        foreach($pdo->query('select * from fav') as $row) {
            echo '<div class = fav-de>';
            echo '<button type = "submit" name = "delete" value = "',$row['id'],'">削除</button>';
            echo '<img src = "', $row['img'], '" width = "150" height = "150"><br>';
            echo '<div class = "right">';
            echo '<p class = "title">',$row['name'], '</p><br>';
            echo '<p class = "text">',$row['price'], '円</p><br>';
            echo '<input type = "submit" name = "bon" value = "カート内へ">';
            echo '</div>';
            echo '</div>';
        }
        ?>
    <input type = "submit" value = "全てカート内へ">
    <ul class = "slider">
        <li><img src = "カテゴリ2.jpg"></li>
        <li><img src = "カテゴリ3.jpg"></li>
        <li><img src = "カテゴリ4.jpg"></li>
        <li><img src = "カテゴリ5.jpg"></li>
    </ul>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script><script src="fav.js"></script>
</body>
</html>
