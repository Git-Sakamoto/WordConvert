<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>入力</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <div class="main">
        <div class="form">
            <form method="post" action="result.php">
                <img src="image/group_family_asia.png" class="left_icon">
                <span class="form-title">IT用語の変換</span>
                <img src="image/kaden_PC.png" class="right_icon">
                <p>当サイト（開いている、ここ）のデータベース（情報の集合体）に登録されているIT（情報技術）用語を翻訳します</p>
                
                <p><a href="request_form_input.php">IT用語の新規追加リクエストがあれば、こちらから</a></p>
                <p><a href="word.php">登録済みのIT用語</a></p>
                
                <div class="form-item">内容</div>
                <p>・大文字を含んだアルファベット文字列、または日本語文字列は、完全一致に対応します<br>（例：IT、IoT、データベース）</p>
                <p>・小文字だけのアルファベット文字列は、大文字小文字関係無く一致します<br>（例：user）</p>
                <textarea name="body"></textarea>
                <input type="reset" value="クリア" class="button">
                <input type="submit" value="送信" class="button">
            </form>
        </div>
    </div>
</body>
</html>