<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "przepisy";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("". $conn->connect_error);
}

$sql = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja Strona</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>BuchMania</h1>
    </header>

    <nav class="nav">
        <a href="index.php">Strona Główna</a>
        <a href="ziolo.html">Pokrzywa</a> 
        <a href="krysztal.html">Kryształ Szlachetny</a>
        <a href="mefedron.html">Proszki do pieczenia</a>
        <a href="heroina.html">Hera</a> 
        <a href="wyszukiwarka.php">Wyszukiwarka</a>
        <a href="dodajprzepis.php">Dodaj Przepis</a>
    </nav>

    <section id="section1">
        <h2>Witamy na stronie buchmania. Są tutaj wszystkie przepisy dotyczące substancji psychoaktywnych. Dowiesz się tutaj wiele ciekawych rzeczy. Zapraszamy do zwiedzania :)</h2>
        <img src="36335-9yRdFjqMGshwYmewZFsm8tjCeUemN79DzCB4NDrP6C3i.jpg" alt="Buszek" width="500" height="600">
    </section>

    <footer>
        <p>&copy; BuchMania. Wszelkie prawa zastrzeżone.</p>
    </footer>

</body>
</html>
