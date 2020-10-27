<?php
  session_start();
  
  //kui pole sisse logitud
  if(!isset($_SESSION["userid"])){
	  //jõuga sisselogimise lehele
	  header("Location: page.php");
  }
  //välja logimine
  if(isset($_GET["logout"])){
	  session_destroy();
	   header("Location: page.php");
	   exit();
  }
  
  //andmebaasi login info muutujad
  require("../../../config.php");
  
  require("fnc_filmoutput.php");
  
  $sortby = 0;
  $sortorder = 0;
  
  require("header.php");
?>
  
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
  
  <ul>
   <li><a href="home.php">Avalehele</a></li>
   <li><a href="?logout=1">Logi välja</a>!</li>
  </ul>
  
  <hr>
  <?php
    if(isset($_GET["sortby"]) and isset($_GET["sortorder"])){
		if($_GET["sortby"] >= 1 and $_GET["sortby"] <= 4){
			$sortby = intval($_GET["sortby"]);
		}
		if($_GET["sortorder"] == 1 or $_GET["sortorder"] == 2){
			$sortorder = intval($_GET["sortorder"]);
		}
	}
    echo readpersonsinfilm($sortby, $sortorder);
  ?>
</body>
</html>
