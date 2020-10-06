<?php
  //var_dump($_POST);
  require("../../../config.php");
  $database = "if20_kristel_sy_2";
  
  if(isset($_POST["ideasubmit"]) and !empty($_POST["ideainput"])){
	  //loome andmebaasiga ühenduse
	  $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
	  //valmistan ette SQL käsu andmete kirjutamiseks
	  $stmt = $conn->prepare("INSERT INTO myideas (idea) VALUES(?)");
	  echo $conn->error;
	  //i - integer, d - decimal, s - string 
	  $stmt->bind_param("s", $_POST["ideainput"]);
	  $stmt->execute();
	  $stmt->close();
	  $conn->close();
  }
  
  $username = "Kristel Süda";
  require("header.php");
?>
<form action="/action_page.php">
  <label for="fname">Eesnimi:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Perekonnanimi:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <input type="submit" value="Submit">
  
  <input type="radio" name="genderinput" id="gendermale" value="1"><label for="gendermale">Mees</label>
  <input type="radio" name="genderinput" id="genderfemale" value="2"><label for="genderfemale">Naine</label>
  
  <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
	
  <label for="psw"><b>Salasõna</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Salasõna uuesti</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
	
  
</form>



 <<img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1 style="color:#DC32A3;">Cat Shrine</h1>
  <h3 style="color:#DC324E;"><?php echo $username; ?></h3>
  <p style="font-family:Courier; color:#DC6B32;">Sisu pole. Lihtsalt üks tore kassipilt :)</p>
  <p><a href="home.php">Avalehele</a></p>
  <form method="POST">
    <label>Kirjutage oma esimene pähe tulev mõte ... või teine</label>
	<input type="text" name="ideainput" placeholder="mõttekoht">
	<input type="submit" name="ideasubmit" value="Saada mõte teele!">
  </form>
  <hr>

</body>
</html>