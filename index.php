<?php
session_start();
?>

<!DOCTYPE html>

<html lang="nl" dir="ltr">

  <head>

    <meta charset="utf-8">
    <title>Vrij wonen - Woningen</title>
  </head>
  <body>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vrij wonen - Vakantie makelaar</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<header>
        <nav>
            <a href="index.php"><div class="logo">&#9650<span>VRIJ WONEN</span> </div></a>
            <div class="menu">
                <ul>
                    <li><a href="zoek.php?type=0">HUIS</a></li>
                    <li><a href="zoek.php?type=1">APPARTEMENT</a></li>
                </ul>
            </div>
            <div class="login">
              <ul>
                  <li><a href="">FAQ</a></li>
                  <?php if(isset($_SESSION['in']) && $_SESSION['in'] === 1) {  ?>
                    <li><a id="signup" href="logout.php">Uitloggen</a></li>
                    <li><a id="signup" href="add.php">Nieuwe woning</a></li>
                    <?php } else {?>
                  <li><a id="signup" href="login.php">Inloggen</a></li>
                  <?php } ?>
              </ul>
            </div>
            <input type="checkbox" name="" id="hamburger">

            <div class="toogle">
                <label for="hamburger">
                  <li><a href="">HUUR</a></li>
                  <li><a href="">KOOP</a></li>
                </label>
            </div>
        </nav>
    </header>
    <main>
        <div class="firstpage">
            <h2>Zoek.</h2>
            <h2>Vind.</h2>
            <h2>Verkoop.</h2>
        </div>
        <div class="firstpagebutton">
            <a href="zoek.php?type=1">Appartementen te huur</a>
            <a href="zoek.php?type=2">Huizen te huur</a>
        </div>
        <div class="info">
            Deze site is enkel voor personeel van VRIJ WONEN voor het zoeken van woningen die te koop of te huur staan.
        </div>

    </main>
  </body>
  <footer>
      <aside>
          <h2>Vrij wonen</h2>
          <h3>Woning + Maakelaardij</h3>
      </aside>
  </footer>
</html>
