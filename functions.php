<?php
session_start();
$dsn = "mysql:host=localhost;dbname=mentemedia_huizen";
try {
    $db = new PDO($dsn, "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function nieuweWoning($titel, $adres, $postcode, $plaats, $prijs, $kamers, $oppervlakte, $type, $omschrijving, $medewerker_id = 0, $ligging, $eigenschappen, $status, $fotoDev, $foto1, $foto2, $foto3, $foto4) {
    global $db;
    $ligging = !empty($ligging) ? $ligging : NULL;
    $eigenschappen = !empty($eigenschappen) ? $eigenschappen : NULL;

    $query = "INSERT INTO `woningen` (titel`, `adres`, `postcode`, `plaats`, `prijs`, `kamers`, `oppervlakte`, `type`, `omschrijving`, `mederwerker_id`, `ligging`, `eigenschappen`, `status`, `foto_def`, `foto_1`, `foto_2`, `foto_3`,`foto_4`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    try {
        if(is_array($ligging)){
            if(count($ligging) == 1) {
                $ligging = $ligging[0];
            }
        }
        if(is_array($eigenschappen)){
            if(count($eigenschappen) == 1) {
                $eigenschappen = $eigenschappen[0];
            }
        }
        $stmt->execute([$titel, $adres, $postcode, $plaats, $prijs, $kamers, $oppervlakte, $type, $omschrijving, $medewerker_id, $ligging, $eigenschappen, $status, $fotoDev, $foto1, $foto2, $foto3, $foto4]);
    } catch (Exception $e) {
        echo $e;
    }

    // $stmt = $db->prepare("INSERT INTO `medewerkerrs` (`username`, `wachtwoord`) VALUES ('test', 'test')")->execute();
    echo "test";
}

    

?>