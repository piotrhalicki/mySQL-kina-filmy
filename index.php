<!DOCTYPE html>

<html lang="pl-PL">

<head>
	<meta charset="UTF-8">
	<meta name="Ćwiczenia - mySQL - Kino - 3" content="ćwiczenia, mySQL, kino">	
	<title>						
	Ćwiczenia - mySQL - Kino - 3
	</title>
</head>

<body>

	<h1>
	<strong><em>Ćwiczenia - mySQL - Kino - 3</em></strong>
	</h1>
	
	<br>
<hr>
	<br>

<?php

$servername = "localhost";
$username = "root";
$password = "cwiczenia";
$baseName = "kino";

	$conn = new mysqli($servername, $username, $password, $baseName);

		if ($conn->connect_error) {
			die("Połączenie nieudane. Błąd: " . $conn->connect_error);
		}
		else {
			echo "Połączenie z bazą ", '<strong>', $baseName, '</strong>', " udane :)";
			echo '<br>';
			echo '<br>';
		}

				
		$sql = "CREATE TABLE Seans (
					id int AUTO_INCREMENT,
					film_id int NOT NULL,
					kino_id int NOT NULL,
					PRIMARY KEY(id),
					FOREIGN KEY(film_id) REFERENCES Movies(id),
					FOREIGN KEY(kino_id) REFERENCES Cinemas(id))";
		
		$result = $conn->query($sql);
		
		if ($result === TRUE) {
			echo "Tabela Seans została utworzona";
		}
		else {
			echo '<strong>', "Coś poszło nie tak: ", '</strong>', '<br>' .$conn->error;
			echo '<br>';
		};
		
		// auto increment jest zbędne w przypadku podawania klucza głównego		
		
		
$conn->close(); // zamykanie tabeli ZAWSZE na końcu - to logiczne!
$conn = null; 	// zamykanie tabeli ZAWSZE na końcu - to logiczne!

// przepisać na kartkę: wejście do bazy przez "use nazwa bazy", pokazanie tabel "show tables", pokazanie konkretnej tabeli "describe nazwa tabeli"

?>

</body>
</html>
