<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'przepisy';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS przepis (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    ingredients TEXT NOT NULL,
    instructions TEXT NOT NULL
)";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $sql = "INSERT INTO przepis (title, ingredients, instructions)
            VALUES ('$title', '$ingredients', '$instructions')";

    if ($conn->query($sql) === TRUE) {
        echo "Przepis został dodany pomyślnie!";
    } else {
        echo "Błąd podczas dodawania przepisu: " . $conn->error;
    }
}

$conn->close();
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
    
    <h2>Dodaj nowy przepis</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="title">Tytuł:</label><br>
  <input type="text" id="title" name="title"><br><br>
  <label for="ingredients">Składniki:</label><br>
  <textarea id="ingredients" name="ingredients"></textarea><br><br>
  <label for="instructions">Instrukcje:</label><br>
  <textarea id="instructions" name="instructions"></textarea><br><br>
  <input type="submit" value="Dodaj przepis">
</form>
    
    <script>
    function addRecipe() {
      // Pobranie danych z formularza
      var title = document.getElementById("title").value;
      var ingredients = document.getElementById("ingredients").value;
      var instructions = document.getElementById("instructions").value;
    
      // Weryfikacja czy wszystkie pola są wypełnione
      if (!title || !ingredients || !instructions) {
        alert("Proszę wypełnić wszystkie pola formularza.");
        return;
      }
    
      // Tworzenie obiektu przepisu
      var recipe = {
        title: title,
        ingredients: ingredients,
        instructions: instructions
      };
    
      // Dodawanie przepisu do listy przepisów (można też przekazać te dane do serwera)
      console.log("Nowy przepis:", recipe);
    
      // Opcjonalnie można wyczyścić formularz po dodaniu przepisu
      document.getElementById("recipeForm").reset();
    }
    </script>

    <footer>
        <p>&copy; BuchMania. Wszelkie prawa zastrzeżone.</p>
    </footer>

</body>
</html>
