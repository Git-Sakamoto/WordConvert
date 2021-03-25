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
                <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='word_list.php'">戻る</button>
                <input class="btn btn-outline-primary" type="submit" value="更新" class="button">
            </form>
        <?php else : ?>
            <p>データの取得に失敗しました</p>
            <button class="btn btn-outline-primary" type="button" class="button" onclick="location.href='word_list.php'">戻る</button>
        <?php endif; ?>
    </div>
</body>
</html>
