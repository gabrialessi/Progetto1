<?php session_start(); ?>

<!DOCTYPE html>

<html>

<head>

	<title>Controllo</title>

	<meta charset="UTF-8">
	<meta name="description" content="Pagina di controllo">
	<meta name="keywords" content="Progetto1 Modulo 306">
	<meta name="author" content="Gabriele Alessi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style/check.css">
	<link rel="icon" type="image/png" href="media/icon.png"/>

</head>

<body>

	<h1>Controllo</h1>

	<?php

		/* Funzione per creare una riga nel HTML */
		function printLine($value) {

			/* Se il valore è vuoto metto uno spazio vuoto */
			if (empty($value)) {
				$value = "<br>";
			}

			/* Ritorno la riga */
			return "<p>" . $value . "</p>";

		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			/* Variabile di sessione */
			$_SESSION["dati"] = $_POST;

		}

		/* Prendo i valori inseriti */
		$nome = printLine($_SESSION["dati"]["nome"]);
		$cognome = printLine($_SESSION["dati"]["cognome"]);
		$nascita = printLine($_SESSION["dati"]["nascita"]);
		$indirizzo = printLine($_SESSION["dati"]["indirizzo"]);
		$civico = printLine($_SESSION["dati"]["civico"]);
		$citta = printLine($_SESSION["dati"]["citta"]);
		$nap = printLine($_SESSION["dati"]["nap"]);
		$telefono = printLine($_SESSION["dati"]["telefono"]);
		$email = printLine($_SESSION["dati"]["email"]);
		$sesso = printLine($_SESSION["dati"]["sesso"]);
		$hobby = printLine($_SESSION["dati"]["hobby"]);
		$prof = printLine($_SESSION["dati"]["prof"]);

	?>

	<!-- Contenitore delle colonne -->
	<div class="row">

		<!-- Colonna sinistra -->
		<div class="leftCol">

			<!-- Campi -->
			<p>Nome:</p>
			<p>Cognome:</p>
			<p>Data di nascita:</p>
			<p>Indirizzo:</p>
			<p>Numero civico:</p>
			<p>Città:</p>
			<p>NAP:</p>
			<p>Numero di telefono:</p>
			<p>E-mail:</p>
			<p>Genere (sesso):</p>
			<p>Hobby:</p>
			<p>Professione:</p>

		</div>

		<!-- Colonna destra -->
		<div class="rightCol">

			<!-- Dati inseriti precedentemente -->
			<?php echo $nome; ?>
			<?php echo $cognome; ?>
			<?php echo $nascita; ?>
			<?php echo $indirizzo; ?>
			<?php echo $civico; ?>
			<?php echo $citta; ?>
			<?php echo $nap; ?>
			<?php echo $telefono; ?>
			<?php echo $email; ?>
			<?php echo $sesso; ?>
			<?php echo $hobby; ?>
			<?php echo $prof; ?>

		</div>

	</div>

	<!-- Contenitore dei pulsanti -->
	<div class="row">

		<!-- Pulsante correggi -->
		<div class="leftBtn">
			<p><a onclick="window.history.back()">Correggi</a></p>
		</div>

		<!-- Pulsante registra -->
		<div class="rightBtn">
			<p><a href="file_check.php">Registra</a></p>
		</div>

	</div>

</body>

</html>