<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>リクエスト入力</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "header.html" ?>
    <div class="main">
        <div class="form">
            <form method="post" action="request_form_complete.php">
                <h1>単語の登録リクエスト</h1>
                
                <p>・大文字を含んだアルファベット文字列、または日本語文字列は、完全一致に対応します<br>（例：IT、IoT、データベース）</p>
                <p>・小文字だけのアルファベット文字列は、大文字小文字関係無く一致します<br>（例：user）</p>
                <p>・最大20字</p>
                
                <p>単語：<input type="text" name="word[]" maxlength="20" required></p>
                <p>単語：<input type="text" name="word[]" maxlength="20"></p>
                <p>単語：<input type="text" name="word[]" maxlength="20"></p>
                
                <button type="button" class="button" onclick="location.href='input.php'">トップページに戻る</button>
                <input type="submit" value="送信" class="button">
            </form>
        </div>
    </div>
</body>
</html>
