<?php
require "Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IT用語一覧</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "header.html" ?>
    <div class="main">
        <div class=form>
            <img src="image/group_family_asia.png" class="left_icon">
            <span class="form-title">登録済みの単語</span>
            <img src="image/kaden_PC.png" class="right_icon">
            
            <?php if($result = $databaseManager->selectAllTranslation("ASC")) : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">変換前</th>
                            <th scope="col">変換後</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row) : ?>
                            <tr>
                                <td><?php echo $row[$databaseManager->translation_before] ?></td>
                                <td><?php echo $row[$databaseManager->translation_after] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>データを取得できませんでした</p>
            <?php endif; ?>
            
        </div>
    </div>
</body>
</html>
