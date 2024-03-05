<?php
// Start de PHP-sessie
session_start();

// genereer het speelveld als het nog niet bestaat
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array_fill(1, 9, '');
}

// Functie om het spelbord weer te geven
function displayBoard()
{
    echo '<div style="font-size: 24px; margin-top: 20px;">';

    // For loop om 9 vakjes te printen
    for ($i = 1; $i <= 9; $i++) {
        // Haal de waarde op van het huidige vakje
        $value = isset($_SESSION['board'][$i]) ? $_SESSION['board'][$i] : '';
        // Toon het vakje op het scherm
        echo '<span style="padding: 10px; border: 1px solid #333; display: inline-block; width: 50px; margin: 5px; color: white; border-color: white;">' . $value . '</span>';

        // Voeg een nieuwe regel toe na elke 3 vakjes
        if ($i % 3 == 0) {
            echo '<br>';
        }
    }
    echo '</div>';
}

// Functie om het spel te controleren op winnaar
function checkWinner()
{
    //een array met alle mogelijke winnende combinaties
    $winningCombinations = array(
        [1, 2, 3], [4, 5, 6], [7, 8, 9], // horizontaal gewonnen
        [1, 4, 7], [2, 5, 8], [3, 6, 9], // verticaal gewonnen
        [1, 5, 9], [3, 5, 7]  // diagonaal gewonnen
    );

    // Loop door elke winnende combinatie om te controleren of er een winnaar is
    foreach ($winningCombinations as $combination) {
        // Haal de waarden op van de vakjes in de huidige combinatie
        $values = array($_SESSION['board'][$combination[0]], $_SESSION['board'][$combination[1]], $_SESSION['board'][$combination[2]]);
        // Controleer of alle waarden gelijk zijn en niet leeg
        if ($values[0] != '' && $values[0] == $values[1] && $values[1] == $values[2]) {
            return true; // er is een winnaar gevonden
        }
    }
    return false; // Geen winnaar gevonden
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boter, Kaas en Eieren</title>
    <link rel="stylesheet" href="css/boter-kaas-eierencopy.css">
    <style>

    </style>
</head>

<body>
    <header>
        <h1>Boter, Kaas en Eieren</h1>
        <img src="img/casinologo.png"></a>
    </header>

    <!-- navbar -->
    <nav>
        <a href="home.php">Home</a>
        <a href="slotmachine.php">Slotmachine</a>
        <a href="quiz.php">quiz</a>
        <a href="steenpapierschaar.php">Steen, Papier, Schaar Spell</a>
        <a href="boter-kaas-en-eierencopy.php">boter, kaas en eieren</a>
        <a href="muntflip.php">kop of munt</a>
    </nav>

    <img src="img/background.jpg" class="backgroundimg">

    <div class="content">
        <form action="boter-kaas-en-eierencopy.php" method="post">
            <label for="position">Kies een positie (1-9): </label>
            <input type="number" name="position" id="position" min="1" max="9" required>
            <input type="submit" value="Zet">
        </form>


    </div>

    <div class="spelbord">
        <?php
    // Toon het spelbord
    displayBoard();
    ?>
    </div>

<?php

// Spelerzet verwerken
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $position = (int) $_POST['position'];

    // Controleer of de positie al is ingenomen
    if ($_SESSION['board'][$position] == '') {
        // Wissel tussen X en O voor elke zet
        $_SESSION['board'][$position] = (count(array_filter($_SESSION['board'])) % 2 == 0) ? 'X' : 'O';

        // Controleer op winnaar
        if (checkWinner()) {
            echo '<h2 class="winnermsg" "style="color: green;">Speler ' . $_SESSION['board'][$position] . ' wint!</h2>';
            // Reset het bord
            $_SESSION['board'] = array_fill(1, 9, '');
        }
    } else {
        echo '<h2 style="color: red; display: flex; justify-content: center;">Deze positie is al ingenomen. Kies een andere positie.</h2>';
    }
}

echo "   <aside class='sidebar'> ";


if (!isset($_SESSION['score_slotmachine'])) {
    $_SESSION['score_slotmachine'] = 0;
}
if (!isset($_SESSION['goed_muntflip'])) {
    $_SESSION['goed_muntflip'] = 0;
}
if (!isset($_SESSION['fout_muntflip'])) {
    $_SESSION['fout_muntflip'] = 0;
}
if (!isset($_SESSION['score_steenpapierschaar'])) {
    $_SESSION['score_steenpapierschaar'] = 0;
}

echo "<table>";
echo "<tr><th>Game</th><th>Score</th></tr>";
echo "<tr>";
echo "<td>slotmachine</td>";
echo "<td>" . $_SESSION['score_slotmachine'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>muntflip</td>";
echo "<td id='antwoord'> goed " . $_SESSION['goed_muntflip'] . "</td>";
echo "<td id='antwoord'> fout " . $_SESSION['fout_muntflip'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<tr>";
echo "<td>Steen papier schaar</td>";
echo "<td>" . $_SESSION['score_steenpapierschaar'] . "</td>";
echo "</tr>";
echo "</table>";

echo "   </aside> ";

?>

    <footer>
        <p>&copy; 2023 GoldKings Casino. All rights reserved.</p>
    </footer>



</body>

</html>