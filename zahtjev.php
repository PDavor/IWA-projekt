<?php
		session_start();
		include_once("baza.php");
		$veza = spojiSeNaBazu();
		$id_k = $_SESSION["id"];
		$upit_id_v = "SELECT valuta_id FROM valuta WHERE naziv = '{$_POST["valuta_prodaje"]}'";
		$izv = izvrsiUpit($veza, $upit_id_v);
		foreach ($izv as $v){
			$id_v = $v["valuta_id"];
		}
		$piznos = "SELECT iznos FROM sredstva WHERE korisnik_id = {$id_k} AND valuta_id= {$id_v}";
		$piznos_izvrseno = izvrsiUpit($veza, $piznos);
		foreach ($piznos_izvrseno as $vrijednost){
			$i = $vrijednost["iznos"];
		}

		echo "I: " . $i . "<BR>";
		echo "Zahtjev: " . $_POST["iznos_zahtjev"];
		if($_POST["iznos_zahtjev"] <= $i){
			$datum = date("Y-m-d H:i:s");
			$prodajna_valuta = "SELECT valuta_id FROM valuta WHERE naziv = '{$_POST["valuta_prodaje"]}'";
			$prodaja_rezultat = izvrsiUpit($veza, $prodajna_valuta);
			foreach ($prodaja_rezultat as $v){
				$p = $v["valuta_id"];
			}
			$kupovna_valuta = "SELECT valuta_id FROM valuta WHERE naziv = '{$_POST["valuta_kupuje"]}'";
			$kupovna_rezultat = izvrsiUpit($veza, $kupovna_valuta);
			foreach ($kupovna_rezultat as $v){
				$k = $v["valuta_id"];
			}
			$zunesi = "INSERT INTO zahtjev (korisnik_id, iznos, prodajem_valuta_id, kupujem_valuta_id, datum_vrijeme_kreiranja, prihvacen) VALUES ({$_SESSION["id"]},{$_POST["iznos_zahtjev"]},{$p},{$k},'{$datum}', 2)";
			izvrsiUpit($veza, $zunesi);
			header("Location: racun.php");
		}else{
			echo "Nemate dovoljno novca u toj valuti!";
		}
		
		zatvoriVezuNaBazu($veza);
		
?>

