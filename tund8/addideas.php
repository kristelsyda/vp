<?php  
  require("usesession.php");
  //var_dump($_POST);
  require("../../../config.php");
  $database = "if20_kristel_sy_2";
  
  if(isset($_POST["ideasubmit"]) and !empty($_POST["ideainput"])){
		  
		  //loome andmebaasi ühenduse
		  $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
		  //valmistame ette SQL käsu andmete kirjutamiseks
		  $stmt = $conn->prepare("INSERT INTO nonsens (nonsensidea) VALUES(?)");
		  echo $conn->error;
		  //s - string, i -integer, d-decimal
		  $stmt->bind_param("s", $_POST["nonsens"]);
		  $stmt->execute();
		  //käsk ja ühendus sulgeda
		  $stmt->close();
		  $conn->close();
	} 
  
  
  //$username = "Kristel Süda";
  require("header.php");
?>

  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?> programmeerib veebi</h1>tyle="font-family:Courier; color:#DC6B32;">Sisu pole. Lihtsalt üks tore kassipilt :)</p>
  
  <ul>
	<li><a href="home.php">Avalehele</a></li>
		<li><a href="?logout=1">Logi välja</a>!</li>
  </ul>
  
  <form method="POST">
    <label>Kirjutage oma esimene pähe tulev mõte ... või teine</label>
		<input type="text" name="nonsens" placeholder="mõttekoht">
		<input type="submit" value="Saada mõte teele!" name="submitnonsens">
  </form>
  <hr>

</body>
</html>