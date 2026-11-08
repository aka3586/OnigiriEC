<?php
    // 値の受け取り
    $name = isset($_POST['name'])? htmlspecialchars($_POST['name'],ENT_QUOTES,'utf-8'):'';
    $email = isset($_POST['email'])? htmlspecialchars($_POST['email'],ENT_QUOTES,'utf-8'):'';
    $password = isset($_POST['password'])? htmlspecialchars($_POST['password'],ENT_QUOTES,'utf-8'):'';
    $tel = isset($_POST['tel'])? htmlspecialchars($_POST['tel'],ENT_QUOTES,'utf-8'):'';
    //DB接続
    try{
            $dbh = new PDO("mysql:host=localhost;dbname=corporate_db; charset=utf8mb4","root","");
        }catch(PDOException $e){
            var_dump($e->getMessage());
            exit;
        }
        $stmt = $dbh->prepare("INSERT INTO users(name,email,password,tel,created_at) VALUES(:name,:email,:password,:tel,now())");
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":tel",$tel);
        $stmt->execute();
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
    <header>
    </header>
    <main>
        <!-- contact　conf -->
        <div class="wrapper last-wrapper">
            <div class="container">
                <div class="thanks">
                    <h3>登録完了しました。</h3>
                    <p>ご登録ありがとうございました。</p>
                    <button type="button" class="btn btn-gray" onclick="location.href='./index.php'">トップページに戻る</button>
                </div>
            </div>
        </div>
        <!-- end contact conf-->
    </main>
</body>
</html>