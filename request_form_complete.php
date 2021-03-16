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
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <div class="main">
        <div class=form>
            <img src="image/group_family_asia.png" class="left_icon">
            <span class="form-title">送信完了</span>
            <img src="image/kaden_PC.png" class="right_icon">

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