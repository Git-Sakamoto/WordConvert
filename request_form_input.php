<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>リクエスト入力</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <div class="main">
        <div class="form">
            <form method="post" action="request_form_complete.php">
                <img src="image/group_family_asia.png" class="left_icon">
                <span class="form-title">単語の登録リクエスト</span>
                <img src="image/kaden_PC.png" class="right_icon">
                <p>・大文字を含んだアルファベット文字列、または日本語文字列は、完全一致に対応します<br>（例：IT、IoT、データベース）</p>
                <p>・小文字だけのアルファベット文字列は、大文字小文字関係無く一致します<br>（例：user）</p>
                <p>・最大20字</p>
                <p>単語：<input type="text" name="word[]" maxlength="20" required></p>
                <p>単語：<input type="text" name="word[]" maxlength="20"></p>
                <p>単語：<input type="text" name="word[]" maxlength="20"></p>
                
                <button type="button" class="button" onclick="history.back()">戻る</button>
                <input type="submit" value="送信" class="button">
            </form>
        </div>
    </div>
</body>
</html>