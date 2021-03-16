<?php
require "Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IT用語一覧</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <div class="main">
        <div class=form>
            <img src="image/group_family_asia.png" class="left_icon">
            <span class="form-title">登録済みの単語</span>
            <img src="image/kaden_PC.png" class="right_icon">

            <div class="form-item">■ 変換前の単語 -> 変換後の単語</div>
            <?php
            if($result = $databaseManager->selectAllTranslation("ASC")){
	            foreach($result as $row){
                    echo "<p>{$row[$databaseManager->translation_before]} -> {$row[$databaseManager->translation_after]}</p>";
                }
            }else{
                echo"<p>データを取得できませんでした</p>";
            }
            ?>
            
            <button type="button" class="button" onclick="history.back()">戻る</button>
        </div>
    </div>
</body>
</html>