<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:prijava.php");
} elseif ($_SESSION["tip"] != 0) {
    header("Location:index.php");
}
include_once ("baza.php");
$veza = spojiSeNaBazu();

if (!empty($_POST['filter'])) {
    $u1 = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$_POST["filter"]}' OR ime = '{$_POST["filter"]}' OR prezime = '{$_POST["filter"]}'";
} else {
    $u1 = "SELECT * FROM korisnik";
}

if (isset($_POST['uredi'])) {
    if (count(array_filter($_POST)) == count($_POST)) {
        $uredi = "UPDATE korisnik SET 
					korisnik_id = {$_POST['id']},
					tip_korisnika_id = {$_POST['tip']},
					korisnicko_ime = '{$_POST['korisnicko_ime']}',
					lozinka = '{$_POST['lozinka']}',
					ime = '{$_POST['ime']}',
					prezimE = '{$_POST['prezime']}',
					email = '{$_POST['email']}',
					slika = '{$_POST['slika']}'
					WHERE korisnik_id = {$_POST['id']}
					";
        izvrsiUpit($veza, $uredi);
        header("Location:admin.php?kporuka=1#pretrazi");
        
    } else {
    	header("Location:admin.php?kporuka=2#pretrazi");
    }
}
if (isset($_POST['brisi'])) {
    $brisizahtjev = "DELETE FROM zahtjev WHERE korisnik_id = '{$_POST["id"]}'";
    $brisisredstva = "DELETE FROM sredstva WHERE korisnik_id = '{$_POST["id"]}'";
    $brisikorisnika = "DELETE FROM korisnik WHERE korisnik_id = '{$_POST["id"]}'";
    izvrsiUpit($veza, $brisizahtjev);
    izvrsiUpit($veza, $brisisredstva);
    izvrsiUpit($veza, $brisikorisnika);
    header("Location:admin.php?kporuka=3#pretrazi");
}
if (isset($_POST['unesi'])) {
    if (count(array_filter($_POST)) == count($_POST)) {
        $unesi = "INSERT INTO korisnik (tip_korisnika_id, korisnicko_ime, lozinka, ime, prezime, email, slika) 
						VALUES ({$_POST['tip']}, '{$_POST['korisnicko_ime']}', '{$_POST['lozinka']}', '{$_POST['ime']}', '{$_POST['prezime']}', '{$_POST['email']}', '{$_POST['slika']}')";
        izvrsiUpit($veza, $unesi);
        header("Location:admin.php?kporuka=4#pretrazi");
    } else {
        header("Location:admin.php?kporuka=2#pretrazi");
    }
}

if (!empty($_POST['filterv'])) {
    $u2 = "SELECT * FROM korisnik INNER JOIN valuta ON moderator_id = korisnik_id WHERE valuta_id = {$_POST['filterv']}";
    
} else {
    $u2 = "SELECT * FROM korisnik INNER JOIN valuta ON moderator_id = korisnik_id";
}

$datum = date('Y-m-d');
if (isset($_POST['urediv'])) {
    if (!empty($_POST['mod']) && !empty($_POST['naziv']) && !empty($_POST['tecaj']) && !empty($_POST['slikav']) && !empty($_POST['aktivno_od']) && !empty($_POST['aktivno_do'])) {
        $urediv = "UPDATE valuta SET 
				valuta_id = {$_POST['valuta_id']},
				moderator_id = {$_POST['mod']},
				naziv = '{$_POST['naziv']}',
				tecaj = {$_POST['tecaj']},
				slika = '{$_POST['slikav']}',
				zvuk = '{$_POST['zvuk']}',
				aktivno_od = '{$_POST['aktivno_od']}',
				aktivno_do = '{$_POST['aktivno_do']}',
				datum_azuriranja = '$datum'
				WHERE valuta_id = {$_POST['valuta_id']}
				";
        izvrsiUpit($veza, $urediv);
        header("Location:admin.php?vporuka=1#pretraziv");
    } else {
    	header("Location:admin.php?vporuka=2#pretraziv");
    }
}
if (isset($_POST['brisiv'])) {
    $brisiz1 = "DELETE FROM zahtjev WHERE kupujem_valuta_id = {$_POST['valuta_id']}";
    $brisiz2 = "DELETE FROM zahtjev WHERE prodajem_valuta_id = {$_POST['valuta_id']}";
    $brisiv = "DELETE FROM valuta WHERE valuta_id = {$_POST['valuta_id']}";
    $brisis = "DELETE FROM sredstva WHERE valuta_id = {$_POST['valuta_id']}";
    izvrsiUpit($veza, $brisiz1);
    izvrsiUpit($veza, $brisiz2);
    izvrsiUpit($veza, $brisis);
    izvrsiUpit($veza, $brisiv);
    header("Location:admin.php?vporuka=3#pretraziv");
}
if (isset($_POST['unesiv'])) {
    if (!empty($_POST['mod']) && !empty($_POST['naziv']) && !empty($_POST['tecaj']) && !empty($_POST['slikav']) && !empty($_POST['aktivno_od']) && !empty($_POST['aktivno_do'])) {
        $unesiv = "INSERT INTO valuta (moderator_id, naziv, tecaj, slika, zvuk, aktivno_od, aktivno_do, datum_azuriranja) 
						VALUES ({$_POST['mod']}, '{$_POST['naziv']}', {$_POST['tecaj']}, '{$_POST['slikav']}', '{$_POST['zvuk']}', '{$_POST['aktivno_od']}', '{$_POST['aktivno_do']}', '$datum')";
        izvrsiUpit($veza, $unesiv);
        header("Location:admin.php?vporuka=4#pretraziv");
    } else {
        header("Location:admin.php?vporuka=2#pretraziv");
    }
}
include "zaglavlje.php"
?>
<title>Administracija</title>
<?php include "zaglavlje_nastavak.php" ?>
<section>
	<h1>Administracija</h1>
	<hr />
	<h2>Korisnici</h2>
	<hr />
		<div class="korisnici">
			<table>
				<caption>Korisnici</caption>
				<thead>
					<tr>
						<th>ID korisnika</th>
						<th>Tip korisnika</th>
						<th>Korisničko ime</th>
						<th>Lozinka</th>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Email</th>
						<th>Slika</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach (izvrsiUpit($veza, $u1) as $v){
							echo "<tr>";
							echo "<td>" . $v["korisnik_id"] . "</td>";
							echo "<td>" . $v["tip_korisnika_id"] . "</td>";
							echo "<td>" . $v["korisnicko_ime"] . "</td>";
							echo "<td>" . $v["lozinka"] . "</td>";
							echo "<td>" . $v["ime"] . "</td>";
							echo "<td>" . $v["prezime"] . "</td>";
							echo "<td>" . $v["email"] . "</td>";
							echo "<td><img src='{$v["slika"]}' alt='{$v["korisnicko_ime"]} slika' height='100' /></td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
		<h2>Filtriraj korisnike</h2>
		<hr />
		<form name="filtriraj" id="filtriraj" method="POST" action="admin.php" >
			<label for="filter">Pretraži po korisničkom imenu, imenu ili prezimenu:</label><br/>
			<input name="filter" id="filter" type="text" /><br/>
			<input type="submit" name="filtritrajs" id="filtrirajs" value="Unesi" />
		</form>
		<h2>Uredi/izbriši/dodaj korisnika</h2>
		<hr />
		<form name="pretrazi" id="pretrazi" method="POST" action="admin.php" >
			<?php
			echo "Ako želite urediti/obrisati korisnika, prvo ga je potrebno filtrirati!<br /><br />";
			if(!empty($_POST['filter'])){
			foreach(izvrsiUpit($veza, $u1) as $k){
				
					echo "<label for='id'>Korisnik ID:</label><br/>";
					echo "<input name='id' id='id' type='text' value='{$k["korisnik_id"]}'/><br/>";

					echo "<label for='tip'>Tip korisnika:</label><br/>";
					echo "<input name='tip' id='tip' type='text' value='{$k["tip_korisnika_id"]}'/><br/>";

					echo "<label for='korisnicko_ime'>Korisnicko ime:</label><br/>";
					echo "<input name='korisnicko_ime' id='korisnicko_ime' type='text' value='{$k["korisnicko_ime"]}'/><br/>";

					echo "<label for='lozinka'>Lozinka:</label><br/>";
					echo "<input name='lozinka' id='lozinka' type='text' value='{$k["lozinka"]}'/><br/>";

					echo "<label for='ime'>Ime:</label><br/>";
					echo "<input name='ime' id='ime' type='text' value='{$k["ime"]}'/><br/>";

					echo "<label for='prezime'>Prezime:</label><br/>";
					echo "<input name='prezime' id='prezime' type='text' value='{$k["prezime"]}'/><br/>";

					echo "<label for='email'>Email:</label><br/>";
					echo "<input name='email' id='email' type='text' value='{$k["email"]}'/><br/>";

					echo "<label for='slika'>Slika:</label><br/>";
					echo "<input name='slika' id='slika' type='text' value='{$k["slika"]}'/><br/>";

					echo '<input type="submit" name="uredi" id="uredi" value="Uredi" />';
					echo '<input type="submit" name="brisi" id="brisi" value="Izbrisi" />';
					echo '<input type="submit" name="unesi" id="unesi" value="Unesi" />';
				}
			    }else{
					echo "<label for='tip'>Tip korisnika:</label><br/>";
					echo "<input name='tip' id='tip' type='text' /><br/>";

					echo "<label for='korisnicko_ime'>Korisnicko ime:</label><br/>";
					echo "<input name='korisnicko_ime' id='korisnicko_ime' type='text' /><br/>";

					echo "<label for='lozinka'>Lozinka:</label><br/>";
					echo "<input name='lozinka' id='lozinka' type='text' /><br/>";

					echo "<label for='ime'>Ime:</label><br/>";
					echo "<input name='ime' id='ime' type='text' /><br/>";

					echo "<label for='prezime'>Prezime:</label><br/>";
					echo "<input name='prezime' id='prezime' type='text' /><br/>";

					echo "<label for='email'>Email:</label><br/>";
					echo "<input name='email' id='email' type='text' /><br/>";

					echo "<label for='slika'>Slika:</label><br/>";
					echo "<input name='slika' id='slika' type='text' /><br/>";

					echo '<input type="submit" name="uredi" id="uredi" value="Uredi" />';
					echo '<input type="submit" name="brisi" id="brisi" value="Izbrisi" />';
					echo '<input type="submit" name="unesi" id="unesi" value="Unesi" />';

			}
			if(isset($_GET['kporuka'])){
				if($_GET['kporuka'] == 1){
					echo "<br /> Korisnik uređen!";
				}elseif($_GET['kporuka'] == 2){
					echo "<br />Sva polja moraju biti ispunjena!";
				}elseif($_GET['kporuka'] == 3){
					echo "<br />Korisnik obrisan!";
				}elseif($_GET['kporuka'] == 4){
					echo "<br />Korisnik dodan!";
				}
			}
			
			?>
		</form>





		<h2>Valute</h2>
		<hr />
		<div class="valtab">
		<table>
				<caption>Valute</caption>
				<thead>
					<tr>
						<th>ID moderatora</th>
						<th>Moderator</th>
						<th>ID valute</th>
						<th>Naziv</th>
						<th>Tečaj</th>
						<th>Slika</th>
						<th>Zvuk</th>
						<th>Aktivno od</th>
						<th>Aktivno do</th>
						<th>Datum ažuriranja</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
						foreach (izvrsiUpit($veza, $u2) as $h){
							$datum = date("d.m.Y", strtotime($h['datum_azuriranja']));
							echo "<tr>";
							echo "<td>" . $h["moderator_id"] . "</td>";
							echo "<td>" . $h["korisnicko_ime"] . "</td>";
							echo "<td>" . $h["valuta_id"] . "</td>";
							
							echo "<td>" . $h["naziv"] . "</td>";
							echo "<td>" . $h["tecaj"] . "</td>";
							echo "<td><img src='{$h["slika"]}' alt='{$h["naziv"]} slika' height='50'/></td>";
							if (!empty($h["zvuk"])){
								echo "<td><audio controls><source src='{$h["zvuk"]}' type='audio/mpeg'></audio></td>";
							}else{
								echo "<td>Zvuk nije postavljen!</td>";
							}
							
							echo "<td>" . $h['aktivno_od'] . "</td>";
							echo "<td>" . $h["aktivno_do"] . "</td>";
							echo "<td>" . $datum . "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			</div>
			<h2>Filtriraj valutu</h2>
		<hr />
		<form name="filtrirajv" id="filtrirajv" method="POST" action="admin.php" >
			<label for="filterv">Pretraži po ID:</label><br/>
			<input name="filterv" id="filterv" type="text" /><br/>
			<input type="submit" name="submit" id="submit" value="Unesi" />
		</form>
		<h2>Uredi/izbriši/dodaj valutu</h2>
		<hr />
		<form name="pretraziv" id="pretraziv" method="POST" action="admin.php" >
			<?php
			echo "Ako želite urediti/obrisati valutu, prvo je potrebno filtrirati!<br /><br />";
			$moder = "SELECT * FROM korisnik WHERE tip_korisnika_id = 1";

			if(!empty($_POST['filterv'])){
			foreach(izvrsiUpit($veza, $u2) as $k){
				
					echo "<label for='valuta_id'>Valuta ID:</label><br/>";
					echo "<input name='valuta_id' id='valuta_id' type='text'value='{$k["valuta_id"]}'/><br/>";

					echo "<label for='mod'>Moderator:</label><br/>";
					echo "<select name='mod' id='mod'>";
					
					foreach(izvrsiUpit($veza, $moder) as $d){
						if($d["korisnik_id"] == $k['korisnik_id']){
							echo "<option value='{$d["korisnik_id"]}'} selected>{$d['korisnicko_ime']}</option>";
						}else{
						echo "<option value='{$d["korisnik_id"]}'}>{$d['korisnicko_ime']}</option>";
						}
					}
					echo "</select><br />";

					echo "<label for='naziv'>Naziv:</label><br/>";
					echo "<input name='naziv' id='naziv' type='text' value='{$k["naziv"]}'/><br/>";

					echo "<label for='tecaj'>Tečaj:</label><br/>";
					echo "<input name='tecaj' id='tecaj' type='text' value='{$k["tecaj"]}'/><br/>";

					echo "<label for='slikav'>Slika:</label><br/>";
					echo "<input name='slikav' id='slikav' type='text' value='{$k["slika"]}'/><br/>";

					echo "<label for='zvuk'>Zvuk:</label><br/>";
					echo "<input name='zvuk' id='zvuk' type='text' value='{$k["zvuk"]}'/><br/>";

					echo "<label for='aktivno_od'>Aktivno od:</label><br/>";
					echo "<input name='aktivno_od' id='aktivno_od' type='text' value='{$k["aktivno_od"]}'/><br/>";

					echo "<label for='aktivno_do'>Aktivno do:</label><br/>";
					echo "<input name='aktivno_do' id='aktivno_do' type='text' value='{$k["aktivno_do"]}'/><br/>";

					echo '<input type="submit" name="urediv" id="urediv" value="Uredi" />';
					echo '<input type="submit" name="brisiv" id="brisiv" value="Izbrisi" />';
					echo '<input type="submit" name="unesiv" id="unesiv" value="Unesi" />';
				}
			    }else{
				

					echo "<label for='mod'>Moderator:</label><br/>";
					echo "<select name='mod' id='mod'>";
					
					foreach(izvrsiUpit($veza, $moder) as $d){
				
						echo "<option value='{$d["korisnik_id"]}'}>{$d['korisnicko_ime']}</option>";
					
					}
					echo "</select><br />";

					echo "<label for='naziv'>Naziv:</label><br/>";
					echo "<input name='naziv' id='naziv' type='text'/><br/>";

					echo "<label for='tecaj'>Tečaj:</label><br/>";
					echo "<input name='tecaj' id='tecaj' type='text'/><br/>";

					echo "<label for='slikav'>Slika:</label><br/>";
					echo "<input name='slikav' id='slikav' type='text'/><br/>";

					echo "<label for='zvuk'>Zvuk:</label><br/>";
					echo "<input name='zvuk' id='zvuk' type='text'/><br/>";

					echo "<label for='aktivno_od'>Aktivno od:</label><br/>";
					echo "<input name='aktivno_od' id='aktivno_od' type='text'/><br/>";

					echo "<label for='aktivno_do'>Aktivno do:</label><br/>";
					echo "<input name='aktivno_do' id='aktivno_do' type='text'/><br/>";

					echo '<input type="submit" name="urediv" id="urediv" value="Uredi" />';
					echo '<input type="submit" name="brisiv" id="brisiv" value="Izbrisi" />';
					echo '<input type="submit" name="unesiv" id="unesiv" value="Unesi" />';

			}
			if(isset($_GET['vporuka'])){
				if($_GET['vporuka'] == 1){
					echo "<br />Valuta uređena!";
				}elseif($_GET['vporuka'] == 2){
					echo "<br />Sva polja osim zvuka su obavezna!";
				}elseif($_GET['vporuka'] == 3){
					echo "<br />Valuta obrisana!";
				}elseif($_GET['vporuka'] == 4){
					echo "<br />Valuta dodana!";
				}
			}
			

			?>
		</form>
			<h2>Ukupno prodano valuta</h2>
			<hr />
			<table>
				<caption>Ukupno prodano</caption>
				<thead>
					<tr>
						<th>Naziv valute</th>
						<th>Ukupni iznos</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($_POST['ukupnoi'])){
								$od = date("Y-m-d H:i:s", strtotime($_POST['od']));
								$do = date("Y-m-d H:i:s", strtotime($_POST['do']));
									$up = "SELECT v.naziv as naziv, SUM(z.iznos) as ukupno_prodani_iznos FROM valuta v, zahtjev z 
									WHERE v.valuta_id=z.prodajem_valuta_id AND z.prihvacen=1 AND moderator_id={$_POST['moderator_id']} 
									AND datum_vrijeme_kreiranja BETWEEN '$od' AND '$do'
									GROUP BY v.valuta_id ORDER BY ukupno_prodani_iznos DESC";
								}else{
									$up = "SELECT v.naziv as naziv, SUM(z.iznos) as ukupno_prodani_iznos FROM valuta v, zahtjev z 
									WHERE v.valuta_id=z.prodajem_valuta_id AND z.prihvacen=1
									GROUP BY v.valuta_id ORDER BY ukupno_prodani_iznos DESC";
								}
									foreach (izvrsiUpit($veza, $up) as $h){
										echo "<tr>";
										echo "<td>" . $h["naziv"] . "</td>";
										echo "<td>" . $h["ukupno_prodani_iznos"] . "</td>";
										echo "</tr>";
									}
					?>
				</tbody>
			</table>
			<h2>Filtriraj ukupno prodano</h2>
			<hr />

			<form name="ukupno" id="ukupno" method="POST" action="admin.php" >
				<?php
				echo "<label for='moderator_id'>Moderator:</label><br/>";
					echo "<select name='moderator_id' id='moderator_id'>";
					foreach(izvrsiUpit($veza, $moder) as $d){
						echo "<option value='{$d["korisnik_id"]}'}>{$d['korisnicko_ime']}</option>";
					}
					echo "</select><br />";
				?>
				<label for="od">Od:</label><br/>
				<input name="od" id="od" type="text" /><br/>

				<label for="do">Do:</label><br/>
				<input name="do" id="do" type="text" /><br/>

				<input type="submit" name="ukupnoi" id="ukupnoi" value="Pretraži" />
			</form>
</section>
<?php include("podnozje.php"); 
		zatvoriVezuNaBazu($veza);
?>
