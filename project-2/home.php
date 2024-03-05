<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <!-- link naar de css -->
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body>


    <!-- header -->
    <header>
        <h1>Home</h1>
        <img src="img/casinologo.png" onclick="secretbutton()">
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

    <!-- secret confetti img -->
    <img src="img/confettigif.gif" id='confetti'>
    <p id='demo'></p>



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

    <!-- background image -->
    <img src="img/background.jpg" class="backgroundimg">

    <!-- "YIPPEE" audio (misschien luid) -->
    <audio id="yippeeAudio" src="yippee.mp4"></audio>

    <!-- Welcome overlay + bericht -->
    <div id="welcomeOverlay" style="display: none;">
        <div id="welcomeMessage">
            <h4>Welkom op onze website!</h4>
            <p>Klik op het kruisje rechtsbovenin om verder te gaan.</p>
        </div>
        <!-- Close button -->
        <span id="closeButton" onclick="closeWelcome()">X</span>
    </div>

    <script>
        // Secret confetti img functie, als de button geclickt wordt, zal de img verschijnen
        function secretbutton() {
            document.getElementById("confetti").style.display = "block";

            // met audio
            var audio = document.getElementById("yippeeAudio");
            audio.play();

            // met timer zodat het niet gespammed kan worden
            setTimeout(function () {
                document.getElementById("confetti").style.display = "none";
            }, 2500);
        }
        // Toon het welkomstbericht
        document.getElementById("welcomeOverlay").style.display = "flex";

        function closeWelcome() {
            // Sluit het welkomstbericht
            document.getElementById("welcomeOverlay").style.display = "none";
        }
    </script>

    <!-- footer -->
    <footer>
        <p>&copy; 2023 GoldKings Casino. All rights reserved.</p>
    </footer>

</body>

</html>