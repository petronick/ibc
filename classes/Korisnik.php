<?php

class Korisnik extends ActiveRecord {
	public static $table = "users";
	public static $key = "id";
	public function setSessions (){
		Session::set("status",$this->status);
		Session::set("name",$this->name);
	
	}
	public static function logout () {
		session::stop();
	}
	public static function login($username,$password){
		$users = self::getAll("where name = '{$username}' and password = '{$password}' limit 1");
		if(count($users)==1){
			$users[0]->setSessions();
			return $users[0];
		} else {
			return null;
		}
	
	}
}