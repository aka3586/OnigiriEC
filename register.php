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
    <main>
        <header>
            <div class="inner">
                <div class="headback">
                    <div class="headerlogo"><a href="index.php"><img src="images/logo.png" width=75px height=75px></a></div>
                </div>
            </div>
        </header>
        <!-- register -->
        <div class="register-wrapper">
            <div class="container">
                <div class="regist">
                    <div class="wrapper-title">
                        <p>新規登録</p>
                    </div>
                    <form class="regi-form" method="POST" action="./regi_conf.php">
                        <div class="form-group">
                            <p>お名前 *</p>
                            <input type="text" name="name"><span style=color:red>
                            <?php  if (isset($error['name_error'])) {
                            echo $error['name_error'];} ?></span></p>
                        </div>
                        <div class="form-group">
                            <p>Email *</p>
                            <input type="email" name="email"><span style=color:red>
                            <?php  if (isset($error['email_error'])) {
                            echo $error['email_error'];} ?></span></p>
                        </div>
                        <div class="form-group">
                            <p>電話番号 *</p>
                            <input type="text" name="tel"><span style=color:red>
                            <?php  if (isset($error['tel'])) {
                            echo $error['tel'];} ?></span></p>
                        </div>
                        <div class="form-group">
                            <p>パスワード *</p>
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <p>パスワード(再入力) *</p>
                            <input type="password" name="passwordConfirm" id="passwordConfirm" required>
                        </div>
                        <button type="submit">内容を確認する</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        var form = document.forms[0];
        form.onsubmit = function() {
            // エラーメッセージをクリアする
            form.password.setCustomValidity("");
            // パスワードの一致確認
            if (form.password.value != form.passwordConfirm.value) {
            // 一致していなかったら、エラーメッセージを表示する
            form.passwordConfirm.setCustomValidity("パスワードと確認用パスワードが一致しません");
            }
        };
    </script>
    <footer>
            <script src=”JavaScript/jquery.js”></script>
        <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
        </div>
    </footer>
</body>
</html>