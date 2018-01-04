<?php

abstract class ActiveRecord {
	public static function getAll($filter=""){
		$q = Database::getInstance()->query("select * from ".static::$table . " " . $filter);
		$res = [];
		$q->setFetchMode(PDO::FETCH_CLASS, get_called_class());
		while($rw=$q->fetch()){ 
			$res[] = $rw;
		}
		return $res;
	}
	public static function get($id){
		$conn = Database::getInstance();
		$q = $conn->query("select * from ".static::$table. " where ".static::$key. " = " . $id);
		$a = $q->setFetchMode(PDO::FETCH_CLASS,get_called_class());
		$a = $q->fetch();
		return $a;
	}
	public function save(){
		$q = "update " . static::$table . " set ";
		foreach($this as $k=>$v){
			if($k==static::$key) continue;
			$q.=$k."='".$v."',";
		}
		$q = rtrim($q,",");
		$keyField = static::$key;
		$q.="where ".static::$key." = ".$this->$keyField;
		Database::getInstance()->query($q);
	}
	// public function insert(){
		// $fields = get_object_vars($this);
		// $keys = array_keys($fields);
		// $values = array_values($fields);
		// $q = "insert into " . static::$table . "(";
		// $q.= implode(",",$keys);
		// $q.=") values ('";
		// $q.= implode("','",$values);
		// $q.="')";
		// Database::getInstance()->query($q);
		// $keyField = static::$key;
		// $this->$keyField = mysqli_insert_id($conn);
	// }
	public function insert (){

		$fields = get_object_vars($this) ;
		$keys= array_keys($fields);
		$values=array_values($fields);

		$q = "insert into ".static::$table. " (";
		$q.= implode(",", $keys);
		$q.=") values ('0";
		$q.= implode("','", $values);
		$q.="')";
		Database::getInstance()->query($q);
	}
	public static function delete($id){
		$q = "delete from " . static::$table . " where " . static::$key. " = " .$id;
		Database::getInstance()->query($q);
	}
	
}

