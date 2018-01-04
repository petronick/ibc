<?php
require "../config.php";
if(isset($_POST['btnSubmit']))
{
	if(!isset($_POST['tbUsername'])||!isset($_POST['tbPassword'])){
			die("Invalid parameters");
	}

	$username = $_POST['tbUsername'];
	$password = $_POST['tbPassword'];
	$username = str_replace("'","",$username);
	$username = str_replace("-","",$username);
	$password = str_replace("'","",$password);
	$password = str_replace("-","",$password);

	$user = Korisnik::login($username,$password);


	if($user){
		header("location: ../?page=1");
	} else {
		echo '
		
<!DOCTYPE html>
<html>
	<head>
		<title>KK IBC</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
	</head>
	<body>
		<div id="wrapper">
		<p>Pogrešno uneti podaci | <a href="..?page=0">Pokušaj ponovo</a></p>';
	}
}