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

	public static function fetch($query){
		if($query){
			return $query->fetch_assoc();
		}
	}

}

