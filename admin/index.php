<?php
	require "config.php";
	$name = Session::get('name');
	$status = Session::get('status');
?>
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

			<div id="header">
				<div id="logo">
					<a href="?page=1"><img src="Images/logo1.png"></a>
				</div> <!--end logo-->
				<div id="korisnik">
					<?php
						if(!$name)
						{
					?>
							<a href='?page=0'>Login</a>
					<?php
						}
						else 
						{
							echo $name; ?> | <a href='modules/logout.php'>Logout</a>
					<?php
						}
					?>
					
				</div>
			</div> <!--end header-->

			<div id="nav">
				<ul>
					<li><a href="?page=1">Objave</a></li>
					<li><a href="?page=2">Stručni štab</a></li>
					<li><a href="?page=4">Selekcije</a></li>
					<li><a href="?page=5">Kamp/Turniri</a></li>
					<li><a href="?page=7">Rezultati</a></li>
					<li><a href="?page=8">Timovi</a></li>
					<li><a href="?page=6">Korisnici</a></li>
				</ul>
			</div> <!--end nav-->

			<div id="main">

				<?php 	
				$default_page = (isset($_GET['page']))?$_GET['page']:0;
				$pages = array(
					"0"=>"logovanje.php",
					"1"=>"post.php",
					"2"=>"stuff.php",
					"3"=>"contact.php",
					"4"=>"selections.php",
					"5"=>"turniri.php",
					"6"=>"korisnici.php",
					"7"=>"rezultati.php",
					"8"=>"timovi.php",
					"9"=>"logout.php"
				);
				
				include "modules/" . $pages[$default_page];

			?>

			</div> <!--end main-->

			<div id="footer">
				
			</div> <!--end footer-->

		</div> <!--end wrapper-->
	</body>
</html>