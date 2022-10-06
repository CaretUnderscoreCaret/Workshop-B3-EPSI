<?php
class DB {
	static $db ;

	public static function connect() {
		try{
			self::$db = new mysqli("localhost", "root", "","localfood");
		}catch (PDOException $e){   
			$error['DB_CONNECTION_ERROR']=$e->getMessage();
		}
	}

	public static function query($sql){
		$result = self::$db->query($sql);
		if(!$result && self::$db->errno){
			echo '[SQL_ERROR] '.self::$db->error.'<br>';
		}
		return $result;
	}

	public static function insert($table,$data){
		$champs = '';
		$values = '';
		foreach($data as $champ => $value){
			$champs .= $champ.',';
			if(is_string($value)){
				$value = "'".$value."'";
			}
			$values .= $value.',';
		}
		$sql = "
			INSERT INTO ".$table." (".substr($champs, 0, -1).")
			VALUES (".substr($values, 0, -1).")
		";
		DB::query($sql);
		return self::$db->insert_id;
	}

	public static function fetch($query){
		if($query){
			return $query->fetch_assoc();
		}
	}
}

