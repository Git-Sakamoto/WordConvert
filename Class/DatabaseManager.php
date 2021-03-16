<?php
class DatabaseManager{
	//データーベース認証情報
	private $host = "mysql1.php.xdomain.ne.jp";
	private $user = "***";
	private $password = "***";
	private $database = "sakamototest_translation";

	//translationテーブル
	public $translation_table = "translation";
	public $translation_id = "id";
	public $translation_before = "word_before";
	public $translation_after = "word_after";
	
	//requestテーブル
	public $request_table = "request";
	public $request_id = "id";
	public $request_word = "word";
	
	//userテーブル
	public $user_table = "user";
	public $user_user_name = "user_name";
	public $user_password = "password";
	
	public function selectAllTranslation($orderBy){
		$mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
		$result = $mysqli->query("SELECT * FROM $this->translation_table ORDER BY $this->translation_before $orderBy");
		$mysqli->close();
        return $result;
	}
	
	public function selectTranslation($id){
	    $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
		$result = $mysqli->query("SELECT * FROM $this->translation_table WHERE $this->translation_id = $id");
        $mysqli->close();
        return $result;
	}
	
	public function insertTranslation($before,$after){
	    $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
	    $stmt = $mysqli->prepare("INSERT INTO translation ($this->translation_before,$this->translation_after) values(?,?)");
	    $stmt->bind_param('ss', $before, $after);
	    $result = $stmt->execute();
	    $mysqli->close();
	    return $result;
	}
	
	public function updateTranslation($id,$before,$after){
	    $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
	    $sql = "UPDATE translation SET"
                ." word_before = ?,word_after = ?"
                ." WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssi', $before, $after, $id);
	    $result = $stmt->execute();;
	    $mysqli->close();
	    return $result;
	}
	
	public function deleteTranslation($id){
	    $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
	    $result = $mysqli->query("DELETE FROM translation where id = $id");
	    $mysqli->close();
	    return $result;
	}
	
    public function selectAllRequest(){
        $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
		$result = $mysqli->query("SELECT * FROM $this->request_table ORDER BY $this->request_word ASC");
        $mysqli->close();
        return $result;
    }
    
    public function selectRequest($id){
        $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
		$result = $mysqli->query("SELECT * FROM $this->request_table WHERE $this->request_id IN ($id) ORDER BY $this->request_word ASC");
        $mysqli->close();
        return $result;
    }
    
    //大文字小文字の区別はrequestテーブルのBINARY属性
    //重複の対応はrequestテーブルのUNIQUE属性	
    public function insertRequest($array){
        $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
        
        $sql = "INSERT INTO request (word)"
                ." SELECT ?"
                ." FROM dual"
                ." WHERE NOT EXISTS (SELECT 1 FROM translation WHERE BINARY $this->translation_before = ?)";
        
        $stmt = $mysqli->prepare($sql);
	    
	    foreach($array as $word){
	        if($word !== ""){
                $stmt->bind_param("ss", $word,$word);
                $stmt->execute();
            }
	    }
	    $mysqli->close();
	}
	
	public function deleteRequest($id){
        $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
		$result = $mysqli->query("DELETE FROM $this->request_table WHERE $this->request_id IN ($id)");
        $mysqli->close();
        return $result;
    }
    
    public function userSearch($userName,$password){
        $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
	    $sql = "SELECT * FROM $this->user_table WHERE $this->user_user_name = ? AND $this->user_password = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ss', $userName, $password);
	    $stmt->execute();
	    $result = $stmt->fetch();
	    $mysqli->close();
	    return $result;
    }
}
?>