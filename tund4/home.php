<?php
	//var_dump($_POST);
		
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
	if($hournow >= 16 and $hournow <=17){
		$partofday = "aeg koju minna";
	}
	if($hournow > 17 and $hournow <=19){
		$partofday = "vaba aeg!";
	}
	if($hournow > 19 and $hournow <=23){
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
	//for($i = 0; $i < $piccount; $i ++){
			//<img src="../img/pildifail" alt="tekst">
			//$imghtml .= '<img src="../vp_pics/' .$picfiles[$i] .'" alt="Tallinna Ülikool">';
	//}
	$imghtml = '<img src='../vp_pics/' .$picfiles[mt_rand(0,($piccount - 1))] .'" alt="Tallinna Ülikool">';
	
	require("header.php");
?>

  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
  <h1 style="color:#DC32A3;">Cat Shrine</h1>
  <h3 style="color:#DC324E;"><?php echo $username; ?></h3>
  <p style="font-family:Courier; color:#DC6B32;">Sisu pole. Lihtsalt üks tore kassipilt :)</p>
  <p>
  <img src="https://i.chzbgr.com/full/9375248640/h8C800AA5/necklace" alt="Valge kass kahe kaelakeega">
  <ul>
    <li><a href="addideas.php">Oma mõtete salvestamine</a></li>
	<li><a href="listideas.php">Mõtete vaatamine</a></li>
	<li><a href="listfilm.php">Filmide nimekirja vaatamine</a></li>
	<li><a href="addfilm.php">Filmide pealkirjade lisamine</a></li>
  </ul>
  <p>Lehe avamise hetkel oli: <?php echo $weekdaynameset[$weekdaynow - 1] .", " .$fulltimenow; ?>.</p>
  <p><?php echo "Parajasti on " .$partofday ."."; ?></p>
  <p><?php echo $semesterinfo ?></p>
  <hr>
  <?php echo $imghtml; ?>
</body>
</html>

