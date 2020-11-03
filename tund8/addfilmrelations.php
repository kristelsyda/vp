<?php
   
  require("usesession.php");
  //loeme andmebaasi login ifo muutujad
  require("../../../config.php");
  require("fnc_filmrelations.php");
  
  $genrenotice = "";
  $studionotice = "";
  $selectedfilm = "";
  $selectedgenre = "";
  $selectedstudio = "";
  
  if(isset($_POST["filmstudiorelationsubmit"])){
    if(!empty($_POST["filminput"])){
		$selectedfilm = intval($_POST["filminput"]);
	} else {
		$studionotice = " Vali film!";
	}
	if(!empty($_POST["filmstudioinput"])){
		$selectedstudio = intval($_POST["filmstudioinput"]);
	} else {
		$studionotice = " Vali stuudio!";
	}
	if(!empty($selectedfilm) and !empty($selectedstudio)){
		$studionotice = storenewstudiorelation($selectedfilm, $selectedstudio);
	}
  }	  
  
  if(isset($_POST["filmgenrerelationsubmit"])){
	//$selectedfilm = $_POST["filminput"];
	if(!empty($_POST["filminput"])){
		$selectedfilm = intval($_POST["filminput"]);
	} else {
		$genrenotice = " Vali film!";
	}
	if(!empty($_POST["filmgenreinput"])){
		$selectedgenre = intval($_POST["filmgenreinput"]);
	} else {
		$genrenotice .= " Vali žanr!";
	}
	if(!empty($selectedfilm) and !empty($selectedgenre)){
		$genrenotice = storenewgenrerelation($selectedfilm, $selectedgenre);
	}
  }
  
  $filmselecthtml = readmovietoselect($selectedfilm);
  $filmgenreselecthtml = readgenretoselect($selectedgenre);
  $filmstudioselecthtml = readstudiotoselect($selectedstudio);
    

  //$username = "Kristel Süda";

  require("header.php");
?>
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?> programmeerib veebi</h1>
      
  <ul>
    <li><a href="home.php">Avalehele</a></li>
		<li><a href="?logout=1">Logi välja</a>!</li>
  </ul>
  
  <h2>Määrame filmistuudio</h2>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php
	  echo $filmselecthtml;
	  echo $filmstudioselecthtml;
		?>
	<input type="submit" name="filmstudiorelationsubmit" value="Salvesta filmiinfo"><span><?php echo $studionotice; ?></span>
  </form>
  
  <hr>
  <h2>Määrame filmile žanri</h2>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php
		echo $filmselecthtml;
		echo $filmgenreselecthtml;
		?>
	
	<input type="submit" name="filmgenrerelationsubmit" value="Salvesta filmiinfo"><span><?php echo $genrenotice; ?></span>
  </form>
  
</body>
</html>



