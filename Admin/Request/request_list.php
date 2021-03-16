<?php
require_once '../auth.php';
require "../../Class/DatabaseManager.php";
$databaseManager = new DatabaseManager();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>リクエスト</title>
<script type="text/javascript">
function check(){
	const select = document.getElementsByClassName("select");
	
	let count = 0;

    for (let i = 0; i < select.length; i++) {
        if (select[i].checked) {
            count++;
        }
    }
	
	if(count > 0){
	    return true; // 送信を実行
	}else{
		window.alert('チェックされていません');
		return false;

	}
}
</script>
</head>
<body>
    <div class="main">
        <h3>単語の登録リクエスト</h3>
        <?php if($result = $databaseManager->selectAllRequest()) : ?>
            <?php if($result->num_rows == 0) : ?>
                <p>リクエストはありません</p>
            <?php else : ?>
                <form action="" method="POST">
                <table>
                    <tr>
                        <th>変換前単語</th>
                    </tr>
                    
                    <?php foreach($result as $row) : ?>
                        <?php
                        $id = $row[$databaseManager->request_id]; 
                        $word = $row[$databaseManager->request_word]; 
                        ?>
                    <tr>
                        <td><input type="checkbox" class = "select" name="idArray[]" value="<?php echo $id ?>"><?php echo $word ?></td>
                        <td><button type="submit" formaction="../NewAdd/word_input.php" name="id" value="<?php echo $id ?>">登録</button></td>
                        <td><button type="submit" formaction="request_delete_confirm.php" name="id" value="<?php echo $id ?>">削除</button></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <button type="submit" formaction="../NewAdd/word_input.php" name="id" value="select" onClick="return check();">選択項目を登録</button>
                <button type="submit" formaction="request_delete_confirm.php" name="id" value="select" onClick="return check();">選択項目を削除</button>
                </form>
            <?php endif; ?>
        <?php else : ?>
            <p>データの取得に失敗しました</p>
        <?php endif; ?>
        
        <button type="button" class="button" onclick="location.href='../top.php'">トップページに戻る</button>
    </div>
</body>
</html>