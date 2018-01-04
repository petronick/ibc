<?php
define("DB","db_vama");
define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("HB","mysql:localhost;db_vama");
define("APP_DIR","d:/wamp/www/IBC");

function __autoload($class){
	include APP_DIR."/classes/".$class.".php";
}