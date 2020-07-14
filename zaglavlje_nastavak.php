</head>
		<body>
			<div id= "container">
				<header>
					Virtualna mjenjačnjica
				</header>

				<nav>
					<a href="index.php">Naslovna</a>
					<a href="o_autoru.html">O autoru</a>
					<?php if(isset($_SESSION["id"]) && $_SESSION["tip"] == 1) { ?>
						<a href="zahtjevi.php">Zahtjevi korisnika</a>
					<?php } ?>
					<?php if(isset($_SESSION["id"]) && $_SESSION["tip"] == 0) { ?>
						<a href="zahtjevi.php">Zahtjevi korisnika</a>
						<a href="admin.php">Administracija</a>
					<?php } ?>
					<?php if(!isset($_SESSION["id"])) { ?>
						<a href="prijava.php">Prijava</a>
						<?php }else{ ?>
							<a href="racun.php">Moj račun</a>
							<a class="veza" href="prijava.php?odjava=1">Odjava</a>
					<?php } ?>
				</nav>