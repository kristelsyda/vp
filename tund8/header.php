<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title>Veebileht</title>
  <style>
  <?php
    echo "body { \n";
	if(isset($_SESSION["userbgcolor"])){
		echo "\t \t background-color: " .$_SESSION["userbgcolor"] ."; \n";
	} else {
		echo "\t \t background-color: #FFFFFF; \n";
	}
	if(isset($_SESSION["usertxtcolor"])){
		echo "\t \t color: " .$_SESSION["usertxtcolor"] ."\n";
	} else {
		echo "\t \t color: #000000; \n";
	}
	echo "\t } \n";
  ?>
  </style>
</head>
<body>
<img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">