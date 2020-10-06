<?php
  require("../../../config.php");
   //$database = "if20_Kristel_sy_2";
   require("fnc_film.php");
  
  //loen andmebaasist filmide info
  //$filmhtml = readfilms();
  
  $username = "Kristel Süda";
  require("header.php");
?>

  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1><?php echo $username; ?></h1>
  <ul>
   <li><a href="home.php">Avalehele</a></li>
  </ul>
  <?php echo readfilms(0); 
  
  ?>
</body>
</html>