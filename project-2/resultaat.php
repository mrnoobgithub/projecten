<!DOCTYPE html>
<html lang="en">

<head>
    <title>Resultaat</title>


</head>
     <header>
        <h1>resultaat</h1>
        <img src="img/casinologo.png" onclick="secretbutton()">
    </header>

<body>
   

    <!-- link naar de css -->
    <link rel="stylesheet" href="css/result.css">


<body>
    
<nav>
        <a href="home.php">Home</a>
        <a href="slotmachine.php">Slotmachine</a>
        <a href="quiz.php">quiz</a>
        <a href="steenpapierschaar.php">Steen, Papier, Schaar Spell</a>
        <a href="boter-kaas-en-eierencopy.php">boter, kaas en eieren</a>
        <a href="muntflip.php">kop of munt</a>
    </nav>

    <div class="backgroundimg">
    <img src="img/background.jpg" class="backgroundimg">
    </div>

    <section id='steenpapierschaar'>
        <h1 id="steenpapierschaartekst">Resultaat</h1>

        <?php
        session_start(); // Start session op de resultaat pagina

        // checked of het geredirect is van check.php door te kijken of de sessies: gebruikerskeuze en computerkeuze sessies er zijn. 
        if (isset($_SESSION['gebruikersKeuze']) && isset($_SESSION['computerKeuze'])) {
            $gebruikersKeuze = $_SESSION['gebruikersKeuze'];
            $computerKeuze = $_SESSION['computerKeuze'];

            echo '<p class="steenpapierschaarresultaat">Jouw keuze: ' . $gebruikersKeuze . '</p>';
            echo '<p class="steenpapierschaarresultaat">Computer\'s keuze: ' . $computerKeuze . '</p>';

            // checkt de resultaat van check.php en laat de bijbehorende resultaat zien.
            if ($gebruikersKeuze == $computerKeuze) {
                echo '<p class="gelijkspel">Gelijk spel!</p>';
            } elseif (
                ($gebruikersKeuze == 'steen' && $computerKeuze == 'schaar') ||
                ($gebruikersKeuze == 'papier' && $computerKeuze == 'steen') ||
                ($gebruikersKeuze == 'schaar' && $computerKeuze == 'papier')
            ) {
                echo '<p class="wint">Jij wint!</p>';
            } else {
                echo '<p class="verliest">Jij verliest!</p>';
            }

            // Laat de score zien op dit moment
            echo '<p class="score">Je score is ' . $_SESSION['score_steenpapierschaar'] . ' punten </p>';

            // opnieuw spelen optie
            echo '<form method="post" action="steenpapierschaar.php">';
            echo '<input type="submit" class="steenpapierschaarbutton" value="Opnieuw spelen">';
            echo '</form>';
        } else {
            //als de speler op de site komt zonder te spelen
            echo '<p class="steenpapierschaarresultaat">Klik de volgende knop om steen, papier, schaar te spelen.</p>';
            echo '<form method="post" action="steenpapierschaar.php">';
            echo '<input type="submit" class="steenpapierschaarbutton" value="Speel steen, papier, schaar">';
            echo '</form>';
        }
        ?>

    </section>

    <footer>
        <p>&copy; 2023 GoldKings Casino. All rights reserved.</p>
    </footer>
</body>

</html>