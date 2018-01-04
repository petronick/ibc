<?php
class Selection extends ActiveRecord {
	public $id,$naziv,$slika,$opis;
	public static $table = "selection";
	public static $key = "id";	
}