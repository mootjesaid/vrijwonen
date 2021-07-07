<?php
require_once 'functions.php';
	if(isset($_POST['submit'])) {
		if(isset($_POST['username']) && isset($_POST['password'])) {
			$wachtwoord = $_POST['password'];
			$user = $_POST['username'];
			$stmt = $db->query("SELECT * FROM medewerkerrs WHERE username='$user' AND wachtwoord='$wachtwoord'")->fetch();
			if($stmt) {
				$_SESSION['in'] = 1;
				header("Location: index.php");
			} else{
				$_SESSION['error'] = 1;
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Login</title>
</head>
<body id="login-body">
    <div class="center">
        <div class="box">
            <h1>Login</h1>
            <form method="post">
                <?php
                    if(isset($_SESSION['error']) && $_SESSION['error'] === 1) { ?>
                <script>alert("Zorg ervoor dat u de juiste gebruikersnaam en wachtwoord gebruikt!")</script>
                    <?php } ?>
                <div class="input_field">
                    <input type="text" name="username" id="username" placeholder="Gebruikersnaam" required>
                </div>
                <div class="input_field">
                    <input type="text" name="password" id="password" placeholder="Wachtwoord" required>
                </div>
                <button type="submit" name="submit">Verzenden</button>
            </form>
        </div>
    </div>
</body>
<footer>
    <aside>
        <h2>Vrij wonen</h2>
        <h3>Woning + Maakelaardij</h3>
    </aside>
</footer>
</html>