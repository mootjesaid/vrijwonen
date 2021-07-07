<?php
require_once 'functions.php';
$id = $_GET['id'];
$stmt = $db->query("select  * from woningen WHERE id = $id")->fetch();






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    <h2>Wijzig gegevens</h2>

    <form class="form" action="" method="POST">
        <table>

            <tr>
                <td>
                    Titel
                </td>
                <td>
                    <input type="text" name="titel" placeholder="<?php echo $stmt['titel']?>"><br/>
                </td>
            </tr>



            <tr>
            <td>
                Adres
            </td>
            <td>
                <input type="text" name="adres" placeholder="<?php echo $stmt['adres']?>"><br/>
            </td>
            </tr>

            <tr>
            <td>
                Postcode
            </td>
            <td>
                <input type="text" name="postcode" placeholder="<?php echo $stmt['postcode']?>"><br/>
            </td>
            </tr>

            <tr>
            <td>
                Plaats
            </td>
            <td>
                <input type="text" name="plaats" placeholder="<?php echo $stmt['plaats']?>"><br/>
            </td>
            </tr>

            <tr>
            <td>
                Prijs
            </td>
            <td>
                <input type="text" name="prijs" placeholder="<?php echo $stmt['prijs']?>"><br/>
            </td>
            </tr>

            <tr>
            <td>
                Kamers
            </td>
            <td>
                <input type="text" name="kamers" placeholder="<?php echo $stmt['kamers']?>"><br/>
            </td>

            <tr>
                <td>
                    Oppervlakte
                </td>
                <td>
                    <input type="text" name="titel" placeholder="<?php echo $stmt['oppervlakte']?>"><br/>
                </td>
            </tr>

            <?php
            $type = $stmt['type']
            ?>

            <tr>
            <td>
                Type
            </td>
            <td>
                <input type="radio" name="type" value="0" <?php if ($type == '0') echo 'checked="checked"'; ?>>
                <label>Huis</label>
                <input type="radio" name="type" value="1" <?php if ($type == '1') echo 'checked="checked"'; ?>>
                <label>Appartement</label>
            </td>
            </tr>

            <?php
            $status = $stmt['status'];
            ?>

            <tr>
                <td>
                    Status
                </td>
                <td>
                    <input type="radio" name="status" value="0" <?php if ($status == '0') echo 'checked="checked"'; ?> />
                    <label>beschikbaar</label>
                    <input type="radio" name="status" value="1" <?php if ($status == '1') echo 'checked="checked"'; ?>>
                    <label>verkocht</label>
                </td>
            </tr>

        </table>




        <input class="submit" type="submit" name="update" value="update"/>
    </form>

</main>
</body>
<footer>
    <aside>
        <h2>Vrij wonen</h2>
        <h3>Woning + Maakelaardij</h3>
    </aside>
</footer>
</html>

<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'mentemedia_huizen');

if (isset($_POST['update']))
{

    $query = "UPDATE `woningen` SET titel='$_POST[titel]', adres='$_POST[adres]', postcode='$_POST[postcode]', plaats='$_POST[plaats]', prijs='$_POST[prijs]', kamers='$_POST[kamers]', type='$_POST[type]', oppervlakte='$_POST[oppervlakte]', status='$_POST[status]'   where id='$_GET[id]'";
    $query_run = mysqli_query($connection,$query);

    if ($query_run)
    {
        echo '<script type="text/javascript"> alert("data updated") </script>';
    }
    else
    {
        echo '<script type="text/javascript"> alert("data not updated") </script>';
    }
}
