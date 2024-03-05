<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link naar de css -->
    <link rel="stylesheet" type="text/css" href="css/pop.css">
    <title>Slot Machine</title>
</head>
<?php
session_start();

// Controleer of de score al in de sessie is opgeslagen of dat hij vanaf 0 moet beginnen
// Begint bij 100 zodat je niet de min in gaat (kan aangepast worden)
if (!isset($_SESSION['score_slotmachine'])) {
    $_SESSION['score_slotmachine'] = 100;
}

// dit zijn de symbolen waar hij doorheen gaat
$symbols = ['🍒', '🍊', '🍋', '🍇', '🍉'];

$slot1 = $symbols[array_rand($symbols)];
$slot2 = $symbols[array_rand($symbols)];
$slot3 = $symbols[array_rand($symbols)];

//  hij gaat kijken of deze staetment true is, als de speler op de knop klikt
if (isset($_POST['spin'])) {
    if ($slot1 == $slot2 && $slot2 == $slot3) {

        // Verhoog de score met 25 als de speler wint
        $_SESSION['score_slotmachine'] += 25;
    } else {
        // Verlaag de score met 1 als de speler verliest
        $_SESSION['score_slotmachine']--;
    }
}
?>

<body>
    <!-- dit is de header -->
    <header>
        <h1>Home</h1>
        <img src="img/casinologo.png">
    </header>
    <!-- dit is de navbar om naar alles toe te gaan -->
    <nav>
        <a href="home.php">Home</a>
        <a href="slotmachine.php">Slotmachine</a>
        <a href="quiz.php">quiz</a>
        <a href="steenpapierschaar.php">Steen, Papier, Schaar Spell</a>
        <a href="boter-kaas-en-eierencopy.php">boter, kaas en eieren</a>
        <a href="muntflip.php">kop of munt</a>
    </nav>

    <!-- dit is de slotmachine,hij echot de emoties zodat je een uitkomst kan zien -->
    <div class="slot-machine">
        <h1>Slot Machine</h1>
        <div class="slot">
            <?php echo $slot1; ?>
        </div>
        <div class="slot">
            <?php echo $slot2; ?>
        </div>
        <div class="slot">
            <?php echo $slot3; ?>
        </div>
        <form id="spinForm" action="slotmachine.php" method="post">
            <button type="submit" name="spin">Spin</button>
        </form>
    </div>

    <aside class="sidebar">
        <?php
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
    </aside>
    <!-- dit is de achtergrond -->
    <img src="img/background.jpg" class="backgroundimg">

    <!-- footer -->
    <footer>
        <p>&copy; 2023 GoldKings Casino. All rights reserved.</p>
    </footer>

</body>