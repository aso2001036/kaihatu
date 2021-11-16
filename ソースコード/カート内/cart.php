<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=mysql152.phy.lolipop.lan;
      dbname=LAA1290611-school;charset=utf8',
    'LAA1290611',
    '1964519t');
?>
    <h1>ショッピングカート</h1>
    <div class="shopping-cart">
        <div class="column-labels">
            <label class="product-image">Image</label>
            <label class="product-details">Product</label>
            <label class="product-price">Price</label>
            <label class="product-quantity">Quantity</label>
            <label class="product-removal">Remove</label>
            <label class="product-line-price">Total</label>
        </div>
        <?php
        foreach($pdo->query('select * from favorite') as $row) {
            echo '<div class="product">';
            echo ' <div class="product-image">';
            echo '<img src = ', "img/", $row['img'], '>';
            echo '</div>';
            echo '<div class="product-details">';
            echo '<div class="product-title">', $row['name'], '</div>';
            echo '<p class="product-description">', $row['explanation'], '</p>';
            echo '</div>';
            echo '<div class="product-price">', $row['price'], '</div>';
            echo '<div class="product-quantity">';
            echo '<input type="number" value="0" min="0">';
            echo '</div>';
            echo '<div class="product-removal">';
            echo '<form action="test.php" method="post">';
            echo '<button type=\'submit\' class="remove-product" name="remove" value="', $row['id'], '">削除</button>';
            echo '</<form>';
            echo '</div>';
            echo '<div class="product-line-price">0</div>';
            echo '</div>';
        }
        if (isset($_POST['remove'])) {
            $sql = $pdo->prepare('DELETE FROM favorite WHERE id=?');
            $sql->bindParam(1,$_POST['remove']);
            $sql->execute();
            $pdo = null;
        }
        ?>
        <div class="totals">
            <div class="totals-item">
                <label>小計</label>
                <div class="totals-value" id="cart-subtotal">0</div>
            </div>
            <div class="totals-item">
                <label>税金 (10%)</label>
                <div class="totals-value" id="cart-tax">0</div>
            </div>
            <div class="totals-item">
                <label>送料</label>
                <div class="totals-value" id="cart-shipping">300</div>
            </div>
            <div class="totals-item totals-item-total">
                <label>合計</label>
                <div class="totals-value" id="cart-total">0</div>
            </div>
        </div>
        <form>
            <button class="checkout" name="delete">確定</button>
        </form>
    </div>
<?php
if(isset($_POST['delete'])){
    $sql = $pdo->prepare('DELETE FROM favorite');
    $pdo = null;
}
?>
<?php require '../footer.php'; ?>