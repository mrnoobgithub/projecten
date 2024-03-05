<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];

    // Check of de leeftijd groter dan of gelijk is aan 16 en verwijst naar de homepage
    if ($age >= 16) {
        header("Location: home.php");
        exit;
        // Toont een error message als de user jonger dan 16 jaar is
    } else {
        $message = "<p  style='display: flex; justify-content: center;'>Sorry, je bent niet oud genoeg voor deze website.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Leeftijd verifieren</title>
    <!-- link naar de css -->
    <link rel="stylesheet" href="css/index.css">
</head>

<header>
    <h1>Welkom, Verifieer Jouw Leeftijd</h1>
    <img src="img/casinologo.png">
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="index.php">Slotmachine</a>
    <a href="index.php">quiz</a>
    <a href="index.php">Steen, Papier, Schaar Spel</a>
    <a href="index.php">boter, kaas en eieren</a>
    <a href="index.php">kop of munt</a>
</nav>

<body>

    <!-- de error message als je niet oud genoeg bent wordt hier geprint -->
    <?php if (isset($message)): ?>
        <h2 style="color: red;">
            <?php echo $message; ?>
        </h2>
    <?php endif; ?>


    <img src="img/background.jpg" class="backgroundimg">
    <!-- form voor het inloggen -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="name">Naam:</label>
        <input type="text" name="name" required><br>
        <label for="age">Leeftijd:</label>
        <input type="number" name="age" required><br>
        <input type="submit" class="verifieerbutton" value="Verifieer">
    </form>

    <footer>
        <p>&copy; 2023 GoldKings Casino. All rights reserved.</p>
    </footer>

    <div id="welcomeOverlay" style="display: none;">
        <div id="welcomeMessage">
            <h4>Je bent helaas nog niet geverifieerd...</h4>
            <p>Klik op het kruisje rechtsbovenin en verifieer om verder te gaan.</p>
        </div>
        <!-- Close button -->
        <span id="closeButton" onclick="closeWelcome()">X</span>
    </div>

</body>

</html>

<script>
    // Toon het welkomstbericht
    document.getElementById("welcomeOverlay").style.display = "flex";

    function closeWelcome() {
        // Sluit het welkomstbericht
        document.getElementById("welcomeOverlay").style.display = "none";
    }
</script>