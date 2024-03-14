<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja Strona</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'przepisy';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_term = $_POST['search'];

    $sql = "SELECT * FROM przepis WHERE title LIKE '%$search_term%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Znalezione przepisy:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p><strong>Składniki:</strong> " . $row['ingredients'] . "</p>";
            echo "<p><strong>Instrukcje:</strong> " . $row['instructions'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Brak wyników dla wyszukiwanego terminu: " . $search_term;
    }
}
?>

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

    <h2>Wyszukiwarka przepisów</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="search">Wyszukaj przepis:</label><br>
  <input type="text" id="search" name="search"><br><br>
  <input type="submit" value="Szukaj">
</form>

    <footer>
        <p>&copy; BuchMania. Wszelkie prawa zastrzeżone.</p>
    </footer>

</body>
</html>
