<?php require '../header.php';?>
<form action = "" method = "post">
    <form action = "" method = "post">
        <div class = "log-form">
            <h3>お届け先</h3>
            <?php

            ?>
            <button type = "submit">変更</button>
            <h3>支払方法</h3>
            <div class = "rad-fr">
                <input type = "radio" name = "radi" value = "con" />コンビニ払い<br>
                <input type = "radio" name = "radi" value = "cad" />カード払い<br>
            </div>
            <button type = "submit">確定</button>
        </div>
    </form>

</form>
<?php require '../footer.php';?>