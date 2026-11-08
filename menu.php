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
    <link rel="stylesheet" href="css/pop.css">  
    <link rel="stylesheet" href="css/slide.css"> 
</head>
<body>
    <!-- header---------------------------------------------->
    <?php include('head/header.php'); ?>
        <!-- main-------------------------------------------->
    <!--onigiri_menu------------------------------------------------>
        <ul class="onigiri_menu">
    <!-- 塩おにぎり--------------------------->
            <a href="#modal-01">
            <li><img src="images/onigiri/sioonigiri.png" width="125" height="145" alt=""></a></li>       
                <div class="modal-wrapper" id="modal-01">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/sioonigiri.png" width="100" height="125" alt=""></div>
                                <p>一見普通の具のないおにぎりですが、握る前のコツ、塩加減、握る方を吟味し、お米も粘り気が少なくさっぱりした味わいが特徴で、冷めても味が落ちない「ササニシキ・ひとめぼれ」を使用し、塩はおにぎりが劇的においしくなるといわれている「ろく助塩」を使用しています。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="1"> 
                                    <input type="hidden" name="name" value="塩"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円<!--ポスト個数--> <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 海苔おにぎり--------------------------->
            <a href="#modal-02">
            <li><img src="images/onigiri/nori.png" width="125" height="145" alt=""></a></li>
                <div class="modal-wrapper" id="modal-02">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/nori.png" width="100" height="125" alt=""></div>
                                <p>塩にぎりと、塩の量やお米の品種はに変わりはないですが、海苔にこだわりました。高級海苔の山善糟谷海苔店のものを使っています。のりは焼きのりと、味付け海苔の2種類を選ぶことが出来ます。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="2">
                                    <input type="hidden" name="name" value="のり(焼き海苔)"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    焼きのり:数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                                <br>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="3">
                                    <input type="hidden" name="name" value="のり(味付け海苔)"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    味付けのり:数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>

                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- ゴマおにぎり--------------------------->
            <a href="#modal-03">
            <li><img src="images/onigiri/goma.png" width="125" height="145" alt=""></a></li>
                <div class="modal-wrapper" id="modal-03">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/goma.png" width="100" height="125" alt=""></div>
                                <p>塩握りより塩の量を少なくし、まろやかな味にしました。そしてゴマは和田萬のいりごまを使っております。国産ゴマの自給率は0,1%未満なので貴重で今までに食べたゴマより深みを感じることがでいます。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="4">
                                    <input type="hidden" name="name" value="ごま"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- ゴマ鮭おにぎり--------------------------->
            <a href="#modal-04">
            <li><img src="images/onigiri/gomasyake.png" width="125" height="145" alt=""></a></li>  
                <div class="modal-wrapper" id="modal-04">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/gomasyake.png" width="100" height="125" alt=""></div>
                                <p>ゴマ握りの和田萬のいりごまを使い塩鮭は化学調味料や添加物をはじめ酵母エキスに至るまで、一切使用してないきっかわさんの鮭を使っています</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="5">
                                    <input type="hidden" name="name" value="ごま鮭"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 炊き込みご飯--------------------------->
            <a href="#modal-05">
            <li><img src="images/onigiri/takikomi.png" width="125" height="145" alt=""></a></li>   
                <div class="modal-wrapper" id="modal-05">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/takikomi.png" width="100" height="125" alt=""></div>
                                <p>他と同じようにこだわったお米で炊き込みご飯を使っています。ほかの炊き込みご飯と違う点は、国産サザエを使用しています。島根県の隠岐の島でとれたサザエで実が大きく弾力があり滝ごみご飯の味とよく合います。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="6">
                                    <input type="hidden" name="name" value="炊き込み"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- まめおにぎり--------------------------->
            <a href="#modal-06">
            <li><img src="images/onigiri/mamegohan.png" width="125" height="145" alt=""></a></li>    
                <div class="modal-wrapper" id="modal-06">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/mamegohan.png" width="100" height="125" alt=""></div>
                                <p>枝豆握りの枝豆は青森県津軽地方に受け継がれる在来品種のいたや毛豆をつかっています。ごはんに隠し味でめんつゆを少量使っています。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="7">
                                    <input type="hidden" name="name" value="豆"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 梅干しおにぎり--------------------------->
            <a href="#modal-07">
            <li><img src="images/onigiri/umeboshi.png" width="125" height="145" alt=""></a></li>    
                <div class="modal-wrapper" id="modal-07">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/umeboshi.png" width="100" height="125" alt=""></div>
                                <p>うめぼしにぎりのうめぼしはしそ漬け梅干を使っています。しそ漬け梅干の特徴は、爽やかな酸味が口いっぱいに広がり、どこか懐かしい気持ちを感じさせてくれるおにぎりだだと感じるでしょう。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="8">
                                    <input type="hidden" name="name" value="梅干し"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 梅ゆかりおにぎり--------------------------->
            <a href="#modal-08">
            <li><img src="images/onigiri/umeyuksri.png" width="125" height="145" alt=""></a></li>        
                <div class="modal-wrapper" id="modal-08">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/umeyuksri.png" width="100" height="125" alt=""></div>
                                <p>さわやかな香りのゆかりと、程よい酸味とうまみのしそ漬け梅干をつかっています。さっぱりしているので何個でもたべたくなります。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="9">
                                    <input type="hidden" name="name" value="梅ゆかり"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- わかめおにぎり--------------------------->
            <a href="#modal-09">
            <li><img src="images/onigiri/wakame.png" width="125" height="145" alt=""></a></li>    
                <div class="modal-wrapper" id="modal-09">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/wakame.png" width="100" height="125" alt=""></div>
                                <p>わかめごはんのわかめは、福井県で三代続く、昆布専門店が手がけたもので新鮮なワカメを乾燥させて、こだわりの塩で絶妙に味付けしたものをつかっています。ほろよい塩加減とわかめそのものの味をかんじることができます。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="10">
                                    <input type="hidden" name="name" value="わかめ"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 赤飯おにぎり--------------------------->
            <a href="#modal-10">
            <li><img src="images/onigiri/sekihan.png" width="125" height="145" alt=""></a></li>    
                <div class="modal-wrapper" id="modal-10">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/sekihan.png" width="100" height="125" alt=""></div>
                                <p>赤飯のお米は最高級餅米「みやこがね米」を使っていて煮汁で食欲をそそる赤色で色付けして小豆は、無農薬小豆の渡部信一さんの小豆をつかっています。力のある土壌で育った小豆は甘みと風味が段違いでその上美容にもこうかがあります。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="11">
                                    <input type="hidden" name="name" value="赤飯"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 鰹節おにぎり--------------------------->
            <a href="#modal-11">
            <li><img src="images/onigiri/katuobusi.png" width="125" height="145" alt=""></a></li>    
                <div class="modal-wrapper" id="modal-11">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/katuobusi.png" width="100" height="125" alt=""></div>
                                <p>ふじや鰹節店さんの鰹節を使っています。ふじや鰹節店の鰹節は伝統製法で作られた本物の本枯節や荒節で味と風味が楽しめます。それにかつおぶしにはオメガ3系脂肪酸は、健康維持に役立つといわれています。健康をきにするかたにもおすすめです。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="12">
                                    <input type="hidden" name="name" value="かつお節"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 鮭おにぎり--------------------------->
            <a href="#modal-12">
            <li><img src="images/onigiri/syake.png" width="125" height="145" alt=""></a></li>    
                <div class="modal-wrapper" id="modal-12">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/syake.png" width="100" height="125" alt=""></div>
                                <p>塩鮭は化学調味料や添加物をはじめ酵母エキスに至るまで、一切使用してないきっかわさんの鮭を使っています。塩は鮭にあう少しから目のこさにしてあり、さしゃけにぎりが好きな人におすす目のものになります。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="13">
                                    <input type="hidden" name="name" value="鮭"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- ツナマヨおにぎり--------------------------->
            <a href="#modal-13">
            <li><img src="images/onigiri/tunamyo.png" width="125" height="145" alt=""></a></li>
                <div class="modal-wrapper" id="modal-13">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/tunamyo.png" width="100" height="125" alt=""></div>
                                <p>ツナマヨは醤油とめんつゆを少量混ぜることで、風味とうまみを増幅させています。ごはんも柔らかな質感で非常に食べやすいおにぎりになっているとおもいます　</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="14">
                                    <input type="hidden" name="name" value="ツナマヨ"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- たらこおにぎり--------------------------->
            <a href="#modal-14">
            <li><img src="images/onigiri/tarako.png" width="125" height="145" alt=""></a></li>        
                <div class="modal-wrapper" id="modal-14">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/tarako.png" width="100" height="125" alt=""></div>
                                <p>たらこおにぎりのたらこは国内最高級のブランドたらこ「虎杖浜産のたらこ」を使用しています。加熱することにより、虎杖浜たらこ独特の風味が現出し、輸入物の調味料漬けのたらこや明太子とはひと味もふた味も違うおにぎりを味わうことができます。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="15">
                                    <input type="hidden" name="name" value="たらこ"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 昆布おにぎり--------------------------->
            <a href="#modal-15">
            <li><img src="images/onigiri/konb.png" width="125" height="145" alt=""></a></li>
                <div class="modal-wrapper" id="modal-15">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/konb.png" width="100" height="125" alt=""></div>
                                <p>北海道産高級昆布使用。ピリッと激辛昆布が美味しい。長野県産コシヒカリのご飯です。ピリ辛の好きな人におすすめのおにぎりです。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="16">
                                    <input type="hidden" name="name" value="昆布"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- いくらおにぎり--------------------------->
            <a href="#modal-16">
            <li><img src="images/onigiri/ikura.png" width="125" height="145" alt=""></a></li>
                <div class="modal-wrapper" id="modal-16">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/ikura.png" width="100" height="125" alt=""></div>
                                <p>北海道知床産のいくらを使用しています。お米は銀河のしずくを使用しております。銀河のしずくの最大の特徴は炊き上がりの白さ。見た目も美味しいお米です。また、お米の風味や甘さがあり、飽きのこないさっぱりした食味です。そして海苔に合います</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="17">
                                    <input type="hidden" name="name" value="いくら"> <!--ポストname-->
                                    <input type="hidden" name="price" value="500"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>500円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 煮卵おにぎり--------------------------->
            <a href="#modal-17">
            <li><img src="images/onigiri/nitamago.png" width="125" height="145" alt=""></a></li>
                <div class="modal-wrapper" id="modal-17">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/nitamago.png" width="100" height="125" alt=""></div>
                                <p>煮卵おにぎりの煮卵は青森県弘前市にある煮玉子専門店「弘前の煮玉子屋」のを使っています。独自製法の秘伝の煮汁で丹念に煮込んだ弘前の煮玉子おにぎりと非常に相性がいいです。煮卵を引き立たせるために米の塩の量をほかのおにぎりより少し少なくしました。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="18">
                                    <input type="hidden" name="name" value="煮卵"> <!--ポストname-->
                                    <input type="hidden" name="price" value="400"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>400円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 天むす--------------------------->
            <a href="#modal-18">
            <li><img src="images/onigiri/tenmusu.png" width="120" height="160" alt=""></a></li>
                <div class="modal-wrapper" id="modal-18">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/tenmusu.png" width="100" height="125" alt=""></div>
                                <p>天ぷらの油は綿の実本舗の油を使っています。サラダ油の上品な風味とピュアな触感はプロの職人たちに高く評価されています。綿実油は、ビタミンEがたくさん入っていて、体の酸化を抑える効果があり廊下や動脈硬化予防が期待できます。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="19">
                                    <input type="hidden" name="name" value="天むす"> <!--ポストname-->
                                    <input type="hidden" name="price" value="600"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>600円<!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- 焼きおにぎり--------------------------->
            <a href="#modal-19">
            <li><img src="images/onigiri/yakionigiri.png" width="125" height="145" alt=""></a></li>
                <div class="modal-wrapper" id="modal-19">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                        <div class="modal-content">
                            <div class="onigiris"><img src="images/onigiri/yakionigiri.png" width="100" height="125" alt=""></div>
                                <p>焼きおにぎりに塗っている醤油は角長醤油 「巴里」を使用しています。いつもの醤油とはちがい、不思議としょっぱさはあまり感じない。使用原料は大豆・小麦・塩・水に麹で、化学調味料、着色料、保存料、アルコール添加をされていないので奥深い味がします。</p>
                                <form action="menu.php" method="POST" class="item-form">
                                    <input type="hidden" name="id" value="20">
                                    <input type="hidden" name="name" value="焼きおにぎり"> <!--ポストname-->
                                    <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                    数量<?php include('head/spiner.php'); ?>300円 <!--ポスト個数-->
                                    <button type="submit" class="btn-menu">カートに入れる</button>
                                </form>
                            </div>
                        <a href="#!" class="modal-close">×</a>
                    </div>
                </div>
    <!-- とろろ昆布おにぎり--------------------------->
            <a href="#modal-20">
            <li><img src="images/onigiri/tororokonbu.png" width="125" height="145" alt=""></a></li>
            <div class="modal-wrapper" id="modal-20">
                <a href="#!" class="modal-overlay"></a>
                <div class="modal-window">
                    <div class="modal-content">
                        <div class="onigiris"><img src="images/onigiri/tororokonbu.png" width="100" height="125" alt=""></div>
                            <p>トロロ昆布のおにぎりは昆布を築地魚河岸・築地場外市場の昆布専門店からお取り寄せして使っています。 国産の4種類の昆布をブレンドしていて、化学調味料無添加。癖がないおにぎりになっております。</p>
                            <form action="menu.php" method="POST" class="item-form">
                                <input type="hidden" name="id" value="21">
                                <input type="hidden" name="name" value="とろろ昆布"> <!--ポストname-->
                                <input type="hidden" name="price" value="300"> <!--ポストprice-->
                                数量<?php include('head/spiner.php'); ?>300円<!--ポスト個数-->
                                <button type="submit" class="btn-menu">カートに入れる</button>
                            </form>
                        </div>
                    <a href="#!" class="modal-close">×</a>
                </div>
            </div>
        </ul>
        <!-- cart.phpに情報入力------------------->
        <?php
            $name = isset($_POST['name'])? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
            $id = isset($_POST['id'])? htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8') : ''; // 追加
            $price = isset($_POST['price'])? htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8') : '';
            $count = isset($_POST['count'])? htmlspecialchars($_POST['count'], ENT_QUOTES, 'utf-8') : '';
            if(isset($_SESSION['products'])){  
                //$_SESSION['products']を$productsという変数にいれる
            $products = $_SESSION['products']; 
                //$productsをforeachで回し、キー(商品名)と値（金額・個数）取得
            foreach($products as $key => $product){  
                    //もし、キーとPOSTで受け取った商品名が一致したら、
                if($key == $name){ 
                        //既に商品がカートに入っているので、個数を足し算する     
                    $count = (int)$count + (int)$product['count'];
                    }
                }
            }  
            //配列に入れるには、$name,$count,$priceの値が取得できていることが前提なのでif文で空のデータを排除する
            if($name!=''&&$id!=''&&$count!=''&&$price!=''){
                $_SESSION['products'][$name]=[
                        'item_id' => $id,
                        'count' => $count,
                        'price' => $price
                    ];
            }
            $products = isset($_SESSION['products'])? $_SESSION['products']:[];
        ?>
    </main>
    <!-- fooeter------------------------------------------->
    <footer>
        <div class="foot">
        <p><img src="images/footer.png" width="400" height="100" alt=""></p>
        &copy; OCA ONIGIRI
        </div>
    </footer>
    <!-- script------------------>
    <script type="text/javascript" src="JavaScript/script.js"></script>
    <!-- jquery------------------>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.modal_pop').hide();
        $('.show_pop').on('click',function(){
            $('.modal_pop').fadeIn();
        })
        $('.js-modal-close').on('click',function(){
            $('.modal_pop').fadeOut();
        })
    </script>
    <!-- 追加----------------------------------------------------------------- -->
    <script>
    $(function() {
    $('.spinner').each(function() {
        var el  = $(this);
        var add = $('.spinner-add');
        var sub = $('.spinner-sub');

        // substract
        el.parent().on('click', '.spinner-sub', function() {
        if (el.val() > parseInt(el.attr('min'))) {
            el.val(function(i, oldval) {
            return --oldval;
            });
        }
        // disabled
        if (el.val() == parseInt(el.attr('min'))) {
            el.prev(sub).addClass('disabled');
        }
        if (el.val() < parseInt(el.attr('max'))) {
            el.next(add).removeClass('disabled');
        }
        });

        // increment
        el.parent().on('click', '.spinner-add', function() {
        if (el.val() < parseInt(el.attr('max'))) {
            el.val(function(i, oldval) {
            return ++oldval;
            });
        }
        // disabled
        if (el.val() > parseInt(el.attr('min'))) {
            el.prev(sub).removeClass('disabled');
        }
        if (el.val() == parseInt(el.attr('max'))) {
            el.next(add).addClass('disabled');
        }
        });
    });
    });    
    </script>
        
</body>
</html>