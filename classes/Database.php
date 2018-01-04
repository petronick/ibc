<?php
class Database{
	private static $instance = null;
	private function __construct(){}
	public static function getInstance(){
		if(!self::$instance)
			self::$instance = new PDO ("mysql:host=localhost;dbname=ibc;charset=utf8","root","");
		return self::$instance;
		
	}
	
}