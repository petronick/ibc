<?php
	require "config.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>KK IBC</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
	</head>
	<body>
		<div id="wrapper">

			<div id="header">
				<div class="logo">
					<a href="?page=1"><img src="Images/logo1.png"></a>
				</div> <!--end logo-->
				<div class="score">
					<table>
						  <tr>
						    <th colspan="11">Rezultati</th>
						  </tr>
						  <tr>
							  <th rowspan="2">Ekipa</th>
							  <th colspan="6">Poslednja odigrana utakmica</th>
							  <th colspan="4">Naredna utakmica</th>
						  </tr>
						  <tr>
							  <th>Datum</th>
							  <th>Takmičenje</th>
							  <th>Domaćin</th>
							  <th>Gost</th>
							  <th>PD</th>
							  <th>PG</th>
							  <th>Datum</th>
							  <th>Takmičenje</th>
							  <th>Domaćin</th>
							  <th>Gost</th>
						  </tr>
						  <tr>
						    <?php
						    	include "modules/rezultati.php";
						    ?>
						  </tr>
					</table>
				</div> <!--end score-->
			</div> <!--end header-->

			<div id="nav">
				<ul>
					<li><a href="?page=1">Početna</a></li>
					<li><a href="?page=2">Stručni štab</a></li>
					<li><a href="?page=3">Kontakt</a></li>
					<li><a href="?page=4">Selekcije</a></li>
					<li><a href="?page=5">Kamp/Turniri</a></li>
				</ul>
			</div> <!--end nav-->

			<div id="main">

				<?php 	
				$default_page = (isset($_GET['page']))?$_GET['page']:1;
				$pages = array(
					"1"=>"pocetna.php",
					"2"=>"stuff.php",
					"3"=>"contact.php",
					"4"=>"selections.php",
					"5"=>"turniri.php"
				);
				
				include "modules/" . $pages[$default_page];

			?>

			</div> <!--end main-->

			<div id="footer">
				
			</div> <!--end footer-->

		</div> <!--end wrapper-->
	</body>
</html>