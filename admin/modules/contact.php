<?php
	if(!$status){
		die('Morate se ulogovati');
	}
	else {
		if($status!=3&&$status!=5){
			die('Nemate pravo pristupa');
		}
	}