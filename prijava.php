<?php
session_start();
	include_once("baza.php");
	$veza = spojiSeNaBazu();
	if(isset($_GET["odjava"])){
		unset($_SESSION["id"]);
		unset($_SESSION["tip"]);
		unset($_SESSION["korisnicko_ime"]);
		unset($_SESSION["lozinka"]);
		unset($_SESSION["ime"]);
		unset($_SESSION["prezime"]);
		unset($_SESSION["email"]);
		unset($_SESSION["slika"]);
		session_destroy();
	}
	if(isset($_POST["prijavi"])){
		$korime = $_POST["korime"];
		$lozinka = $_POST["lozinka"];
		if(isset($korime) && !empty($korime)
			&& isset($lozinka) && !empty($lozinka)){
				$upit = "SELECT * FROM korisnik 
				WHERE korisnicko_ime='{$korime}' 
				AND lozinka='{$lozinka}'";
				$rezultat = izvrsiUpit($veza, $upit);
				$prijava = false;
				while($red = mysqli_fetch_array($rezultat)){
					$_SESSION["id"] = $red[0];
					$_SESSION["tip"] = $red[1];
					$_SESSION["korisnicko_ime"] = $red[2];
					$_SESSION["lozinka"] = $red[3];
					$_SESSION["ime"] = $red[4];
					$_SESSION["prezime"] = $red[5];
					$_SESSION["email"] = $red[6];
					$_SESSION["slika"] = $red[7];
					$prijava = true;
				}
				
				if($prijava) {
					header("Location: racun.php");
				}
				
		}
		
	}
	zatvoriVezuNaBazu($veza);
?>
<?php include "zaglavlje.php" ?>
<title>Naslovna</title>
<?php include "zaglavlje_nastavak.php" ?>
<section id="prijava">
	<h1>Prijava</h1>
	<form name="prijava" id="prijava" method="POST" action="prijava.php" >
		<label for="korime">Korisničko ime: </label><br/>
		<input name="korime" id="korime" type="text" /><br/>
		<label for="lozinka">Lozinka: </label><br/>
		<input name="lozinka" id="lozinka" type="password" /><br/><br/>
		<input type="submit" name="prijavi" id="pravij" value="Prijavi se" />
	</form>
</section>
<?php include("podnozje.php") ?>

