<?php
session_start(); // Start session op resultaat pagina
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    Spell();
} else {
    header('Location: resultaat.php');
}

function Spell()
{
    $gebruikersKeuze = isset($_POST['keuze']) ? $_POST['keuze'] : '';

    // packt de computer keuze van steenpapierschaar.php. Zo wordt het niet verandert als de pagina gerefreshed wordt. Gebruikt isset om te zien of het er is.
    $computerKeuze = isset($_SESSION['computerKeuze']) ? $_SESSION['computerKeuze'] : '';

    // gebruikerskeuze in een sessie
    $_SESSION['gebruikersKeuze'] = $gebruikersKeuze;

    if ($gebruikersKeuze == $computerKeuze) {
        header('Location: resultaat.php');
    } elseif (
        ($gebruikersKeuze == 'steen' && $computerKeuze == 'schaar') ||
        ($gebruikersKeuze == 'papier' && $computerKeuze == 'steen') ||
        ($gebruikersKeuze == 'schaar' && $computerKeuze == 'papier')
    ) {
        // checkt of de gebruiker een keuze had gemaakt en update de score als dat wel zo is
        if ($gebruikersKeuze != '') {
            //score++ wordt geredirect naar resultaat.php
            $_SESSION['score_steenpapierschaar']++;
            header('Location: resultaat.php');
        }
    } else {
        // checkt of de gebruiker een keuze had gemaakt en update de score als dat wel zo is
        if ($gebruikersKeuze != '') {
            //score-- wordt geredirect naar resultaat.php
            $_SESSION['score_steenpapierschaar']--;
            header('Location: resultaat.php');
        }
    }

}
?>