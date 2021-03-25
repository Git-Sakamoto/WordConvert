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
    <title>編集</title>
</head>
<body>
    <?php include "../header.html" ?>
    <div class="container">
        <h3>更新完了</h3>
        <?php
        if($databaseManager->updateTranslation($_SESSION['id'],$_POST['newBefore'],$_POST['newAfter'])) :
        ?>
            <div class="form-item">■ 変換前</div>
            <p><?php echo $_SESSION['oldBefore'].' -> '.$_POST['newBefore'] ; ?></p>
    
            <div class="form-item">■ 変換後</div>
            <p><?php echo $_SESSION['oldAfter'].' -> '.$_POST['newAfter'] ; ?></p>
        <?php else : ?>
            <p>
                データの登録に失敗しました<br>
                変換前の単語：<?php echo $_POST['newBefore'] ?>が既に登録されている可能性があります
            </p>
        <?php endif; ?>
        <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='word_list.php'">単語一覧に戻る</button>
        <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='../top.php'">トップページに戻る</button>
    </div>
</body>
</html>
