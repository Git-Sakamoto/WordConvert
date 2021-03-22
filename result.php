<?php
require "Class/Converter.php";

$stringBefore = nl2br($_POST['body']);
    
$converter = new Converter();
list($stringAfter,$convertCount,$convertResultArray) = $converter->wordConvert($stringBefore);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>結果</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "header.html" ?>
    <div class="main">
        <div class=form>
            <img src="image/group_family_asia.png" class="left_icon">
            <span class="form-title">変換結果</span>
            <img src="image/kaden_PC.png" class="right_icon">

            <div class="form-item">■ 見つかった単語数</div>
            <?php
            echo "<p>{$convertCount}件</p>";
            
            if(empty($convertResultArray) == false){
                echo '<div class="form-item">■ 変換した単語</div>';
                
                foreach ($convertResultArray as $before => $after){
                    echo "<p>$before -> $after</p>";
                }
            }
            ?>

            <div class="form-item">■ 変換前</div>
            <?php echo "<p>{$stringBefore}</p>"; ?>
            
            <div class="form-item">■ 変換後</div>
            <?php echo "<p>{$stringAfter}</p>"; ?>
            
            <button type="button" class="button" onclick="location.href='input.php'">もう一度変換する</button>
        </div>
    </div>
</body>
</html>
