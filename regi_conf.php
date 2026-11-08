<?php
    // 値の受け取り
    $name = isset($_POST['name'])? htmlspecialchars($_POST['name'],ENT_QUOTES,'utf-8'):'';
    $email = isset($_POST['email'])? htmlspecialchars($_POST['email'],ENT_QUOTES,'utf-8'):'';
    $password = isset($_POST['password'])? htmlspecialchars($_POST['password'],ENT_QUOTES,'utf-8'):'';
    $tel = isset($_POST['tel'])? htmlspecialchars($_POST['tel'],ENT_QUOTES,'utf-8'):'';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
    if (!preg_match('/\A(((0(\d{1}[-(]?\d{4}|\d{2}[-(]?\d{3}|\d{3}[-(]?\d{2}|\d{4}[-(]?\d{1}|[5789]0[-(]?\d{4})[-)]?)|\d{1,4}\-?)\d{4}|0120[-(]?\d{3}[-)]?\d{3})\z/',$_POST['tel'])){
        $tel_error = '　※正しくない電話番号です';
        $error['tel_error'] = $tel_error;
    }
    if (isset($error['name_error']) || isset($error['email_error'])){
        include('register.php');
        exit();
    }
?>
<main>
    <div class="last-wrapper">
        <div class="container">
            <div class="wrapper-title">
                <p>登録内容確認</p>
            </div>
            <form method="POST" action="regi_end.php" class="conf-form">
                <div class="form-group">
                    <p>お名前 *</p>
                    <p><?php echo $name; ?></p>
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <p>Email *</p>
                    <p><?php echo $email; ?></p>
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <p>パスワード *</p>
                    <p><?php echo $password; ?></p>
                    <input type="hidden" name="password" value="<?php echo $password; ?>">
                </div>
                <div class="form-group">
                    <p>電話番号 *</p>
                    <p><?php echo $tel; ?></p>
                    <input type="hidden" name="tel" value="<?php echo $tel; ?>">
                </div>
                <p class="text">この内容で送信してよろしいですか？</p>
                <button type="submit">送信する</button>
            </form>
        </div>
    </div>
<!-- end contact conf  -->
</main>
<footer>
    <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
    </div>
</footer>
</body>