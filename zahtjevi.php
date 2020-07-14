<?php
session_start();
include_once("baza.php");
$veza = spojiSeNaBazu();
if(!isset($_SESSION["id"])){
		header("Location:prijava.php");
	}
	elseif($_SESSION["tip"] == 2){
		header("Location:index.php");
	}
?>
<?php include "zaglavlje.php" ?>
<title>Zahtjevi korisnika</title>
<?php include "zaglavlje_nastavak.php" ?>
<section>
	<h1>Moderator stranica</h1>
	<h2>Neobrađeni zahtjevi</h2>
	<hr />
	<table>
		<caption>Zahtjevi korisnika</caption>
		<thead>
			<tr>
				<th>ID zahtjeva</th>
				<th>Korisničko ime</th>
				<th>Prodaje</th>
				<th>Kupuje</th>
				<th>Prodajni iznos</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$upit_popis = "SELECT *, pr.naziv AS p, ku.naziv AS k, korisnik.korisnicko_ime FROM zahtjev INNER JOIN valuta AS ku ON zahtjev.kupujem_valuta_id=ku.valuta_id INNER JOIN valuta AS pr ON zahtjev.prodajem_valuta_id=pr.valuta_id INNER JOIN korisnik ON korisnik.korisnik_id=zahtjev.korisnik_id WHERE prihvacen = 2";
				
				$izvrsi_popis = izvrsiUpit($veza, $upit_popis);
				foreach ($izvrsi_popis as $v){
					echo "<tr>";
					echo "<td>" . $v["zahtjev_id"] . "</td>";
					echo "<td>" . $v["korisnicko_ime"] . "</td>";
					echo "<td>" . $v["p"] . "</td>";
					echo "<td>" . $v["k"] . "</td>";
					echo "<td>" . $v["iznos"] . "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
	<h2>Prihvati/odbij zahtjev</h2>
	<hr />
	<form name="zahtjev_obrada" id="zahtjev_obrada" method="POST" action="obradi.php" >
		<label for="idzahtjeva">ID zahtjeva</label><br/>
		<input name="idzahtjeva" id="idzahtjeva" type="text" /><br/>
		<select name="stanje" id="stanje">
			<option value="1">Prihvati</option>
			<option value="0">Odbij</option>
		</select>
		<input type="submit" name="submit" id="submit" value="Unesi" />
	</form>
	<?php
	if (isset($_GET['status']))
	{
		if ($_GET['status'] == 1){
			echo "<p>Zahtjev je uspješno odobren!</p>";
		}else if($_GET['status'] == 2) {
			echo "<p>Zahtjev je uspješno odbijen!</p>";
		}
		else if($_GET['status'] == 3) {
			echo "<p>Trenutno ne možete obraditi ovaj zahtjev!</p>";
		}
	}
	
	?>
	<h2>Ažuriraj tečaj</h2>
	<hr />
	<table>
		<caption>Valute</caption>
		<thead>
			<tr>
				<th>Naziv</th>
				<th>Tecaj</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$ut = "SELECT * FROM valuta WHERE moderator_id = {$_SESSION['id']}";
				foreach (izvrsiUpit($veza, $ut) as $u){
					echo "<tr>";
					echo "<td>" . $u["naziv"] . "</td>";
					echo "<td>" . $u["tecaj"] . "</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
	<br />
	<form name="azuriraj_tecaj" id="azuriraj_tecaj" method="POST" action="azuriraj_tecaj.php" >
		<label for="naziv">Naziv:</label><br/>
		<select name="naziv" id="naziv">
		<?php
			foreach(izvrsiUpit($veza, $ut) as $n){?>
				<option value="<?php echo $n['naziv']?>"><?php echo $n['naziv']?></option>
			<?php } ?>
		</select>
		<br />
		<label for="tecaj">Novi tecaj:</label><br/>
		<input name="tecaj" id="tecaj" type="text" /><br/>
		<input type="submit" name="azuriraj_t" id="azuriraj_t" value="Unesi" />
	</form>
	<?php
	if (isset($_GET['vstat']))
	{
		if ($_GET['vstat'] == 1){
			echo "<p>Uspješno ste ažurirali valutu!</p>";
		}else if($_GET['vstat'] == 2) {
			echo "<p>Valuta nije ažurirana! Pričekajte 1 dan!</p>";
		}
	}
	?>
</section>
<?php include("podnozje.php") ?>
