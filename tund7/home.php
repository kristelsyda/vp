<?php
	//require("usesession.php");
	//var_dump($_POST);
		
	//$username = "Kristel Süda";
	session_start();
  
  //kui pole sisse logitud
  if(!isset($_SESSION["userid"])){
	  //jõugu sisselogimise lehele
	  header("Location: page.php");
  }
  //välja logimine
  if(isset($_GET["logout"])){
	  session_destroy();
	   header("Location: page.php");
	   exit();
  }
	
	require("header.php");
?>
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1 style="color:#DC32A3;">Cat Shrine</h1>
  <p style="font-family:Courier; color:#DC6B32;">Sisu pole. Lihtsalt üks tore kassipilt :)</p>
  <p>
  <img src="https://i.chzbgr.com/full/9375248640/h8C800AA5/necklace" alt="Valge kass kahe kaelakeega">
  
  <ul>
  <p><a href="?logout=1">Logi välja</a>!</p>
    <li><a href="addideas.php">Oma mõtete salvestamine</a></li>
	<li><a href="listideas.php">Mõtete vaatamine</a></li>
	<li><a href="listfilm.php">Filmide nimekirja vaatamine</a></li>
	<li><a href="addfilm.php">Filmide pealkirjade lisamine</a></li>
	<li><a href="addfilmrelations.php">Filmiinfo seoste lisamine</a></li>
	<li><a href="listfilmpersons.php">Filmitegelaste loend</a></li>
	<li><a href="userprofile.php">Minu kasutajaprofiil</a></li>
  </ul>
  
  
</body>
</html>

