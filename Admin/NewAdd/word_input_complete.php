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
    <title>登録</title>
</head>
<body>
    <?php include "../header.html" ?>
    <div class="container">
        <h3>登録完了</h3>
        <?php
        $formCount = $_SESSION['formCount'];
        $before = $_POST['before'];
        $after = $_POST['after'];
        ?>
        
        <?php for($i=0; $i < $formCount; $i++) : ?>
            <?php if($databaseManager->insertTranslation($before[$i],$after[$i])) : ?>
                <p>
                    変換前：<?php echo $before[$i] ?> -> 変換後：<?php echo $after[$i] ?>　の登録が完了しました
                    <?php
                    if (isset($_SESSION['requestIdArray'])){
                        if($databaseManager->deleteRequest($_SESSION['requestIdArray'][$i])){
                            echo "<br>リクエストを削除しました";
                        }else{
                            echo "<br>リクエストを削除できませんでした";
                        }
                    }
                    ?>
                </p>
            <?php else : ?>
                <p>変換前：<?php echo $before[$i] ?> -> 変換後：<?php echo $after[$i] ?>　の登録に失敗しました</p>
            <?php endif; ?>
        <?php endfor; ?>
        
        <?php if(isset($_SESSION['requestIdArray'])) : ?>
            <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='../Request/request_list.php'">リクエスト一覧に戻る</button>
        <?php else : ?>
            <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='word_input.php'">続けて登録する</button>
        <?php endif; ?>
        <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='../top.php'">トップページに戻る</button>
    </div>
</body>
</html>
