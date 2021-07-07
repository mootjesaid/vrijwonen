<?php
	require_once "functions.php";
	$types = ['0', '1'];
	if(!empty($_GET['type'])) {
        if($_GET['type'] == 1) {
		    $stmt = $db->query("SELECT * FROM woningen WHERE type='$_GET[type]'");
        } elseif($_GET['type'] == 2) {
		    $stmt = $db->query("SELECT * FROM woningen WHERE type=0");
        }
	} else {
    	$stmt = $db->query("SELECT * FROM woningen");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoek naar een huis</title>
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
        <div class="listpagina">
        <?php while($row = $stmt->fetch()) { ?>
            <div class="listing">
                <img class="listing-foto" src="images/<?php echo $row['foto_def']?>">
                <div class="text">
                    <div class="listingboven">
                        <h3><?php echo $row['titel'] ?></h3>
                        <p><?php echo $row['adres'] ?>, <?php echo $row['postcode'] ?>, <?php echo $row['plaats'] ?></p>
                    </div>
                    <div class="listingmidden">
                        <h4>&euro; <?php echo $row['prijs'] ?></h4>
                    </div>
                    <div class="listingkamers">
                        <p><?php echo $row['kamers'] ?> Kamer / Oppervlakte: <?php echo $row['oppervlakte'] ?> / <b> <?php if($row['type'] === '0') { echo "Huis"; } else { echo "Appartement"; } ?> / <?php if($row['status'] == 0) { echo "Beschikbaar"; } else { echo "Verkocht"; } ?> </b></p>
                        <a href="huis.php?id=<?php echo $row['id']; ?>"><p>Bekijk woning.</p></a>
                        <a href="change.php?id=<?php echo $row['id']; ?>"><p>wijzig woning.</p></a>

                    </div>
                </div>
            </div>
            <?php } ?>
            

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