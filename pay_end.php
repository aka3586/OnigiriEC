<?php
    // 値の受け取り
    session_start();
    if (!isset($_SESSION['user_id'])) {
        $error=[];
        $error['login_error'] = "※ログインされていません";
        include('login.php');
        exit;
    }
    $user_login = isset($_SESSION['user_login'])? $_SESSION['user_login']:false;
    $address = isset($_POST['address'])? htmlspecialchars($_POST['address'],ENT_QUOTES,'utf-8'):'';
    $products = isset($_SESSION['products'])? $_SESSION['products']:[];
    $total = 0;
    foreach($products as $key => $product){
        $subtotal = (int)$product['price']*(int)$product['count'];
        $total += $subtotal;
    }
    //DB接続
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=corporate_db; charset=utf8mb4","root","");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }
    $user_id = $_SESSION['user_id'];
    //ordersのid取得
    $order_id = $dbh->lastInsertId();
    //ordersテーブル
    $stmt1 = $dbh->prepare("INSERT INTO orders(order_id,user_id,address,total,created_at) VALUES(:order_id,:user_id,:address,:total,now())");
    $stmt1->bindParam(':order_id',$order_id);
    $stmt1->bindParam(':user_id',$user_id);
    $stmt1->bindParam(':address',$address);
    $stmt1->bindParam(':total',$total);
    $stmt1->execute();
    //order_productsテーブル
    $order_id = $dbh->lastInsertId();
    foreach($products as $key => $product){
        $stmt2 = $dbh->prepare("INSERT INTO order_products(order_id,item_id,item_name,num,price) VALUES(:order_id,:item_id,:item_name,:num,:price)");
        $stmt2->bindParam(':order_id',$order_id);
        $stmt2->bindParam(':item_id',$product['item_id']);
        $stmt2->bindParam(':item_name',$key);
        $stmt2->bindParam(':num',$product['count']);
        $stmt2->bindParam(':price',$product['price']);
        $stmt2->execute();}
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
    unset($_SESSION['products']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おにぎり印</title>
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/responsive.css"> 
</head>
<body>
    <?php include('head/header.php'); ?>    
    <main>
        <div class="wrapper last-wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>購入完了</h3>
                </div>
                <div class="wrapper-body">
                    <div class="thanks">
                        <h4>ご購入ありがとうございました。</h4>
                    </div>
                    <p class="btn-gray"><button type="button" onclick="location.href='index.php'">トップページに戻る</button></p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
        </div>
    </footer>
</body>
</html>
