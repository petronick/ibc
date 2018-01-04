<?php
class User extends ActiveRecord {
	public $id,$name,$password,$status;
	public static $table = "post";
	public static $key = "id";	
}