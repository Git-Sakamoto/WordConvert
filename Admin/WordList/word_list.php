<?php
require_once '../auth.php';
require "../../Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>IT用語一覧</title>
</head>
<body>
    <?php include "../header.html" ?>
    <div class="container">
        <?php if($result = $databaseManager->selectAllTranslation("ASC")) : ?>
            <form action="" method="POST">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">変換前</th>
                        <th scope="col">変換後</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $row) : ?>
                    <tr>
                        <td><?php echo $row[$databaseManager->translation_before] ?></td>
                        <td><?php echo $row[$databaseManager->translation_after] ?></td>
                        <?php $id = $row[$databaseManager->translation_id]; ?>
                        <td>
                            <button class="btn btn-outline-primary" type="submit" formaction="word_edit.php" name="id" value="<?php echo $id ?>">編集</button>
                            <button class="btn btn-outline-primary" type="submit" formaction="word_delete_confirm.php" name="id" value="<?php echo $id ?>">削除</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </form>
        <?php else : ?>
            <p>データの取得に失敗しました</p>
        <?php endif; ?>
    </div>
</body>
</html>
