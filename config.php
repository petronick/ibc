<?php
define("APP_DIR","d:/wamp/www/IBC");

function __autoload($class){
	include APP_DIR."/classes/".$class.".php";
}