<?php
	$username = "Kristel S�da";
	$fulltimenow = date("d.m.Y H:i:s");
	$hournow = date("H");
	$partofday = "lihtsalt aeg";
	if($hournow < 7){
		$partofday = "uneaeg";
	}
	if($hournow >= 8 and $hournow < 18){
		$partofday = "akadeemilise aktiivsuse aeg";
	}
?>

<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title><?php echo $username; ?></title>

</head>
<body>
  <h1 style="color:#DC32A3;">Cat Shrine</h1>
  <h3 style="color:#DC324E;"><?php echo $username; ?></h3>
  <p style="font-family:Courier; color:#DC6B32;">Sisu pole. Lihtsalt �ks tore kassipilt :)</p>
  <img src="https://i.chzbgr.com/full/9375248640/h8C800AA5/necklace" alt="Valge kass kahe kaelakeega">
  <p>Lehe avamise hetkel oli: <?php echo $fulltimenow; ?>.</p>
  <p><?php echo "Parajasti on " .$partofday ."."; ?></p>
	
</body>
</html>

