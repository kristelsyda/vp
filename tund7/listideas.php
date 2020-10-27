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
  
  //var_dump($_POST);
  require("../../../config.php");
  $database = "if20_kristel_sy_2";
    
  //loen andmebaasist senised mõtted
  $nonsenshtml = "";
  $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
  $stmt = $conn->prepare("SELECT nonsensidea FROM nonsens");
  echo $conn->error;
  //seon tulemuse muutujaga
  $stmt->bind_result($nonsensfromdb);
  $stmt->execute();
  while($stmt->fetch()){
	  $nonsenshtml .= "<p>" .$nonsensfromdb ."</p>";
  }
  $stmt->close();
  $conn->close();
  //$username = "Kristel Süda";
  require("header.php");
?>
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <p style="font-family:Courier; color:#DC6B32;">Sisu pole. Lihtsalt üks tore kassipilt :)</p>
  <ul>
	<li><a href="home.php">Avalehele</a></li>
	<li><a href="?logout=1">Logi välja</a>!</li>
  </ul>
  
  <hr>
  <?php echo $nonsenshtml; ?>
</body>
</html>