<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おにぎり印</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="inner">
        <div class="headback">
            <div class="headerlogo"><a href="index.php"><img src="images/logo.png" width=75px height=75px></a></div>
        </div>
    </div>
</header>
    <!-- login 修正 -->
    <main>
        <div class="login">
            <div class="wrapper-title">
                <h4>ログイン</h4>
            </div>
            <form class="login-form" action="user_check.php" method="POST">
                <span style="color:red"><?php if (isset($error['login_error'])){ echo $error['login_error'];} ?></span>
                <div class="form-group">
                    <p>メールアドレス</p>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <p>パスワード</p>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-gray">ログイン</button>
                <div class="register">
                    <div class="wrapper-title">
                        <h4>新規登録</h4>
                        <p>登録がお済みでない方はこちらから新規登録してください。</p>
                    </div>
                    <button type="button" class="btn btn-submit" onclick="location.href='./register.php'">新規登録</button>
                </div>
            </form>
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