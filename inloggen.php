<!doctype html>
<head>
	<title>inloggen</title>
	<link rel="stylesheet" href="design.css">
</head>
<body id="body">
<div id="aanmelden">
<form method="post" action="">
  <input type="text" name="gebruikersnaam" placeholder="username"><br>
	
  <input type="password" name="wachtwoord" placeholder="password"><br>
	
  <input type="submit" name="inloggen" value="Inloggen"><br><br><br><br><br><br><br>
</form>	
<?php 
session_start();
  try {
  $db = new PDO("mysql:host=localhost;dbname=vrijwilligers", "root", "");
  if(isset($_POST['inloggen'])) {
      $gebruikersnaam = filter_input(INPUT_POST, "gebruikersnaam", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $wachtwoord = $_POST['wachtwoord'];
      $query = $db->prepare("SELECT * FROM inloggen 
                             WHERE gebruikersnaam = :gebruikersnaam");
      $query->bindParam("gebruikersnaam", $gebruikersnaam);
      $query->execute();
      if($query->rowCount() == 1) {
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if(password_verify($wachtwoord, $result["wachtwoord"])) {
			$_SESSION['inlog'] = "true";
		  header("location: homepagedisign.php");
        } else {
          echo "Onjuiste gegevens!";
        } 
      } else {
        echo "Onjuiste gegevens!";
      }
      echo "<br>";
    }
  } catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
  }
?>
	<div id="account1">
		no account yet? <a href="aanmelden.php">Click here </a>
	</div>
</div>
</body>
</html>