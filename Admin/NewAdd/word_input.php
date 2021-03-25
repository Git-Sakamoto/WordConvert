<?php
require_once '../auth.php';
session_start();

unset($_SESSION['requestIdArray']);

require "../../Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();

//isset($_POST['id']) == true リクエスト一覧から単語を追加する場合
$id;
if (isset($_POST['id'])){
    $id = $_POST['id'];
    
    //複数選択する場合
    if($id === 'select'){
        $_SESSION['requestIdArray'] = $_POST['idArray'];
        $id = implode(",", $_POST['idArray']);
    }else{
        $_SESSION['requestIdArray'] = [$id];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>入力</title>
</head>
<body>
    <?php include "../header.html" ?>
    <div class="container">
        <h3>新規登録</h3>
        <form method="post" action="word_input_complete.php">
            <?php if(empty($id)): ?>
                <?php $_SESSION['formCount'] = 1; ?>
                <p>変換前：<input type="text" name="before[]" maxlength="20" required></p>
                <p>変換後：<input type="text" name="after[]" required></p>
                <input class="btn btn-outline-primary" type="submit" value="登録">
            <?php else : ?>
                <?php
                if ($result = $databaseManager->selectRequest($id)) :
                    $formCount = 0; //フォーム生成数カウント用
            
                    foreach($result as $row){
                        $formCount++;
                        $word = $row[$databaseManager->request_word];
                        echo "<p>変換前：<input type='text' name='before[]' value='$word' maxlength='20' required></p>";
                        echo "<p>変換後：<input type='text' name='after[]' value='' required></p>";
                    }
            
                    $_SESSION['formCount'] = $formCount;
                ?>
                <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='../Request/request_list.php'">リクエスト一覧に戻る</button>
                <input class="btn btn-outline-primary" type="submit" value="登録">
                <?php else : ?>
                    <p>データを取得できませんでした</p>
                <?php endif; ?>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
