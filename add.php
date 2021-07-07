

<?php

require_once 'functions.php';
if($_SESSION['in'] !== 1) {
  header("Location: login.php");
}
if(isset($_POST['submit'])) {
    if(!empty($_POST['title']) && !empty($_POST['price']) && !empty($_POST['address']) && !empty($_POST['postalcode']) && !empty($_POST['place']) && !empty($_POST['description']) && isset($_POST['status']) && isset($_FILES['first_photo'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $address = $_POST['address'];
        $postalcode = $_POST['postalcode'];
        $place = $_POST['place'];
        $description = $_POST['description'];
        $kamers = $_POST['kamers'];
        $oppervlakte = $_POST['oppervlakte'];
        $status = $_POST['status'];
        $type = $_POST['type'];
        $fotoDev = $_FILES['first_photo'];
        $foto1 = $_FILES['photo_1'];
        $foto2 = $_FILES['photo_2'];
        $foto3 = $_FILES['photo_3'];
        $foto4 = $_FILES['photo_4'];
        $fotos = [$foto1, $foto2, $foto3, $foto4];
        if(isset($_POST['location'])) {
          if(count($_POST['location']) > 1) {
            $location = implode(',', $_POST['location']);
          } else {
            $location = $_POST['location'];
          }
        } else {
          $location = NULL;
        }

        if(isset($_POST['properties'])) {
          if(count($_POST['properties']) > 1) {
            $properties = implode(',', $_POST['properties']);
          } else {
            $properties = $_POST['properties'];
          }
        } else {
          $properties = NULL;
        }

        $foto_plek = [];
        for($i = 0; $i < 4; $i++) {
            $foto = $fotos[$i];
            // var_dump($foto);
            $filename = time() . '_' . $foto["name"];
            $foto_plek[$i] = $filename;

            move_uploaded_file($foto["tmp_name"], "./images/" . $filename);
            echo "Foto is geupload";
        }

        try {
          $filename = time() . '_' . $_FILES['first_photo']['name'];
          $fotoplek = $filename;
          move_uploaded_file($_FILES['first_photo']["tmp_name"], "./images/" . $filename);
          $fotoDev = $fotoplek;
          echo "Fotodev is geupload";
        } catch (Exception $e) {
          echo "Error: " . $e;
        }
        

        var_dump($foto_plek);
        nieuweWoning($title, $address, $postalcode, $place, $price, $kamers, $oppervlakte, $type, $description, "0", $location, $properties, $status, $fotoDev, $foto_plek[0], $foto_plek[1], $foto_plek[2], $foto_plek[3]);
        


    }
}

?>

<!doctype html>
<html lang="nl">
  <head>
	  <title>Woning voegen</title>

	  <meta charset="UTF-8">
	  <meta name="description" content="In deze geweldige pagina kunt u allerlei revieuws toevoegen. U bent van harte welkom ...">
	  <meta name="keywords" content="Knowitall, review, gasten, welkom">
	  <meta name="author" content="Mohamad Dian Bah">
	  <meta name="robots" content="all">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="icon" href="images/logos/logo-alleen.png" sizes="16x16">
	  <link rel="stylesheet" href="./add.css">
  </head>
  <body>
    <main>
      <div class="box">
        <div class="box-form">
          <form method="post" enctype="multipart/form-data"><role="form">
            <h2>Woning registreren</h2>
            <div class="div">
              <input type="text" name="title" placeholder="Titel">
            </div>
            <div class="div">
  
              <input type="text" name="price" placeholder="Prijs">
            </div>
            <div class="div">
  
              <label for="kamer_input">Aantal kamers: </label><input type="number" name="kamers" id="kamer_input">
            </div>
            <div class="div">
              <input type="text" name="oppervlakte" placeholder="Oppervlakte">
            </div>
            <div class="div">
              <div style="float: left;">
                <h3>Type woning:</h3>
              </div>
              <div style="float: left; padding-top: 4px; margin-left: 1rem;">
                <input type="radio" name="type" value="0">
                <label>Huis</label>
                <input type="radio" name="type" value="1">
                <label>Appartement</label>
              </div>
              <div class="clear" style="clear: both;"></div>
            </div>
            <div class="div">
              <input type="text" name="address" placeholder="Adres">
            </div>
            <div class="div">

              <input type="text" name="postalcode" placeholder="Postcode">
            </div>
            <div class="div">

              <input type="text" name="place" placeholder="Plaats">
            </div>
            <div class="div">

              <textarea input type="text" name="description" placeholder="Omschijving*"></textarea>
            </div>
            <b>Hoofd-afbeelding: </b><input type="file" name="first_photo" accept="image/*">
            <div class="div">
              <b>Kies 4 afbeeldingen: </b>
                <input type="file" name="photo_1" accept="image/*">
                <input type="file" name="photo_2" accept="image/*">
                <input type="file" name="photo_3" accept="image/*">
                <input type="file" name="photo_4" accept="image/*">
            </div>
            <div class="div">
              <!-- -----------start----Ligging------------------ -->
                <h3>Ligging:</h3>
                <input type="checkbox" name="location[]" value="0">
                <label>-Dicht bij een bos.</label>
                <input type="checkbox" name="location[]" value="1">
                <label>-Dicht bij een stad.</label>
                <input type="checkbox" name="location[]" value="2">
                <label>-Dicht bij de zee.</label>
                <input type="checkbox" name="location[]" value="3">
                <label>-In het heuvelland.</label>
                <input type="checkbox" name="location[]" value="4">
                <label>-Aan het water.</label>
            <!-- ----------einde-----Ligging------------------ -->
            </div>
            <div class="div">
              <!-- ----------start-----Eigenschappen------------------ -->
                  <h3>Eigenschappen:</h3>
                  <input type="checkbox" name="properties[]" value="0">
                  <label>-Inclusief overname inventaris.</label>
                  <input type="checkbox" name="properties[]" value="1">
                  <label>-Zwembad op het park.</label>
                  <input type="checkbox" name="properties[]" value="2">
                  <label>-Winkel op het park.</label>
                  <input type="checkbox" name="properties[]" value="3">
                  <label>-Entertainment op het park.</label>
                  <input type="checkbox" name="properties[]" value="4">
                  <label>-Op een privepark.</label>
                  <h3>Status:</h3>
                  <input type="radio" name="status" value="0">
                  <label>beschikbaar</label>
                  <input type="radio" name="status" value="1">
                  <label>verkocht</label>
              <!-- ---------einde------Eigenschappen------------------ -->
            </div>
              <div class="div">

                <button class="firstpagebutton" type="submit" name="submit" value="">Verzenden</button>
              </div>
  
            </table>
          </form>
        </div>
      </div>
    </main>

  </body>
</html>
