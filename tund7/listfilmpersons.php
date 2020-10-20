<?php
  require("usesession.php");
  require("../../../config.php");
  //$database = "if20_rinde_2";
  require("fnc_film.php");
  
  $sortby = 0;
  $sortorder = 0;
  
  require("header.php");
?>
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <ul>
   <li><a href="home.php">Avalehele</a></li>
   <li><a href="?logout=1">Logi välja</a>!</li>
  </ul>
  <?php
    if(isset($_GET["sortby"]) and isset($_GET["sortorder"])){
		if($_GET["sortby"] >= 1 and $_GET["sortby"] <= 4){
			$sortby = intval($_GET["sortby"]);
		}
		if($_GET["sortorder"] == 1 or $_GET["sortorder"] == 2){
			$sortorder = intval($_GET["sortorder"]);
		}
	}
    echo readpersoninmovie($sortby, $sortorder);
  ?>
</body>
</html>
