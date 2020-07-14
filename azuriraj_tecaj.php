<?php
session_start();
include_once("baza.php");
$veza = spojiSeNaBazu();

$danas = date("Y-m-d");
$u1 = "SELECT * FROM valuta WHERE naziv = '{$_POST["naziv"]}'";
foreach(izvrsiUpit($veza, $u1) as $pv){
	$proslo = $pv['datum_azuriranja'];
}

$r = strtotime($danas) - strtotime($proslo);

if ($r > 86400){
		$u2 = "UPDATE valuta SET tecaj = {$_POST['tecaj']}, datum_azuriranja='$danas' WHERE naziv = '{$_POST["naziv"]}' AND moderator_id = {$_SESSION["id"]}";
		izvrsiUpit($veza, $u2);
		header("Location: zahtjevi.php?vstat=1");
	}else{
		header("Location: zahtjevi.php?vstat=2");
	}
zatvoriVezuNaBazu($veza);
?>