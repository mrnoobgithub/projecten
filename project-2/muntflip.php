<?php

// begin sessie
session_start();
?>
<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="css/kopofmunt.css">
  <title>Kop of Munt!</title>
</head>

<body>
  <header>
    <h1>Kop of Munt!</h1>
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

  <form method="post" action="">
    <input type="submit" name="kop" value="kop" />
    <input type="submit" name="munt" value="munt" />
  </form>

  <?php
  if (isset($_SESSION['goed_muntflip']) && isset($_SESSION['fout_muntflip']))  // Kijken of de sessies bestaan, anders worden ze overschreven. 
  {
    if ($_SESSION['fout_muntflip'] == 20)  // Als je 20 fouten hebt worden de gegevens gewist 
    {
      $_SESSION['goed_muntflip'] = 0;  // Leeghalen 
      $_SESSION['fout_muntflip'] = 0;
      echo 'Je hebt het maximale aantal fouten bereikt. Je gegevens zijn gewist!';
    } else {
      if ($_SERVER['REQUEST_METHOD'] == "POST")  // Als er op een knop gedrukt is 
      {
        $true_false = rand(1, 2);  // Genereer 1 of 2 
  
        if ($true_false == 1 && isset($_POST['kop']))  // Als er 1 uitkwam, en je drukte op kop is het goed 
        {
          echo 'Je hebt het goed! Het was kop!';
          $_SESSION['goed_muntflip']++;  // Bijtellen van een punt 
        } elseif ($true_false == 2 && isset($_POST['munt']))  // Als het 2 was en je drukte op munt was het ook goed 
        {
          echo 'Je hebt het goed! Het was munt!';
          $_SESSION['goed_muntflip']++; // Bijtellen punt 
        } else {
          echo 'Je hebt het fout! Het moest zijn: ';  // Anders zijn er geen combinaties meer over, dus heb je het fout. 
          if ($true_false == 1)  // 1 = kop, dus als kop niet 1 is is het munt want het moet een 1 of een 2 zijn. 
          {
            echo 'Kop!';
          } else {
            echo 'Munt!';
          }
          $_SESSION['fout_muntflip']++;  // Fout bijtellen. 
  
        }
      }
    }
  } else {
    $_SESSION['goed_muntflip'] = 0;  // Dit betrekt zich weer tot bovenaan --> Als die sessies niet bestaan worden ze hier gezet (dus eerste keer als je pagina opent) 
    $_SESSION['fout_muntflip'] = 0;
  }
  ?>
  <div class="score-container">
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
  </div>
  <img src="img/background.jpg" class="backgroundimg">

  <footer>© 2023 GoldKings Casino. All rights reserved.</footer>

</body>

</html>