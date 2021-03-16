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
    <title>登録</title>
</head>
<body>
    <div class="main">
        <h3>登録完了</h3>
        <?php
        $formCount = $_SESSION['formCount'];
        $before = $_POST['before'];
        $after = $_POST['after'];
        ?>
        
        <?php for($i=0; $i < $formCount; $i++) : ?>
            <?php if($databaseManager->insertTranslation($before[$i],$after[$i])) : ?>
                <p>
                    変換前：<?php echo $before[$i] ?> -> 変換後：<?php echo $after[$i] ?>　の登録が完了しました
                    <?php
                    if (isset($_SESSION['requestIdArray'])){
                        if($databaseManager->deleteRequest($_SESSION['requestIdArray'][$i])){
                            echo "<br>リクエストを削除しました";
                        }else{
                            echo "<br>リクエストを削除できませんでした";
                        }
                    }
                    ?>
                </p>
            <?php else : ?>
                <p>変換前：<?php echo $before[$i] ?> -> 変換後：<?php echo $after[$i] ?>　の登録に失敗しました</p>
            <?php endif; ?>
        <?php endfor; ?>
        
        <?php if(isset($_SESSION['requestIdArray'])) : ?>
            <button type="button" class="button" onclick="location.href='../Request/request_list.php'">リクエスト一覧に戻る</button>
        <?php else : ?>
            <button type="button" class="button" onclick="location.href='word_input.php'">続けて登録する</button>
        <?php endif; ?>
        <button type="button" class="button" onclick="location.href='../top.php'">トップページに戻る</button>
    </div>
</body>
</html>