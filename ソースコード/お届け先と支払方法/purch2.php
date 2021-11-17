<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/purch2.css">
</head>
<body>
<form action = "" method = "post">
    <form action = "" method = "post">
        <div class = "log-form">
            <h3>お届け先</h3>
            <?php
                echo '<p>';
                echo $_SESSION['user']['name'];
                echo $_SESSION['user']['postal_code'];
                echo $_SESSION['user']['address'];
                echo '</p>';
                ?>
            <button class="btn-pay" type = "submit">変更</button>
            <h3>支払方法</h3>
            <div class = "rad-fr">
                <input type = "radio" name = "radi" value = "con" />コンビニ払い<br>
                <input type = "radio" name = "radi" value = "cad" />カード払い<br>
            </div>
            <button class="btn-pay" type = "submit">確定</button>
        </div>
    </form>
</form>
</body>
</html>