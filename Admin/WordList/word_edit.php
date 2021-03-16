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
        <h3>編集</h3>
        <?php
        $id = $_POST['id'];
        if ($result = $databaseManager->selectTranslation($id)) :
            $row = $result->fetch_assoc();
            $before = $row[$databaseManager->translation_before];
            $after = $row[$databaseManager->translation_after];
            
            
            $_SESSION['id'] = $id;
            $_SESSION['oldBefore'] = $before;
            $_SESSION['oldAfter'] = $after;
        ?>
            <form method="post" action="word_edit_complete.php">
                <p>変換前：<input type="text" name="newBefore" value="<?php echo $before ?>" maxlength="20" required></p>
                <p>変換後：<input type="text" name="newAfter" value="<?php echo $after ?>" required></p>
                <input type="submit" value="更新" class="button">
            </form>
        <?php else : ?>
            <p>データの取得に失敗しました</p>
        <?php endif; ?>
        <button type="button" class="button" onclick="location.href='word_list.php'">戻る</button>
    </div>
</body>
</html>