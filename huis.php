<?php
    require_once 'functions.php';
    $id = $_GET['id'];
    $stmt = $db->query("SELECT * FROM woningen WHERE id=$id")->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huis</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<header>
        <nav>
            <a href="index.php"><div class="logo">&#9650<span>VRIJ WONEN</span> </div></a>
            <div class="menu">
                <ul>
                    <li><a href="zoek.php?type=2">HUIS</a></li>
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
    <main class="content">
        <div class="content-wrap">
            <div class="huispagina">
                <div class="fotobox">
                    <div class="mainfoto">
                        <img src="images/<?php echo $stmt['foto_def']?>" alt="">
                    </div>
                    <div class="anderefotos">
                        <div class="foto"><img src="images/<?php echo $stmt['foto_1']?>" alt=""></div>
                        <div class="foto"><img src="images/<?php echo $stmt['foto_2']?>" alt=""></div>
                        <div class="foto"><img src="images/<?php echo $stmt['foto_3']?>" alt=""></div>
                        <div class="foto"><img src="images/<?php echo $stmt['foto_4']?>" alt=""></div>
                    </div>
                </div>
                <div class="fotoboxborder">
                </div>
                <div class="textinformatie">
                    <div class="bovenstetext">
                        <h1 style="" class="tekstrechts"><?php if($stmt['type'] == 0) { echo "Huis"; } else { echo "Appartement"; } ?></h1>
                        <h1><?php echo $stmt['titel'] ?></h1>
                        <h4 style="" class="tekstrechts">Status: <?php if($stmt['status'] == 0) { echo "Beschikbaar"; } else { echo "Verkocht"; } ?></h4>
                        <p><?php echo $stmt['adres'] ?>, <?php echo $stmt['postcode'] ?> <?php echo $stmt['plaats'] ?></p>
                        <p class="infotext"><span class="infospan">Kamers: <?php echo $stmt['kamers'] ?></span> <span class="infospan">oppervlakte: <?php echo $stmt['oppervlakte'] ?>&#x33A1;</span></p>
                        <h3>&euro; <?php echo $stmt['prijs'] ?> </h3>
                    <div class="middelstetext">
                        <h2>Omschrijving</h2>
                        <p><?php echo $stmt['omschrijving'] ?></p>
                        <div class="verdereinfo">
                            <h3>Eigenschappen</h3>
                            <?php
                            if($stmt['eigenschappen'] === NULL) {  } else {
                                if(strpos($stmt['eigenschappen'], ',')) {
                                    $cijfers = explode(',', $stmt['eigenschappen']);
                                    if(in_array('0', $cijfers)) {
                                       echo "<p>Inclusief overname inventaris.</p>";
                                   }
                                   if(in_array('1', $cijfers)) {
                                       echo "<p>Zwembad op het park.</p>";
                                   }
                                   if(in_array('2', $cijfers)) {
                                       echo "<p>Winkel op het park.</p>";
                                   }
                                   if(in_array('3', $cijfers)) {
                                       echo "<p>Entertainment op het park.</p>";
                                   }
                                   if(in_array('4', $cijfers)) {
                                       echo "<p>Op een privepark.</p>";
                                   }
                                }  else {
                                    if($stmt['eigenschappen'] == 0) {
                                       echo "<p>Inclusief overname inventaris.</p>";
                                   }
                                    if($stmt['eigenschappen'] == 1) {
                                       echo "<p>Zwembad op het park.</p>";
                                    }
                                    if($stmt['eigenschappen'] == 2) {
                                       echo "<p>Winkel op het park.</p>";
                                    }
                                    if($stmt['eigenschappen'] == 3) {
                                       echo "<p>Entertainment op het park.</p>";
                                    }
                                    if($stmt['eigenschappen'] == 4) {
                                       echo "<p>Op een privepark.</p>";
                                    }
                                }
                           }
                        ?>
                        </div>
                        <div class="verdereinfo">
                            <h3>Ligging</h3>
                            <?php
                                if($stmt['ligging'] === NULL) {  } else {
                                    if(strpos($stmt['ligging'], ',')) {
                                        $cijfers = explode(',', $stmt['ligging']);
                                        if(in_array('0', $cijfers)) {
                                           echo "<p>Dicht bij een bos.</p>";
                                       }
                                       if(in_array('1', $cijfers)) {
                                           echo "<p>Dicht bij een stad.</p>";
                                       }
                                       if(in_array('2', $cijfers)) {
                                           echo "<p>Dicht bij de zee.</p>";
                                       }
                                       if(in_array('3', $cijfers)) {
                                           echo "<p>In het heuvelland.</p>";
                                       }
                                       if(in_array('4', $cijfers)) {
                                           echo "<p>Aan het water.</p>";
                                       }
                                    }  else {
                                        if($stmt['ligging'] == 0) {
                                           echo "<p>Dicht bij een bos.</p>";
                                       }
                                        if($stmt['ligging'] == 1) {
                                           echo "<p>Dicht bij een stad.</p>";
                                        }
                                        if($stmt['ligging'] == 2) {
                                           echo "<p>Dicht bij de zee.</p>";
                                        }
                                        if($stmt['ligging'] == 3) {
                                           echo "<p>In het heuvelland.</p>";
                                        }
                                        if($stmt['ligging'] == 4) {
                                           echo "<p>Aan het water.</p>";
                                        }
                                    }
                               }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="pdf">
                    <a href="mpdf.php?id=<?php echo $stmt['id'] ?>"><p>Download PDF</p>
                </div>
            </div>
        </div>
    </main>

</body>
<footer style="bottom: -650px; color: black">
    <aside>
        <h2>Vrij wonen</h2>
        <h3>Woning + Maakelaardij</h3>
    </aside>
</footer>
</html>