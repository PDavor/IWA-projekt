<?php
	session_start();
	include_once("baza.php");
	$veza = spojiSeNaBazu();
	if(!isset($_SESSION["id"])){
			header("Location:prijava.php");
	}
?>
<?php include "zaglavlje.php" ?>
<title>Moj račun</title>
<?php include "zaglavlje_nastavak.php" ?>
<section>
	<h1 style="text-align: center">Moj račun</h1>
	<h2>Stanje računa</h2>
	<hr />
	<?php
	$sid = $_SESSION["id"];
	$sredstva = "SELECT s.iznos, v.naziv FROM sredstva s, valuta v WHERE s.valuta_id=v.valuta_id AND korisnik_id=$sid";
	$rez = izvrsiUpit($veza, $sredstva);
	foreach($rez as $v) {
		$naziv = $v["naziv"];
		$iznos = $v["iznos"];
		echo $naziv . " | ";
		echo $iznos . "<br>";
		}
		?>
	<h2>Ažuriraj stanje</h2>
	<hr />
	<form name="stanje" id="stanje" method="POST" action="azuriraj.php" >
		<label for="valuta">Valuta: </label><br/>
		<select name="valuta" id="valuta">
			<?php
			$naz = "SELECT naziv FROM valuta";
			$r = izvrsiUpit($veza, $naz);
			foreach ($r as $v){ 
				$naziv = $v["naziv"];
				?>
				<option value="<?php echo $naziv ?>"><?php echo $naziv ?></option>
			<?php }
			?>
		</select>
		<br />
		<label for="iznos">Iznos: </label><br/>
		<input name="iznos" id="iznos" type="text"/><br/><br/>
		<input type="submit" name="stanjes" id="stanjes" value="Ažuriraj" />
	</form>
	<h2>Zahtjev za prodajom</h2>
	<hr />
	<form name="zahtjev" id="zahtjev" method="POST" action="zahtjev.php" >
		<label for="valuta_prodaje">Valuta prodaje: </label><br/>
		<select name="valuta_prodaje" id="valuta_prodaje">
			<?php
			$naz = "SELECT naziv FROM valuta";
			$r = izvrsiUpit($veza, $naz);
			foreach ($r as $v){ 
				$naziv = $v["naziv"];
				?>
				<option value="<?php echo $naziv ?>"><?php echo $naziv ?></option>
			<?php }
			?>
		</select>

		<br />
		<label for="iznos_zahtjev">Iznos prodaje: </label><br/>
		<input name="iznos_zahtjev" id="iznos_zahtjev" type="text"/><br/><br/>

		<label for="valuta_kupuje">Valuta kupnje: </label><br/>
		<select name="valuta_kupuje" id="valuta_kupuje">
			<?php
			$naz = "SELECT naziv FROM valuta";
			$r = izvrsiUpit($veza, $naz);
			foreach ($r as $v){ 
				$naziv = $v["naziv"];
				?>
				<option value="<?php echo $naziv ?>"><?php echo $naziv ?></option>
			<?php }
			?>
		</select>
		<br /><br />
		<input type="submit" name="submit" id="submit" value="Podnesi zahtjev" />
	</form>
	<h2>Moji zahtjevi</h2>
	<hr />
	<table>
				<caption>Pregled mojih zahtjeva</caption>
				<thead>
					<tr>
						<th>Prodajem</th>
						<th>Kupujem</th>
						<th>Prodajni iznos</th>
						<th>Stanje</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$upit_popis = "SELECT (SELECT naziv FROM valuta WHERE valuta_id=prodajem_valuta_id) as prodajem, (SELECT naziv FROM valuta WHERE valuta_id=kupujem_valuta_id) as kupujem, iznos as prodajni_iznos, prihvacen FROM zahtjev WHERE korisnik_id={$_SESSION["id"]}";
						$izvrsi_popis = izvrsiUpit($veza, $upit_popis);
						foreach ($izvrsi_popis as $v){
							echo "<tr>";
							echo "<td>" . $v["prodajem"] . "</td>";
							echo "<td>" . $v["kupujem"] . "</td>";
							echo "<td>" . $v["prodajni_iznos"] . "</td>";
							if($v["prihvacen"] == 0){
								echo "<td>Odbijen</td>";
							}elseif($v["prihvacen"] == 1){
								echo "<td>Prihvačen</td>";
							}elseif($v["prihvacen"] == 2){
								echo "<td>Čeka se odobrenje</td>";
							}
							
							echo "</tr>";
						}
					?>
				</tbody>
			</table>

	
</section>
<?php include("podnozje.php") ?>
