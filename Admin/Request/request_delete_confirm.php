<?php
require_once '../auth.php';
session_start();
require "../../Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();

$id = $_POST['id']; //DB検索用

//idArray = リクエスト削除用
//select = 複数選択する場合
if($id === 'select'){
    $_SESSION['idArray'] = $_POST['idArray'];
    $id = implode(",", $_POST['idArray']); //DB検索用
}else{
    $_SESSION['idArray'] = [$id];
}
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
        <h3>リクエスト削除　確認</h3>
        <?php
        if ($result = $databaseManager->selectRequest($id)) :
            $wordArray = array();
            
            foreach($result as $row){
                $word = $row[$databaseManager->request_word];
                echo "<p>$word</p>";
                array_push($wordArray, $word);
            }
            
            $_SESSION['wordArray'] = $wordArray; //完了画面の表示用
        ?>
        <form method="post" action="request_delete_complete.php">
            <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='request_list.php'">戻る</button>
            <input class="btn btn-outline-primary" type="submit" value="削除">
        </form>
        <?php else : ?>
            <p>データを取得できませんでした</p>
            <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='request_list.php'">戻る</button>
        <?php endif; ?>
    </div>
</body>
</html>
