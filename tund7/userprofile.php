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
  //$database = "if20_kristel_sy_2";
  //require("fnc_common.php");
  require("fnc_user.php");
  
  $notice = "";
  $description = readdescription();
  
  //$userdescription = ""; //edaspidi püüate andmevbaasist lugeda, kui on, kasutate seda väärtust
  // if(!empty($_POST["descriptioninput"])){
	  // $userdescription = test_input($_POST["descriptioninput"]);
  // } else {
	  // $userdescription = readuserdescription();
  // }
    
  if(isset($_POST["profilesubmit"])){
	$notice = storeuserprofile($_POST["descriptioninput"], $_POST["bgcolorinput"], $_POST["txtcolorinput"]);
	$description = $_POST["descriptioninput"];
	$_SESSION["txtcolor"] = $_POST["txtcolorinput"];
    $_SESSION["bgcolor"] = $_POST["bgcolorinput"];
  }
	
	// $description = test_input($_POST["descriptioninput"]);
	// $result = storeuserprofile($description, $_POST["bgcolorinput"], $_POST["txtcolorinput"]);
	//sealt peaks tulema kas "ok" või mingi error!
	// if($result == "ok"){
		// $notice = "Kasutajaprofiil on salvestatud!";
		// $_SESSION["userbgcolor"] = $_POST["bgcolorinput"];
		// $_SESSION["usertxtcolor"] = $_POST["txtcolorinput"];
	// } else {
		// $notice = "Profiili salvestamine ebaõnnestus!";
	// }
  // }
  
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
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="descriptioninput">Minu lühitutvustus:</label>
		<textarea rows="10" cols="80" name="descriptioninput" id="descriptioninput" placeholder="Minu tutvustus ..."><?php echo $description; ?></textarea>
		<br>
		// <textarea name="descriptioninput" id="descriptioninput" rows="10" cols="80" placeholder="Minu tutvustus ..."><?php echo $userdescription; ?></textarea>
		// <br>
		<label for="bgcolorinput">Minu valitud taustavärv: </label>
		<input type="color" name="bgcolorinput" id="bgcolorinput" value="<?php echo $_SESSION["userbgcolor"]; ?>">
		<br>
		<label for="txtcolorinput">Minu valitud tekstivärv: </label>
		<input type="color" name="txtcolorinput" id="txtcolorinput" value="<?php echo $_SESSION["usertxtcolor"]; ?>">
		<br>
		<input type="submit" name="profilesubmit" value="Salvesta profiil!">
		// <span><?php echo $notice; ?></span>
  </form>
  <p><?php echo $notice; ?></p>

</body>
</html>
