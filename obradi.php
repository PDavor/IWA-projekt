<?php
	session_start();
	include_once("baza.php");
	$veza = spojiSeNaBazu();
	$u1 = "SELECT * FROM zahtjev WHERE zahtjev_id = {$_POST['idzahtjeva']}";
	foreach(izvrsiUpit($veza, $u1) as $v){
		echo $v['zahtjev_id'] . "<br>";
		echo $v['korisnik_id'] . "<br>";
		echo $v['iznos'] . "<br>";
		echo $v['prodajem_valuta_id'] . "<br>";
		echo $v['kupujem_valuta_id'] . "<br>";
		echo $v['datum_vrijeme_kreiranja'] . "<br>";
		echo $v['prihvacen'] . "<br>";
	}
	$upit_vrijeme = "SELECT aktivno_od, aktivno_do FROM valuta v, zahtjev z WHERE v.valuta_id = {$v['prodajem_valuta_id']}  AND z.zahtjev_id = {$_POST['idzahtjeva']}";
	foreach (izvrsiUpit($veza, $upit_vrijeme) as $vri){
		$pocetno = $vri["aktivno_od"];
		$zavrsno = $vri["aktivno_do"];
	}
	$trenutno = date("H:i:s");
	if ($trenutno > $pocetno && $trenutno < $zavrsno){

		$u2 = "UPDATE zahtjev SET prihvacen = {$_POST['stanje']} WHERE zahtjev_id = {$v['zahtjev_id']}";
		izvrsiUpit($veza, $u2);
		
		if ($_POST["stanje"] == 1) {

			$u3i = "SELECT iznos FROM sredstva WHERE korisnik_id = {$v['korisnik_id']} AND valuta_id = {$v['prodajem_valuta_id']}";
			foreach(izvrsiUpit($veza, $u3i) as $j){
				$si = $j['iznos'];
			}

			$piznos = $si - $v['iznos']; 

			$u3 = "UPDATE sredstva SET iznos = $piznos WHERE korisnik_id = {$v['korisnik_id']} AND valuta_id = {$v['prodajem_valuta_id']}";
			izvrsiUpit($veza, $u3);

			$u4i = "SELECT iznos FROM sredstva WHERE korisnik_id = {$v['korisnik_id']} AND valuta_id = {$v['kupujem_valuta_id']}";
			foreach(izvrsiUpit($veza, $u4i) as $k){
				$ki = $k['iznos'];
			}

			$u4p = "SELECT * FROM valuta WHERE valuta_id = {$v['prodajem_valuta_id']}";
			foreach(izvrsiUpit($veza, $u4p) as $tp){
				$prodajni = $tp['tecaj'];
			}

			$u4p = "SELECT * FROM valuta WHERE valuta_id = {$v['kupujem_valuta_id']}";
			foreach(izvrsiUpit($veza, $u4p) as $tk){
				$kupovni = $tk['tecaj'];
			}
			$tec = $prodajni / $kupovni;
			$balans = $ki + ($v['iznos'] * $tec);
			echo "balans: " . $balans;


			$u41 = "SELECT * FROM sredstva WHERE korisnik_id = {$v['korisnik_id']} AND valuta_id = {$v['kupujem_valuta_id']}";
			$u4umetni = "INSERT INTO sredstva (korisnik_id, valuta_id, iznos) VALUES ({$v['korisnik_id']}, {$v['kupujem_valuta_id']}, $balans)";
			foreach(izvrsiUpit($veza, $u41) as $t){
				$provjera = $t['valuta_id'];
			}
			if($provjera == $v['kupujem_valuta_id']){
				$u4 = "UPDATE sredstva SET iznos = $balans WHERE korisnik_id = {$v['korisnik_id']} AND valuta_id = {$v['kupujem_valuta_id']}";
				izvrsiUpit($veza, $u4);
			}else{
				$u4umetni = "INSERT INTO sredstva (korisnik_id, valuta_id, iznos) VALUES ({$v['korisnik_id']}, {$v['kupujem_valuta_id']}, $balans)";
				izvrsiUpit($veza, $u4umetni);
			}
			
			header("Location: zahtjevi.php?status=1");
		}else {
			header("Location: zahtjevi.php?status=2");
		}
	}else{
		header("Location: zahtjevi.php?status=3");
	}

	zatvoriVezuNaBazu($veza);

?>