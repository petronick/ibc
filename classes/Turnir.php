<?php
class Turnir extends ActiveRecord {
	public $id,$naslov,$slika,$sadrzaj,$datum;
	public static $table = "turnir";
	public static $key = "id";	
}