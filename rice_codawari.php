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
<!-- お米のこだわり -->
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
    <!-- header---------------------------------------------->
    <?php include('head/header.php'); ?>
    <!-- main-------------------------------------->
    <main>
        <h1 class="unkounko">おにぎりのこだわり</h1>
    <!-- お米について ----------------------------------------->
        <nav class="rice">
            <img class="codawari liquid" src="images/rice.jpg" alt="">
            <div class="ctext">
                <h2 class="ctitle">お米について</h2>
                <h3>おにぎりの主役であるお米はもっちりとした粘り気、独特な甘みをもった「魚沼産コシヒカリ」を使用しています。</h3>
            </div>
        </nav>
    <!-- 炊飯について ---------------------------------------->
        <nav class="rice">
            <div class="stext">
                <h2 class="stitile">炊飯について</h2>
                <h3>お米のポテンシャルを引き出すため、炊飯ではお米一粒一粒にまんべんなく冷水をじっくりと浸すことで、<br>お米の芯までしっかり熱を伝えふっくらと炊き上げています。<br>そのため、冷めても硬くならずしっとり感が維持し、おにぎりを作るのに最高の仕上がりになっております。</h3>
            </div>
            <img class="suihan liquid" src="images/suihan.jpg" alt="">
        </nav>
    <!-- 握りについて ------------------------------------------>
        <nav class="rice">
            <img class="nigiri liquid" src="images/onigiri.jpg" alt="">
            <div class="ntext">
                <h2 class="ntitle">握りについて</h2>
                <h3>炊きたてで握ることによってよりふわふわ感が際立ち、口の中でほろほろと米粒がほどけていくような仕上がりとなっております。</h3>
            </div>
        </nav>
    <!-- 心得 ----------------------------------------------------->
        <nav class="rice">
            <div class="ktext">
                <h2 class="ktitle">心得</h2>
                <h3>味、見た目はもちろん、安心して食べていただくために衛生面のケアにもしっかりと力を入れており、<br>丁寧にお米とお客様に向き合っています。</h3>
            </div>
            <img class="kokoroe liquid" src="images/eat_onigiri.jpg" alt="">
        </nav>
    </main>
    <!-- fooeter------------------------------------------->
    <footer>
        <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
        </div>
    </footer>
</body>
</html>