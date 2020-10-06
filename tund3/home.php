<?php
	//var_dump($_POST);
	require("../../../config.php");
	$database = "if20_kristel_sy_2";
	
	if(isset($_POST["ideasubmit"]) and !empty($_POST["ideainput"])){
		//loome andmebaasiga ühenduse
		$conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
		//valmistan ette sql käsu andmete kirjutamiseks
		//pärast prepare SQL kood
		$stmt = $conn->prepare("INSERT INTO myideas (idea) VALUES(?)");
		echo $conn->error;
		//i - integer (täisarv), d - decimal (komakohaga), s -string(text)
		$stmt->bind_param("s", $_POST["ideainput"]);
		$stmt->execute();
		$stmt->close();
		$conn->close();
	}
	
	//loen andmebaasist senised mõtted
	$ideahtml ="";
	$conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
	$stmt = $conn->prepare("SELECT idea FROM myideas");
	//seon tulemuse muutujaga
	$stmt->bind_result($ideafromdb);
	$stmt->execute();
	while($stmt->fetch()){
		$ideahtml .= "<p>" .$ideafromdb . "</p>";
	}
	$stmt->close();
	$conn->close();
	
	$username = "Kristel Süda";
	$fulltimenow = date("d.m.Y H:i:s");
	$hournow = date("H");
	$partofday = "lihtsalt aeg";
	
	$weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
	$monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
	//echo $weekdaynameset[1];
	$weekdaynow = date("N");
	
	if($hournow < 7){
		$partofday = "uneaeg";
	} 
	if($hournow >= 8 and $hournow < 16){
		$partofday = "akadeemilise aktiivsuse aeg";
	}
	if($hournow >= 16 and $hournow <=17{
		$partofday = "aeg koju minna";
	}
	if($hournow > 17 and $hournow <=19{
		$partofday = "vaba aeg!";
	}
	if($hournow > 19 and $hournow <=23{
		$partofday = "aeg õppida!";
	}
	
	
	//vaatame semestri kulgemist
	$semesterstart = new DateTime("2020-8-31");
	$semesterend = new DateTime("2020-12-13");
	//selgitame välja nende vahe ehk erinevuse
	$semesterduration = $semesterstart->diff($semesterend);
	//leiame selle päevade arvuna
	$semesterdurationdays = $semesterduration->format("%r%a");
	
	//tänane päev
	$today = new DateTime("now");
	//if($fromsemesterstartdays < 0) {semester pole peale hakanud}
	$fromsemesterstart = $semesterstart->diff($today);
	$fromsemesterstartdays = $fromsemesterstart->format("%r%a");
	$semesterpercentage = 0;
	
	$semesterinfo = "Semester kulgeb vastavalt akadeemilisele kalendrile.";
	if($semesterstart > $today){
	  $semesterinfo = "Semester pole peale hakanud!";
	}
	if($semesterstart == 0){
	  $semesterinfo = "Semester saab täna alguse!";
	}
	if($fromsemesterstartdays > 0 and $fromsemesterstartdays < $semesterdurationdays){
	  $semesterpercentage = ($fromsemesterstartdays / $semesterdurationdays) * 100;
	  $semesterinfo = "Semester on täies hoos, kestab juba " .$fromsemesterstartdays ." päeva ning läbitud on " .$semesterpercentage ."%.";
	}
	if($fromsemesterstartdays == $semesterdurationdays){
	  $semesterinfo = "Semester lõppeb täna!";
	}
	if($fromsemesterstartdays == $semesterdurationdays){
	  $semesterinfo = "Semester on lõpuks läbi!";
	}
	
	
	//loeme kataloogist piltide nimekirja
	$allfiles = scandir("../vp_pics/");
	//var_dump($allfiles);
	$picfiles = array_slice($allfiles, 2);
	$imghtml = "";
	$piccount = count($picfiles);
	for($i = 0; $i < $piccount; $i ++){
			//<img src="../img/pildifail" alt="tekst">
			$imghtml .= '<img src="../vp_pics/' .$picfiles[$i] .'" alt="Tallinna Ülikool">';
	}
	require("header.php");
?>

  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1 style="color:#DC32A3;">Cat Shrine</h1>
  <h3 style="color:#DC324E;"><?php echo $username; ?></h3>
  <p style="font-family:Courier; color:#DC6B32;">Sisu pole. Lihtsalt üks tore kassipilt :)</p>
  <p>Lehe avamise hetkel oli: <?php echo $weekdaynameset[$weekdaynow - 1] .", " .$fulltimenow; ?>.</p>
  <p><?php echo "Parajasti on " .$partofday ."."; ?></p>
  <hr>
  <?php echo $imghtml; ?>
  <hr>
  <form method="POST">
	<label>Kirjutage oma esimene pähe tulev mõte ... või teine</label>
	<input type="text" name="ideainput" placeholder="mõttekoht">
	<input type="submit" name="ideasubmit" value="Saada mõte teele!">
  </form>
  <hr>
  <?php echo $ideahtml; ?>
</body>
</html>

