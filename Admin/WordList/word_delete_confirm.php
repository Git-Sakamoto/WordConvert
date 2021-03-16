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
        <h3>削除</h3>
        <?php
        $id = $_POST['id'];
        if ($result = $databaseManager->selectTranslation($id)) :
            $row = $result->fetch_assoc();
            $before = $row[$databaseManager->translation_before];
            $after = $row[$databaseManager->translation_after];
            
            $_SESSION['id'] = $id;
            $_SESSION['before'] = $before;
            $_SESSION['after'] = $after;
        ?>
            <form method="post" action="word_delete_complete.php">
                <p>変換前：<?php echo $before ?></p>
                <p>変換後：<?php echo $after ?></p>
                <input type="submit" value="削除">
            </form>
        <?php else : ?>
            <p>データの取得に失敗しました</p>
        <?php endif; ?>
        <button type="button" class="button" onclick="location.href='word_list.php'">戻る</button>
    </div>
</body>
</html>