<!-- 意見箱 -->
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
</head>
<body>
    <div class="sideback">
        <!-- header---------------------------------------------->
        <?php include('head/header.php'); ?>
        <main class="center">
            <p class="axs1"><span>おにぎりの味はいかがでしたか？</span></p>
                <form class="form" action="confirm.php" method="POST">
                    <div class="situmon">
                        <p>
                            <label>一番好きなおにぎりは？：</label>
                            <select name="animal" class="like">
                                <option value="選択してください" selected>選択してください</option>
                                <option value="塩">塩</option>
                                <option value="海苔">海苔</option>
                                <option value="ごま">ごま</option>
                            </select>
                        </p>
                        <p>
                            <label>ご意見・ご感想をお願いします！</label><br>
                            <textarea name="comment" placeholder="コメントを入力"></textarea>
                        </p>
                    </div>   
                    <div class="agree">
                        <p><label><input type="checkbox" name="agree">個人情報保護法に同意します。</label></p>
                        <p><a href="#">個人情報保護法のお取り扱いについて</a></p>
                    </div>    
                    <div class="button">
                        <td><p><input type="submit" value="送信" style="width:200px;height:45px"></p></td>
                    </div>
                </form>    
        </main>
    </div>
    <!-- footer------------------------------------------->
    <footer>
        <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
        </div>
    </footer>
<!-- script------------------>
</body>
</html>