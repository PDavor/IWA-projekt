<?php
		session_start();
		include_once("baza.php");
		$veza = spojiSeNaBazu();
		$unos_naziv = $_POST["valuta"];
		$unos_iznos = $_POST["iznos"];
		$uzmi_id = "SELECT valuta_id FROM valuta WHERE naziv =  '{$_POST["valuta"]}'";
		$rez_id = izvrsiUpit($veza, $uzmi_id);
		foreach($rez_id as $l){
			$id = $l['valuta_id'];
		}
		$kor_id = $_SESSION['id'];
		$izn = $_POST['iznos'];
		
		$provjera = "SELECT * FROM sredstva WHERE korisnik_id = {$_SESSION["id"]} AND valuta_id = {$id}";
		$rez_provjere = izvrsiUpit($veza, $provjera);
		foreach ($rez_provjere as $k){
			$vrijednost = $k["korisnik_id"];
			
		}
		if(!empty($vrijednost)){
			$unesi = "UPDATE sredstva SET iznos = {$izn} WHERE korisnik_id = {$kor_id} AND valuta_id = {$id}";
		}
		else{
			$unesi = "INSERT INTO sredstva (korisnik_id, valuta_id, iznos) VALUES ({$kor_id}, {$id}, {$izn})";
		}
		izvrsiUpit($veza, $unesi);
		zatvoriVezuNaBazu($veza);
		header("Location: racun.php");
?>