<?php
class Stuff extends ActiveRecord {
	public $id,$ime,$prezime,$slika,$opis;
	public static $table = "stuff";
	public static $key = "id";	
}