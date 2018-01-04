<?php
require "../config.php";
Korisnik::logout();
header("location:../?page=0");