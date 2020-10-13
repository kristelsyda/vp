<?php
  require("../../../config.php");
   //$database = "if20_kristel_sy_2";
  require("fnc_film.php");
     
   $inputerror = "";
   $filmhtml = "";
  //kas vajutati salvestus nuppu
  if(isset($_POST["filmsubmit"])){
	if(empty($_POST["titleinput"]) or empty($_POST["genreinput"]) or empty($_POST["studioinput"]) or empty($_POST["directorinput"])){
		$inpouterror .= "Osa infot on sisestamata! ";
		
	}
	if($_POST["yearinput"] <1895 or $_POST["yearinput"] > date("Y")){
		$inputerror .= "Ebareaalne valmimisaasta. ";
	}
	if(empty($inputerror)){
		$storeinfo = storefilminfo($_POST["titleinput"], $_POST["yearinput"], $_POST["durationinput"], $_POST["genreinput"], $_POST["studioinput"], $_POST["directorinput"]);
		if($storeinfo == 1){
			$filmhtml = readfilms(1);
		} else {
			$filmhtml = "<p>Kahjuks filmi salvestamine seekord ebaõnnestus!:(</p>";
			}
	}
  }
	  
   
   
  $username = "Kristel Süda";
  require("header.php");
?>

  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1><?php echo $username; ?></h1>
  <ul>
   <li><a href="home.php">Avalehele</a></li>
  </ul>
  
  <form method="POST">
	<label for="titleinput">Filmi pealkiri</label>
	<input type="text" name="titleinput" id="titleinput" placeholder="Filmi pealkiri">
	<label for="yearinput">Filmi aasta</label>
	<input type="number" name="yearinput" id="yearinput" value="<?php echo date("Y"); ?>">
	<label for="durationinput">Filmi kestus minutites</label>
	<input type="number" name="duratoninput" id="durationinput" value="90">
	<label for="genreinput">Filmi žanr</label>
	<input type="text" name="genreinput" id="genreinput" placeholder="Filmižanr">
	<label for="studioinput">Filmi tootja</label>
	<input type="text" name="studioinput" id="studioinput" placeholder="Tootja/stuudio">
	<label for="directorinput">Filmi lavastaja</label>
	<input type="text" name="directorinput" id="directorinput" placeholder="Filmi lavastaja">
	<br>
	<input type="submit" name="filmsubmit" value="Savesta filmi info">

  </form>
  <p><?php echo $inputerror; ?></p>
  <hr>  
  <?php //echo $filmhtml; 
	echo $filmhtml;
  ?>
</body>
</html>