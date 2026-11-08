<!-- メニュー一覧 -->
<?php
    session_start();
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
    <link rel="stylesheet" href="css/responsive.css"> 
</head>
<body>
    <?php include('head/header.php'); ?>    
    <main>
        <div class="wrapper last-wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>送信完了</h3>
                </div>
                <div class="wrapper-body">
                    <div class="thanks">
                        <h4>ご意見ありがとうございました。</h4>
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
