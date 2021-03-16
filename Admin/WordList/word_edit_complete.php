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
    <title>編集</title>
</head>
<body>
    <div class="main">
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
        <button type="button" class="button" onclick="location.href='word_list.php'">単語一覧に戻る</button>
        <button type="button" class="button" onclick="location.href='../top.php'">トップページに戻る</button>
    </div>
</body>
</html>