<!-- cart_2の後に続くところ -->
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
    <main>
        <p><strong><span class="axs1">ご購入ありがとうございました</span></strong>
        <form action="confirm.php" method="POST">
            <p><label>お名前（平仮名）：（必須）<input type="text" name="name" class="txt" placeholder="お名前"></label></p>
                <?php
                // if(preg_match("/[ぁ-ん]/",$_POST['name'])){
                //     echo "正しく入力";
                // }
                ?>
            <p><label>メールアドレス：（必須）<input type="email" name="email" class="txt" placeholder="example@example.com"required></label></p>
                <?php
                // if (empty($_POST['email']) || !preg_match('/\A[^@]+@[^@]+\z/', $_POST['email'])) {
                //     echo "正しいメールアドレスを入力してください。";
                //     }
                ?>
            <p><label>電話番号：<input type="tel" name="tel" placeholder="00000000000" class="txt"></label></p>
            <p>
                <label>性別：</label>
                <label><input type="radio" name="gender" value="男性" class="radio" checked="checked">男性</label>
                <label><input type="radio" name="gender" value="女性" class="radio">女性</label>
                <label><input type="radio" name="gender" value="その他" class="radio">その他</label>
            </p>
            <p>
                <label>一番好きなおにぎりは？：</label>
                <select name="animal" class="like">
                    <option value="選択してください" selected>選択してください</option>
                    <option value="塩">塩</option>
                    <option value="海苔">海苔</option>
                    <option value="ごま">ごま</option>
                    <option value="ごま鮭">ごま鮭</option>
                    <option value="炊き込み">炊き込み</option>
                    <option value="豆ごはん">豆ごはん</option>
                    <option value="うめぼし">うめぼし</option>
                    <option value="梅ゆかり">梅ゆかり</option>
                    <option value="わかめ">わかめ</option>
                    <option value="赤飯">赤飯</option>
                </select>
            </p>
            <p>
                <label>おにぎりはいかがでしたか？ご意見・ご感想をお願いします！</label><br>
                <textarea name="comment" cols="110" rows="11" placeholder="コメントを入力"></textarea>
            </p>
            <p><label><input type="checkbox" name="agree">個人情報保護法に同意します。</label></p>
            <p><a href="#">個人情報保護法のお取り扱いについて</a></p>
            <div class="button">
                <td><p><input type="submit" value="送信" style="width:200px;height:45px"></p></td>
            </div>
    </main>
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