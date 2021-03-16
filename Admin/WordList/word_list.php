<?php
require_once '../auth.php';
require "../../Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IT用語一覧</title>
</head>
<body>
    <div class="main">
        <?php if($result = $databaseManager->selectAllTranslation("ASC")) : ?>
            <form action="" method="POST">
            <table>
                <tr>
                    <th>変換前</th>
                    <th>変換後</th>
                </tr>
                
                <?php foreach($result as $row) : ?>
                <tr>
                    <td><?php echo $row[$databaseManager->translation_before] ?></td>
                    <td><?php echo $row[$databaseManager->translation_after] ?></td>
                    <?php $id = $row[$databaseManager->translation_id]; ?>
                    <td><button type="submit" formaction="word_edit.php" name="id" value="<?php echo $id ?>">編集</button></td>
                    <td><button type="submit" formaction="word_delete_confirm.php" name="id" value="<?php echo $id ?>">削除</button></td>
                </tr>
                <?php endforeach; ?>
            </table>
            </form>
        <?php else : ?>
            <p>データの取得に失敗しました</p>
        <?php endif; ?>
        
        <button type="button" class="button" onclick="location.href='../top.php'">トップページに戻る</button>
    </div>
</body>
</html>