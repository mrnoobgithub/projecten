<?php
session_start();  // Start de sessie om informatie op te slaan tussen verschillende pagina's

// Initializeer het scorebord met standaardvalues als ze er nog niet zijn
$scoreboard = isset($_SESSION['scoreboard_quiz']) ? $_SESSION['scoreboard_quiz'] : ['antwoord1' => '-', 'antwoord2' => '-', 'antwoord3' => '-'];

// Controleer of het formulier is ingevuld (verzonden)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // De juiste antwoorden op de quizvragen
    $correct_answers = [
        "antwoord1" => "38 minuten",
        "antwoord2" => "Antarctica",
        "antwoord3" => "3",
    ];

    // Houd de score bij
    $score = 0;

    // Loop door de ingediende antwoorden
    foreach ($_POST as $key => $value) {
        // Controleer of het ingediende antwoord overeenkomt met het juiste antwoord
        if (array_key_exists($key, $correct_answers)) {
            $is_correct = strtolower($value) == strtolower($correct_answers[$key]);
            $score += $is_correct ? 1 : 0;  // Verhoog de score als het antwoord correct is
            $scoreboard[$key] = $is_correct ? 'Correct' : 'Incorrect';  // Update het scorebord met 'Correct' of 'Incorrect'
        }
    }

    // Sla het scorebord op in de sessie zodat het beschikbaar is op andere pagina's
    $_SESSION['score_quiz'] = $scoreboard;
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <!-- link naar de css -->
    <link rel="stylesheet" type="text/css" href="css/quiz.css">
</head>

<body>

    <!-- header -->
    <header>
        <h1>Quiz</h1>
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

    <!-- secret confetti afbeelding -->
    <img src="img/confettigif.gif" id='confetti'>
    <p id='demo'></p>

    <!-- quiz -->
    <div class="quiz-container">
        <div class="scoreboard-container">
            <h3>Scorebord</h3>
            <?php
            foreach ($scoreboard as $key => $value) {
                echo "<p>$key: $value</p>";
            }
            ?>
        </div>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <h3>Hoelang duurde de kortste oorlog aller tijden?</h3>
            <input type="text" name="antwoord1" placeholder="Antwoord hier" required>

            <h3>Waar ligt de grootste woestijn?</h3>
            <input type="text" name="antwoord2" placeholder="Antwoord hier" required>

            <h3>Hoeveel harten heeft een octopus?</h3>
            <input type="text" name="antwoord3" placeholder="Antwoord hier" required>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <!-- achtergrond -->
    <img src="img/background.jpg" class="backgroundimg">

    <!-- "YIPPEE" audio (misschien luid) -->
    <audio id="yippeeAudio" src="yippee.mp4"></audio>

    <footer>
        <p>&copy; 2023 GoldKings Casino. All rights reserved.</p>
    </footer>

    <script>
        function secretbutton() {
            document.getElementById("confetti").style.display = "block";

            var audio = document.getElementById("yippeeAudio");
            audio.play();

            setTimeout(function () {
                document.getElementById("confetti").style.display = "none";
            }, 2500);
        }
    </script>

</body>

</html>
