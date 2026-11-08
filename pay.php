<?php
    session_start();
    $user_login = isset($_SESSION['user_login'])? $_SESSION['user_login'] : false;
    $address = isset($_POST['address'])? htmlspecialchars($_POST['address'],ENT_QUOTES,'utf-8'):'';
    if($user_login == true){
        //DB接続
        try{
            $dbh = new PDO("mysql:host=localhost;dbname=corporate_db; charset=utf8mb4","root","");
        }catch(PDOException $e){
            var_dump($e->getMessage());
            exit;
        }        
        //user_idでSELECT文作成
        $user = $_SESSION['user_id'];
        $stmt = $dbh->prepare("SELECT * FROM users WHERE user_id=:id");
        $stmt->bindParam(":id",$user);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //データ取得
        $name = $users[0]['name'];
        $email = $users[0]['email'];
        $tel = $users[0]['tel'];
    }else{
        //ログインしてない
        $name = '';
        $email = '';
        $tel = '';
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
    <link rel="stylesheet" href="css/responsive.css"> 
</head>
<body>
    <div class="sideback">
        <?php include('head/header.php'); ?>    
        <main class="back_collor_center">
            <div class="breadcrumbs">
                <!-- <div class="container">
                    <ul>
                        <li><a href="index.php">TOP</a></li>
                        <li><a href="cart.php">カート</a></li>
                        <li>ご購入者情報</li>
                    </ul>
                </div>
            </div> -->
            <div class="wrapper">
                <div class="container">
                    <div class="wrapper-title">
                    <h3>ご購入者情報</h3>
                    </div>
                    <form class="pay-form"  action="pay_conf.php" method="POST">
                        <div class="form-group">
                            <p class="form-title">お名前 *</p>
                            <P> <input type="text" name="name"  value="<?php echo $name; ?>"><span style=color:red><?php  if (isset($error['name_error'])) {
                            echo $error['name_error'];} ?></span></p>
                        </div>
                        <div class="form-group">
                            <p class="form-title">Email *</p>
                            <p><input type="email" name="email"  value="<?php echo $email; ?>"><span style=color:red><?php  if (isset($error['email_error'])) {
                            echo $error['email_error'];} ?></span></p>
                        </div>
                        <div class="form-group">
                            <p class="form-title">電話番号 *</p>
                            <p><input type="tel" name="tel" value="<?php echo $tel; ?>"><span style=color:red><?php  if (isset($error['tel_error'])) {
                            echo $error['tel_error'];} ?></span></p>
                        </div>
                        <div class="form-group">
                            <p class="form-title">お届け先 *</p>
                            <label>住所</label><br>
                            <input type="text" name="address">
                        </div>
                        <p class="btn-blue"><button type="submit">決済情報を入力する</button></p>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
        $(function () {
            //バリデーション
            $("input.name").on("blur", function () {
            let error;
            let value = $(this).val();
            if (value == "" || !value.match(/[^\s\t]/)) {
                error = true;
            }
            if (error) {
                //エラー時の処理
                alert('必須ですよ');
            }
            });
        });
        </script>
    </footer>
</body>
</html>