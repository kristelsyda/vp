<?php
  require("usesession.php");
  require("../../../config.php");
   //$database = "if20_Kristel_sy_2";
  require("fnc_film.php");
  
  //loen andmebaasist filmide info
  //$filmhtml = readfilms();
  
  //$username = "Kristel Süda";
  require("header.php");
?>

  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  
  <ul>
   <li><a href="home.php">Avalehele</a></li>
   <li><a href="?logout=1">Logi välja</a>!</li>
  </ul>
  <?php echo readfilms(0); 
  
  ?>
</body>
</html>