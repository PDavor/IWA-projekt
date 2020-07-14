
<?php 
session_start();
include "zaglavlje.php" ?>
<title>Naslovna</title>
<?php include "zaglavlje_nastavak.php" ?>
<section>
	<h1>Valute</h1>
	<?php
	include_once("baza.php");
	$veza = spojiSeNaBazu();
	$valute = "SELECT * FROM valuta";
	$rez = izvrsiUpit($veza, $valute);
	foreach($rez as $v) {
		$s = $v['slika'];
		$n = $v['naziv'];
		$i = $v['valuta_id'];
		$t = $v['tecaj'];
		$a = $v['zvuk'];
		
		?>
		
			<figure class="slika">
			<a href="index.php?valuta=<?php echo $i ?>">
		  	<img src="<?php echo $s ?>" alt="<?php echo $n ?>" />
		  	</a>
		  	<figcaption><a href="index.php?valuta=<?php echo $i ?>"><?php echo $n ?></a><br><?php
  				if(isset($_GET["valuta"]) && $_GET["valuta"] == $i){
					echo "Tečaj: $t";
					if(isset($a) && $a != ""){ ?>
						<br /><br />
						<audio controls>
  							<source src="<?php echo $a ?>" type="audio/mpeg">
						</audio>
							<?php
					}
				}
  			?></figcaption>
  		
  			
  			
  			
  		</figure>

	  	
	<?php 



	} 
	zatvoriVezuNaBazu($veza);
	?>
</section>
<?php include("podnozje.php") ?>