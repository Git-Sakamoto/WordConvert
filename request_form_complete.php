<?php
require "Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();
$databaseManager->insertRequest($_POST['word']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>リクエスト入力</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "header.html" ?>
    <div class="main">
        <div class=form>
            <h1>送信完了</h1>

            <div class="form-item">■ 送信した単語</div>
            <?php
            foreach ($_POST['word'] as $word){
                echo "<p>$word</p>";
            }
            ?>
            
            <button type="button" class="button" onclick="location.href='input.php'">トップページに戻る</button>
        </div>
    </div>
</body>
