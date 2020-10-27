<?php
  $database = "if20_kristel_sy_2";

  //andmebaasist fimide lugemise funktsioon
  function readfilms() {
	  $conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
	  //$stmt = $conn->prepare("SELECT pealkiri, aasta, kestus, zanr, tootja, lavastaja FROM film");
	  $stmt = $conn->prepare("SELECT * FROM film");
	  echo $conn->error;
	  
	  //seon tulemuse muutujaga
	  $stmt->bind_result($titlefromdb, $yearfromdb, $durationfromdb, $genrefromdb, $studiofromdb, $directorfromdb);
	  $stmt->execute();
	  $filmhtml = "\t <ol> \n";
	  //võetakse kuni jätkub
	  while($stmt->fetch()){
		  $filmhtml .= "\t \t <li>" .$titlefromdb ."\n";
		  $filmhtml .= "\t \t \t  <ul> \n";
		  $filmhtml .= "\t \t \t \t <li>Aasta: " .$yearfromdb ."</li> \n";
		  $filmhtml .= "\t \t \t \t <li>Kestus: " .$durationfromdb ." minutit</li> \n";
		  $filmhtml .= "\t \t \t \t <li>Žanr: " .$genrefromdb ."</li> \n";
		  $filmhtml .= "\t \t \t \t <li>Tootja: " .$studiofromdb ."</li> \n";
		  $filmhtml .= "\t \t \t \t <li>Lavastaja: " .$directorfromdb ."</li> \n";
		  $filmhtml .= "\t \t \t  </ul> \n";
		  $filmhtml .= "\t \t</li> \n";
	  }
	  $filmhtml .= "\t </ol> \n";
	  
	  $stmt->close();
	  $conn->close();
	  return $filmhtml;	
  }//read films lõpeb
  
  function writefilm($title, $year, $duration, $genre, $studio, $director){
	$conn = new mysqli($GLOBALS["serverhost"], $GLOBALS["serverusername"], $GLOBALS["serverpassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO film (pealkiri, aasta, kestus, zanr, tootja, lavastaja) VALUES(?,?,?,?,?,?)");
	echo $conn->error;
	$stmt->bind_param("siisss", $title, $year, $duration, $genre, $studio, $director);
	$stmt->execute();
	$stmt->close();
	$conn->close();
  } //writefilm lõppeb
  
  