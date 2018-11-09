<?php session_start(); ?>

<!DOCTYPE html>

<html>

<head>

	<title>Controllo file</title>

	<meta charset="UTF-8">
	<meta name="description" content="Pagina di controllo del file">
	<meta name="keywords" content="Progetto1 Modulo 306">
	<meta name="author" content="Gabriele Alessi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style/file_check.css">
	<link rel="icon" type="image/png" href="media/icon.png"/>

</head>

<body>

	<h1>Controllo file</h1>

	<?php

		/* Prendo i valori inseriti */
		$nome = $_SESSION["dati"]["nome"];
		$cognome = $_SESSION["dati"]["cognome"];
		$nascita = $_SESSION["dati"]["nascita"];
		$indirizzo = $_SESSION["dati"]["indirizzo"];
		$civico = $_SESSION["dati"]["civico"];
		$citta = $_SESSION["dati"]["citta"];
		$nap = $_SESSION["dati"]["nap"];
		$telefono = $_SESSION["dati"]["telefono"];
		$email = $_SESSION["dati"]["email"];
		$sesso = $_SESSION["dati"]["sesso"];
		$hobby = $_SESSION["dati"]["hobby"];
		$prof = $_SESSION["dati"]["prof"];

		/* Valori generali */
		date_default_timezone_set('Europe/Zurich');
		define("DATA", date("Y-m-d_H:i:s"));
		define("TUTTE", "Registrazioni/Registrazioni_tutte.csv");
		define("GIORNO", "Registrazioni/Registrazione_" . date("Y-m-d") . ".csv");
		define("HEADER", ["Data","Nome","Cognome","Data_Nascita","Indirizzo","Num_Civico","Citta","NAP","Num_Telefono","Email","Genere","Hobby","Professione"]);
		define("SEP", ";");

		/* Formo i dati */
		$dati = [DATA,$nome,$cognome,$nascita,$indirizzo,$civico,$citta,$nap,$telefono,$email,$sesso,$hobby,$prof];

		/* Formo il file (Registrazioni_tutte) */
		$file = fopen(TUTTE, "a");		
		if (filesize(TUTTE) == 0) {
			fputcsv($file, HEADER, SEP);
		}

		/* Inserisco i dati */
		fputcsv($file, $dati, SEP);
		fclose($file);

		/* Formo il file (Registrazione_aaaa-mm-gg) */
		$file = fopen(GIORNO, "a");
		if (filesize(GIORNO) == 0) {
			fputcsv($file, HEADER, SEP);
		}

		/* Inserisco i dati */
		fputcsv($file, $dati, SEP);
		fclose($file);

		/* Leggo il file e lo divido in righe */
		$lines = file(GIORNO);

		/* Risultato da inserire nel HTML */
		$table = "";

		/* Leggo ogni riga */
		for ($i = 0; $i < count($lines); $i++) { 

			/* Aggiungo una riga */
			$table .= "<tr>";

			/* Creo una riga e la divido con il separatore */
			$line = explode(SEP, $lines[$i]);

			/* Leggo ogni dato */
			for ($j = 0; $j < count($line); $j++) { 
				$table .= "<td>" . $line[$j] . "</td>";
			}

			/* Chiudo la riga */
			$table .= "</tr>";

		}

	?>

	<!-- Tabella contenente i dati del file -->
	<table><?php echo $table; ?></table>

	<!-- Pulsante home -->
	<div class="btn">
		<p><a href="welcome.html">Home</a></p>
	</div>

</body>

</html>