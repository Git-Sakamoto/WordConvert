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
    <title>リクエスト削除</title>
</head>
<body>
    <div class="main">
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

        <button type="button" class="button" onclick="location.href='request_list.php'">リクエスト一覧に戻る</button>
        <button type="button" class="button" onclick="location.href='../top.php'">トップページに戻る</button>
    </div>
</body>
</html>