<?php
    session_start();
    $id = isset($_GET['id'])? htmlspecialchars($_GET['id'], ENT_QUOTES, 'utf-8'):'';
//DB接続
   try{
        $dbh = new PDO("mysql:host=localhost;dbname=corporate_db; charset=utf8mb4","root","");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }
    //orders 書き換えました
    $stmt1 = $dbh->prepare("SELECT
            order_products.item_name,
            order_products.num,
            order_products.price,
            orders.created_at
        FROM order_products
        INNER JOIN orders ON order_products.order_id = orders.order_id
        WHERE orders.user_id = :id");
    $stmt1->bindParam(':id',$id);
    $stmt1->execute();
    $orders = $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-13xxxxxxxxx"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-13xxxxxxxxx');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>受注詳細</title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="css/admin_styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-logo">
                <a href="index.php"><h1>注文詳細</h1><div class="arrow arrow-right"></div></a>
            </div>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>受注詳細</h3>
                </div>
                <div class="list">
                    <h4>商品詳細</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>商品名</th>
                                <th>個数</th>
                                <th>金額</th>
                                <th>購入日</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) {
                                    echo '<tr>';
                                    echo '<td>' . $order['item_name'] . '</td>';
                                    echo '<td>' . $order['num'] . '</td>';
                                    echo '<td>' . $order['price'] . '</td>';
                                    echo '<td>' . $order['created_at'] . '</td>';
                                    echo '</tr>';
                                }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>© OCA ONIGIRI</p>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>

