<!-- ホーム -->
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
    <link rel="stylesheet" href="css/flexslider.css" type="text/css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.flexslider.js"></script>
</head>
<body>
    <?php include('head/header.php'); ?>
    <main>
        <div class="flexslider">
            <ul class="slides">
                <li><img src="images/main01_1000_450.jpg"></li>
                <li><img src="images/main02_1000_450.jpg"></li>
                <li><img src="images/main03_1000_450.jpg"></li>
            </ul>
        </div>
        <div class="concept">
            <h2>わたしたちのこだわり</h2>
            <p>鮮度を落とさず、すぐにおにぎりをお届けするサービスを目指しております。</p>
        </div>
        <div class="menu_all">
            <h3>人気商品</h3>
            <ul class="menu_list">
                <li><a href="menu.php#modal-13">
                    <figure>
                        <div class="menu_img">
                            <img src="images/tunamayo.png">
                            <p class="ster" style="color:#e5b349">★★★</p>
                            <figcaption>
                                <p>ツナマヨ</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-12">
                    <figure>
                        <div class="menu_img">
                            <img src="images/syake.png">
                            <p class="ster" style="color:#c9caca">★★★</p>
                            <figcaption>
                                <p>鮭</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-14">
                    <figure>
                        <div class="menu_img">
                            <img src="images/tarako.png">
                            <p class="ster" style="color:#b87333">★★★</p>
                            <figcaption>
                                <p>たらこ</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
            </ul>
        </div>
        <div class="menu_all">
            <h3>オススメ商品</h3>
            <ul class="menu_list">
                <li><a href="menu.php#modal-04">
                    <figure>
                        <div class="menu_img">
                            <img src="images/gomasyake.png">
                            <figcaption>
                                <p>ごま鮭</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-05">
                    <figure>
                        <div class="menu_img">
                            <img src="images/takikomi.png">
                            <figcaption>
                                <p>炊き込みご飯</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-09">
                    <figure>
                        <div class="menu_img">
                            <img src="images/wakame.png">
                            <figcaption>
                                <p>わかめ</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-11">
                    <figure>
                        <div class="menu_img">
                            <img src="images/katuobusi.png">
                            <figcaption>
                                <p>かつおぶし</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-15">
                    <figure>
                        <div class="menu_img">
                            <img src="images/konb.png">
                            <figcaption>
                                <p>昆布</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-16">
                    <figure>
                        <div class="menu_img">
                            <img src="images/ikura.png">
                            <figcaption>
                                <p>いくら</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-17">
                    <figure>
                        <div class="menu_img">
                            <img src="images/nitamago.png">
                            <figcaption>
                                <p>煮たまご</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-07">
                    <figure>
                        <div class="menu_img">
                            <img src="images/umeboshi.png">
                            <figcaption>
                                <p>うめぼし</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-08">
                    <figure>
                        <div class="menu_img">
                            <img src="images/umeyukari.png">
                            <figcaption>
                                <p>梅ゆかり</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
                <li><a href="menu.php#modal-19">
                    <figure>
                        <div class="menu_img">
                            <img src="images/yakionigiri.png">
                            <figcaption>
                                <p>焼きおにぎり</p>
                            </figcaption>
                        </div>
                    </figure>
                    </a>
                </li>
            </ul>
        </div>
        <div class="banner">
            <img src="images/banner_ehou.jpg">
        </div>
        <!-- 1/11追加 -->
        <h2>最新情報</h2>
        <ul class="newinfo">
            <li>２月１１日より発売！<br>期間限定「キンメダイ」</li>
            <li>１月２０日より新店舗！<br>南港ＡＴＣ店</li>
        </ul>
    </main>
    <footer>
        <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
        </div>
    </footer>
    <!--------fadeスライド方式（デフォルト）--------> 
    <script>
        $(window).load(function() {
            $('.flexslider').flexslider({
                slideshowSpeed: 5000
            });
        });
    </script>
    <!-------------slide方式-------------------->   
    <!--<script>   
    $(window).load(function() {
        $('.flexslider').flexslider({
        animation: "slide",
        slideshowSpeed: 5000
    });
    });
    </script>-->
</body>
</html>