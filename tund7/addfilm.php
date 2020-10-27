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
  
  //require("usesession.php");
  
  require("../../../config.php");
   //$database = "if20_kristel_sy_2";
  require("fnc_film.php");
     
   $inputerror = "";
   //$filmhtml = "";
  //kas vajutati salvestus nuppu
  if(isset($_POST["filmsubmit"])){
	if(empty($_POST["titleinput"]) or empty($_POST["genreinput"]) or empty($_POST["studioinput"]) or empty($_POST["directorinput"])){
		$inpouterror .= "Osa infot on sisestamata! ";
		
	}
	if($_POST["yearinput"] < 1895 or $_POST["yearinput"] > date("Y")){
		$inputerror .= "Ebareaalne valmimisaasta. ";
	}
	if(empty($inputerror)){
		writefilm($_POST["titleinput"], $_POST["yearinput"], $_POST["durationinput"], $_POST["genreinput"], $_POST["studioinput"], $_POST["directorinput"]);
	}
		// $storeinfo = storefilminfo($_POST["titleinput"], $_POST["yearinput"], $_POST["durationinput"], $_POST["genreinput"], $_POST["studioinput"], $_POST["directorinput"]);
		// if($storeinfo == 1){
			// $filmhtml = readfilms(1);
		// } else {
			// $filmhtml = "<p>Kahjuks filmi salvestamine seekord ebaõnnestus!:(</p>";
			// }
	}
  }
	  
   
   
  //$username = "Kristel Süda";
  require("header.php");
?>
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?> programmeerib veebi</h1>
  
  <ul>
   <li><a href="home.php">Avalehele</a></li>
		<li><a href="?logout=1">Logi välja</a>!</li>
  </ul>
  <hr>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<label for="titleinput">Filmi pealkiri: </label>
		<input type="text" name="titleinput" id="titleinput" placeholder="Filmi pealkiri">
		<br>
	<label for="yearinput">Filmi aasta: </label>
		<input type="number" name="yearinput" id="yearinput" value="<?php echo date("Y"); ?>">
		<br>
	<label for="durationinput">Filmi kestus minutites: </label>
		<input type="number" name="duratoninput" id="durationinput" value="90">
		<br>
	<label for="genreinput">Filmi žanr: </label>
		<input type="text" name="genreinput" id="genreinput" placeholder="Filmižanr">
		<br>
	<label for="studioinput">Filmi tootja: </label>
		<input type="text" name="studioinput" id="studioinput" placeholder="Tootja/stuudio">
		<br>
	<label for="directorinput">Filmi lavastaja: </label>
		<input type="text" name="directorinput" id="directorinput" placeholder="Filmi lavastaja">
		<br>
	<input type="submit" name="filmsubmit" value="Savesta filmi info">

  </form>
  <p><?php echo $inputerror; ?></p>
  <hr>  
 
</body>
</html>