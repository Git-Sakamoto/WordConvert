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
    <title>削除</title>
</head>
<body>
    <div class="main">
        <h3>削除完了</h3>
        <?php
        if($databaseManager->deleteTranslation($_SESSION['id'])) :
        ?>
            <div class="form-item">■ 変換前</div>
            <p><?php echo $_SESSION['before']; ?></p>
    
            <div class="form-item">■ 変換後</div>
            <p><?php echo $_SESSION['after']; ?></p>
        <?php else : ?>
            <p>削除に失敗しました</p>
        <?php endif; ?>
        <button type="button" class="button" onclick="location.href='word_list.php'">単語一覧に戻る</button>
        <button type="button" class="button" onclick="location.href='../top.php'">トップページに戻る</button>
    </div>
</body>
</html>