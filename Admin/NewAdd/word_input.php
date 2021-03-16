<?php
require_once '../auth.php';
session_start();

unset($_SESSION['requestIdArray']);

require "../../Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();

//isset($_POST['id']) == true リクエスト一覧から単語を追加する場合
$id;
if (isset($_POST['id'])){
    $id = $_POST['id'];
    //複数選択する場合
    
    if($id === 'select'){
        $_SESSION['requestIdArray'] = $_POST['idArray'];
        $id = implode(",", $_POST['idArray']);
    }else{
        $_SESSION['requestIdArray'] = [$id];
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>入力</title>
</head>
<body>
    <div class="main">
        <h3>新規登録</h3>
        <form method="post" action="word_input_complete.php">
            <?php if(empty($id)): ?>
                <?php $_SESSION['formCount'] = 1; ?>
                <p>変換前：<input type="text" name="before[]" maxlength="20" required></p>
                <p>変換後：<input type="text" name="after[]" required></p>
                <input type="submit" value="登録">
            <?php else : ?>
                <?php
                if ($result = $databaseManager->selectRequest($id)) :
                    $formCount = 0; //フォーム生成数カウント用
            
                    foreach($result as $row){
                        $formCount++;
                        $word = $row[$databaseManager->request_word];
                        echo "<p>変換前：<input type='text' name='before[]' value='$word' maxlength='20' required></p>";
                        echo "<p>変換後：<input type='text' name='after[]' value='' required></p>";
                    }
            
                    $_SESSION['formCount'] = $formCount;
                ?>
                <input type="submit" value="登録">
                <?php else : ?>
                    <p>データを取得できませんでした</p>
                <?php endif; ?>
            <?php endif; ?>
        </form>
        <button type="button" class="button" onclick="location.href='../top.php'">戻る</button>
    </div>
</body>
</html>