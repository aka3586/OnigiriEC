<!-- cartの後に続くところ商品の最終確認 -->
<?php
    $delete_name = isset($_POST['delete_name'])? htmlspecialchars($_POST['delete_name'], ENT_QUOTES, 'utf-8') : '';
    session_start();
    $user_login = isset($_SESSION['user_login'])? $_SESSION['user_login']:false;
    if($delete_name != '') unset($_SESSION['products'][$delete_name]);
    $total = 0;
    $products = isset($_SESSION['products'])? $_SESSION['products']:[];
    foreach($products as $name => $product){
        //各商品の小計を取得
        $subtotal = (int)$product['price']*(int)$product['count'];
        //各商品の小計を$totalに足す
        $total += $subtotal;
    }
    $user_login = isset($_SESSION['user_login'])? $_SESSION['user_login']:false;
    // 追加
    if(isset($_POST['username'])){
        $user_name = $_POST['user_name'];
    }
    //DB接続
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=corporate_db; charset=utf8mb4","root","");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }
    $stmt = $dbh->prepare("SELECT * FROM orders");
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おにぎり印</title>
    <link rel="stylesheet" href="css/style.css">     
    <link rel="stylesheet" href="css/header.css"> 
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <!-- header---------------------------------------------->
    <?php include('head/header.php'); ?>
    <!-- main-------------------------------------------->
    <main>
        <!--onigiri_menu----------------->
        <div class = "carts">
            <h1 class = "cart">この商品で確定しますか？</h1>
                <div class="cartlist">
                    <table class="cart-table">
                        <thead>
                            <tr>
                            <th>商品名</th>
                            <th>価格</th>
                            <th>個数</th>
                            <th>小計</th>
                            <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($products as $name => $product): ?>
                            <tr>
                                <td label="商品名："><?php echo $name; ?></td>
                                <td label="価格：" class="text-right">¥<?php echo $product['price']; ?></td>
                                <td label="個数：" class="text-right"><?php echo $product['count']; ?></td>
                                <td label="小計：" class="text-right">¥<?php echo $product['price']*$product['count']; ?></td>
                                <td>
                                    <form action="cart.php" method="post">
                                    <input type="hidden" name="delete_name" value="<?php echo $name; ?>">
                                    <button type="submit" class="btn btn-red">取り消し</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="total">
                                <th colspan="3">合計</th>
                                <td colspan="2">¥<?php echo $total; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- 追加12/21 -->
                    <div class="cart-btn">
                    <button type="button" class="button_line" onclick="location.href='pay.php'" <?php if(empty($products)) echo 'disabled="disabled"'; ?>>購入手続きへ</button></div>
                </div>
        </div>
    </main>
    <!-- fooeter------------------------------------------->
    <footer>
        <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
        </div>
    </footer>
</body>
</html>