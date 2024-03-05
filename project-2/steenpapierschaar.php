<?php
session_start(); // Start sessie

// maakt de computer keuze voor deze ronden.
$keuzes = ["steen", "papier", "schaar"];
$_SESSION['computerKeuze'] = $keuzes[rand(0, 2)];
// checkt of er een sessie is voor de score. Zo niet wordt die aangemaakt.
if (!isset($_SESSION['score_steenpapierschaar'])) {
    $_SESSION['score_steenpapierschaar'] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Steen, Papier, Schaar</title>
    <link rel="stylesheet" href="../damien/css/steenpapierschaar.css">
</head>

<body>

<header>
        <h1>Steen Papier Schaar</h1>
        <img src="img/casinologo.png">
    </header>

    <nav>
        <a href="home.php">Home</a>
        <a href="slotmachine.php">Slotmachine</a>
        <a href="quiz.php">quiz</a>
        <a href="steenpapierschaar.php">Steen, Papier, Schaar Spell</a>
        <a href="boter-kaas-en-eierencopy.php">boter, kaas en eieren</a>
        <a href="muntflip.php">kop of munt</a>
    </nav>

    <!-- secret confetti img -->
    <img src="confettigif.gif" id='confetti'>
    <p id='demo'></p>

    <!-- background image -->
    <img src="background.jpg" class="backgroundimg">

    <!-- "YIPPEE" audio (misschien luid) -->
    <audio id="yippeeAudio" src="yippee.mp4"></audio>

    <div id="imageContainer">
        <section id='steenpapierschaar'>
            <h1 id="steenpapierschaartekst"> kies een optie: </h1>
            <form method="post" action="check.php" id='steenpapierschaarform'>
                <input type="image" src="../damien/img/steen.png" alt="steen" class="keuzeBtn" value="steen" onclick="setChoice('steen')">
                <input type="image" src="../damien/img/papier.png" alt="papier" class="keuzeBtn" value="papier" onclick="setChoice('papier')">
                <input type="image" src="../damien/img/schaar.png" alt="schaar" class="keuzeBtn" value="schaar" onclick="setChoice('schaar')">
                <input type="hidden" id="gebruikersKeuze" name="keuze" value="">
            </form>
        </section>
    </div>

    <!-- background image -->
    <img src="img/background.jpg" class="backgroundimg">

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

    
    <footer>
        <p>&copy; 2023 GoldKings Casino. All rights reserved.</p>
    </footer>

    <script>
        function setChoice(choice) {
            document.getElementById("gebruikersKeuze").value = choice;
        }
    </script>
</body>

</html>