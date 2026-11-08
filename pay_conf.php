<?php
    session_start();
    $user_login = isset($_SESSION['user_login'])? $_SESSION['user_login']:false;
    // 値の受け取り
    $postcode = isset($_POST['postcode'])? htmlspecialchars($_POST['postcode'],ENT_QUOTES,'utf-8'):'';
    $address = isset($_POST['address'])? htmlspecialchars($_POST['address'],ENT_QUOTES,'utf-8'):'';
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
<?php 
    $error = [];
    if (!preg_match('/^[ぁ-んァ-ヶ一-龠]*$/u', $_POST['name'])) {
        $name_error = '　※空白です、名前を入力してください。';
        $error['name_error'] = $name_error;
        }
    if (!preg_match('/^[a-zA-Z0-9!$&*.=^`|~#%+\/?_{}-]+@([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,4}$/u',$_POST['email'])){
        $email_error = '　※正しくないメールアドレスです';
        $error['email_error'] = $email_error;
    }
    if (isset($error['name_error']) || isset($error['email_error']) || isset($error['tel_error'])) {
        include('pay.php');
        exit();
    }
?>
<body class="sideback">
    <?php include('head/header.php'); ?>    
    <main class="back_collor_center">
        <form class="pay-form"  action="pay_end.php" method="POST">
            <div class="form-group">
                <p class="form-title">お名前 *</p>
                <p><?php if (isset($_POST['name'])){ echo htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");} ?></p>
                <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            </div>
            <div class="form-group">
                <p class="form-title">Email *</p>
                <p><?php if (isset($_POST['email'])){ echo htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");} ?></p>
                <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
            </div>
            <div class="form-group">
                <p class="form-title">お届け先 *</p>
                <label>住所</label><br>
                <p><?php echo $address; ?></p>
                <input type="hidden" name="address" value="<?php echo $address; ?>">
            </div>
            <p class="text">この内容で送信してよろしいですか？</p>
            <ul class="btn-blue">
                <li><button type="submit">購入する</button></li>
                <li><button type="button" onclick="location.href='./pay.php'">修正する</button></li>
            </ul>
        </form>
    </main>    
    <footer>
        <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
        </div>
    </footer>
</body>
</html>