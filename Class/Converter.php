<?php
class Converter{
	
    public function wordConvert($body){
        require "DatabaseManager.php";
        $databaseManager = new DatabaseManager();
        
        $stringAfter =  $body; //変換結果（文章）
        $convertCount = 0; //見つかった単語数
        $convertResultArray = array(); //見つかった単語（変換した単語）
        
        $wordBefore = $databaseManager->translation_before; //変換前の単語
        $wordAfter = $databaseManager->translation_after; //変換後の単語
        
		if ($result = $databaseManager->selectAllTranslation("DESC")) {
            while ($row = $result->fetch_assoc()) {
                if (ctype_lower($row[$wordBefore])) {
                    $stringAfter = str_ireplace($row[$wordBefore],'<span class="emphasis">'.$row[$wordAfter].'</span>',$stringAfter,$count);
                } else {
                    //DBに登録されている変換前の文字列が大文字を含んで構成されたアルファベット
                    //またはアルファベットではない
                    $stringAfter = str_replace($row[$wordBefore],'<span class="emphasis">'.$row[$wordAfter].'</span>',$stringAfter,$count);
                }
                
                //文字列の変換を行った
                if($count > 0){
                    $convertCount++;
                    $convertResultArray += array($row[$wordBefore]=>$row[$wordAfter]);
                }
            }

            $result->free();
        }

        $convertResultArray = array_reverse($convertResultArray);
		
		return array($stringAfter,$convertCount,$convertResultArray);
	}

}
?>