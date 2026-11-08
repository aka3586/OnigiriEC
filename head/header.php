<header id="header">
        <div class="inner">
            <div class="headback">
                <div class="headerlogo"><a href="index.php"><img src="images/logo.png" width=75px height=75px></a>
                <h1 class="head_title">おにぎり印</h1>
                </div>    
                <!-- リスト -->
                <nav class="block">
                    <ul>
                       <li><a class="block1" href="index.php">ホーム</a></li>
                       <li><a class="block2" href="menu.php">メニュー</a></li>
                       <li><a class="block3" href="rice_codawari.php">こだわり</a></li>
                       <li><a class="block4" href="situmon.php">意見箱</a></li>
                       <?php if($user_login==true):
                            $dbh = new PDO("mysql:host=localhost;dbname=corporate_db; charset=utf8mb4","root","");
                            // 自分のuser_idを取得する
                            $user_id = $_SESSION["user_id"];
                            // ordersテーブルから、自分のuser_idのデータを取得する
                            $query = $dbh->prepare("SELECT * FROM orders WHERE user_id = ?");
                            $query->execute([$user_id]);
                            $count = $query->rowCount();?>
                            <!-- 追加 -->
                            <ul id="normal" class="dropmenu">
                                <li><a class="btn-block" href="#"><?php echo htmlspecialchars($_SESSION['user_name']);?>さん</a>
                                    <ul>
                                        <li class="dropmenu_hover"><a href="logout.php">ログアウト</a></li>
                                        <?php if ($count >= 1){ ?>
                                            <li class="dropmenu_hover"><a href='mypage.php?id=<?php echo $user_id; ?>'>詳細</a></li>
                                        <?php };?>
                                    </ul>
                                </li>
                            </ul>        
                        <?php else: ?>
                            <p><a class="btn-block" href="login.php">ログイン</a></p>
                        <?php endif; ?>
                        <div class="accounting"><a href="cart.php"><img src="images/cart.png"width="45" height="45"  alt=""></a></div>
                     </ul>
                </nav>
            </div>
        </div>
</header>
