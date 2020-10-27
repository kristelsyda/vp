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
  
  
  require("../../../config.php");
   //$database = "if20_Kristel_sy_2";
  require("fnc_film.php");
  
  //loen andmebaasist filmide info
  //$filmhtml = readfilms();
  
  //$username = "Kristel Süda";
  require("header.php");
?>
  
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
  
  <ul>
   <li><a href="home.php">Avalehele</a></li>
   <li><a href="?logout=1">Logi välja</a>!</li>
  </ul>
  
  <hr>
  <?php echo readfilms(0); 
  
  ?>
</body>
</html>