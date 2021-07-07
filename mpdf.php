<?php 
// class myPDF extends FPDF {
//     function header() {
//         global $stmt;
//         $this->SetMargins(10,60,10);
//         $this->Image("images/" . $stmt['foto_1'], 1, 1);
//         $this->Image("images/" . $stmt['foto_3'], 0.1, 0.1);
//         $this->Ln(80);
// }
// }

// $pdf = new myPDF();
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10, $stmt['titel'],1);
// $pdf->Cell(40,10,'Aantal Kamers: ' . $stmt['kamers']);
// $pdf->Output();
require_once __DIR__ . '/vendor/autoload.php';

require_once "functions.php";
// require_once 'fpdf/fpdf.php';
if(!isset($_GET['id'])) {
    header("Location: /");
}
$id = $_GET['id'];
$stmt = $db->query("SELECT * FROM woningen WHERE id=$id")->fetch();
$stylesheet = file_get_contents('pdf.css');



$mpdf = new \Mpdf\Mpdf([
    // 'default_font_size' => 20,
	// 'default_font' => 'arial'
]);

// $fotos = '<div>
// <img src="images/'.$stmt['foto_1'].'" 
//      style="width: 100px; height: 100px; margin: 0;" />
//      <img src="images/'.$stmt['foto_2'].'" 
//      style="width: 100px; height: 100px; margin: 0;" />
//      <img src="images/'.$stmt['foto_3'].'" 
//      style="width: 100px; height: 100px; margin: 0;" />
//      <img src="images/'.$stmt['foto_4'].'" 
//      style="width: 100px; height: 100px; margin: 0;" />
// </div>';

// $kamers = "<p>Aantal kamers: $stmt[kamers]</p>";
// $adres = "<p>Adres: $stmt[adres], $stmt[plaats] $stmt[postcode]</p>";
// $kamers = "<p>Oppervlakte: $stmt[oppervlakte]</p>";
// $type = 0 ? "Type: Huis" : "Type: Apartement";
// $omschrijving = "<p>Omschrijving: $stmt[omschrijving]</p>";
// $status = 0 ? "Status: Beschikbaar" : "Status: Verkocht";


// $mpdf->WriteHTML($fotos . '<h1>'. $stmt['titel'].'</h1>' . $kamers . $adres . $type . $omschrijving . $status);
// $mpdf->Output();
ob_start();
?>

<html>
    <head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://raw.githubusercontent.com/kartik-v/yii2-mpdf/master/src/assets/kv-mpdf-bootstrap.css">
    <style>

    @page {
        margin-top: 12rem;
    }

    * {
        color: black;
    }

    .logo-info {
        font-size: 2.3rem;
        font-weight: bold;


    }
    .logo-info span {
        font-size: 2rem;
        font-weight: bold;
        vertical-align:8px;
    }
    
    .adres {
        font-size: 1rem;
        font-weight: normal;
    }
    </style>
    </head>
    <body>
        <div class="logo-info row" >
            <div style="width: 70%; float:left;" >
                ▲<span>VRIJ WONEN</span>
            </div>
            <div class="adres" style="width:25%; float:right;">
                <p>Vakantiewoningmakelaar Vrij Wonen</p>
                <p>Disketteweg 2</p>
                <p>3815 AV Amersfoort</p>
            </div>
        </div>
        <div class="adres-prijs">
            <h1 style="width: 70%; float:left; padding-top: 1.38rem;" ><b><?php echo $stmt['titel'];?></b></h1>
            <h1 style="width:25%; float:right;"><b>&euro; <?php echo $stmt['prijs']; ?></b></h1>
        </div>
        <div class="grotefoto">
            <img src="images/<?php echo $stmt['foto_def']; ?>" style="width: 100%; max-height: 200px;" alt="">
        </div>
        <div class="vierfotos" style="margin-top: 1rem;">
            <img src="images/<?php echo $stmt['foto_1']; ?>" alt="" style="margin-right: 2rem; width: 20%;">
            <img src="images/<?php echo $stmt['foto_2']; ?>" alt="" style="margin-right: 2rem; width: 20%;">
            <img src="images/<?php echo $stmt['foto_3']; ?>" alt="" style="margin-right: 2rem; width: 20%;">
            <img src="images/<?php echo $stmt['foto_4']; ?>" alt="" style="width: 20%;">
        </div>
        <div class="omschrijving" style="margin-top: 3rem; font-size: 1.15rem; color: black;">
            <p><?php echo $stmt['omschrijving'] ?></p>
        </div>
        <div class="eigenschappen" style="margin-top: 4rem; width: 30%; float: left;">
            <h4><b>Eigenschappen</b></h4>
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
        <div class="ligging" style="width: 30%; float: left;">
            <h4><b>Ligging</b></h4>
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
    </body>
</html>


<?php
$content = ob_get_contents();
ob_clean();

$mpdf->WriteHTML($content);
$mpdf->Output();
?>