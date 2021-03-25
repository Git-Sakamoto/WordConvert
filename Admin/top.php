<?php
require "auth.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<title>トップ</title>
</head>
<body>
    <?php include "header.html" ?>
    <div class="container">
        <h1>IT用語変換　管理機能</h1>
        <h2><a href="NewAdd/word_input.php">新規登録</a></h2>
        <h2><a href="WordList/word_list.php">IT用語一覧/編集/削除</a></h2>
        <h2><a href="Request/request_list.php">リクエスト一覧</a></h2>
    </div>
</body>
</html>
