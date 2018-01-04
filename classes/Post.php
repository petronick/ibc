<?php
class Post extends ActiveRecord {
	public $id,$naslov,$slika,$sadrzaj,$datum;
	public static $table = "post";
	public static $key = "id";	
}