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
    <title>リクエスト削除</title>
</head>
<body>
    <div class="main">
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
            <input type="submit" value="削除">
        </form>
        <?php else : ?>
            <p>データを取得できませんでした</p>
        <?php endif; ?>
        <button type="button" class="button" onclick="location.href='request_list.php'">戻る</button>
    </div>
</body>
</html>