<?php

require_once 'connection.php';

?>

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

?>
				
	<br>
<hr>
	<br>		
	
	<h2>
	Wyświetlanie Kin z bazy w kolejności alfabetycznej:
	</h2>

	<br>
<hr>
	<br>	
				
<?php 
				
		$sql = "SELECT * FROM Cinemas ORDER BY name";
		$result = $conn->query($sql);
		
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo '<strong>', "Kino: ", '</strong>' .$row["name"], "<br>", '<strong>', "Adres: ", '</strong>' .$row["adress"]."<br>", "<br>";
				}
			}
			else {
				echo "Brak kin w bazie.";
			}

?>
		
	<br>
<hr>
	<br>		
	
	<h2>
	Wyświetlanie filmów z bazy w kolejności alfabetycznej:
	</h2>

	<br>
<hr>
	<br>	
		
<?php 

		$sql = "SELECT * FROM Movies ORDER BY name";
		$result = $conn->query($sql);
		
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo '<strong>', "Tytuł filmu: ", '</strong>', $row["name"], "<br>", '<strong>', "Opis filmu: ", '</strong>', $row["description"], "<br>", '<strong>', "Ocena: ", '</strong>', $row["rating"], "<br>", "<br>";
				}
			} 
			else {
				echo "Brak filmów w bazie.";
			}
	
		$sql = "SELECT Cinemas.name, Movies.name FROM Cinemas INNER JOIN Movies ORDER by Cinemas.name";
		$result = $conn->query($sql);
		
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					var_dump($row);
			//		echo $row["name"], '<br>'; // ? :-/
				}
			}
			else {
				echo "Brak danych w bazie.";
			}
		
			
$conn->close(); // zamykanie tabeli ZAWSZE na końcu - to logiczne!
$conn = null; 	// zamykanie tabeli ZAWSZE na końcu - to logiczne!

// przepisać na kartkę: wejście do bazy przez "use nazwa bazy", pokazanie tabel "show tables", pokazanie konkretnej tabeli "describe nazwa tabeli"

?>

</body>
</html>