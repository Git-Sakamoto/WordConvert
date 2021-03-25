<?php
require_once '../auth.php';
session_start();
require "../../Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>リクエスト削除</title>
</head>
<body>
    <?php include "../header.html" ?>
    <div class="container">
        <h3>リクエスト削除</h3>
        <?php
        $id = $_SESSION['idArray'];
        $word = $_SESSION['wordArray'];
        
        for($i = 0; $i < count($id); $i++){
            if($databaseManager->deleteRequest($id[$i])){
                echo "<p>リクエスト：$word[$i]の削除が完了しました</p>";
            }else{
                echo "<p>リクエスト：$word[$i]の削除に失敗しました</p>";
            }
        }
        ?>

        <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='request_list.php'">リクエスト一覧に戻る</button>
        <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='../top.php'">トップページに戻る</button>
    </div>
</body>
</html>
