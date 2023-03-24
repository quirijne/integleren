<!doctype html>
<head>
	<title>aanmelden</title>
	<link rel="stylesheet" href="design.css">
</head>
<body id="body">
<div id="aanmelden">
<form method="post" action="">
	<input type="text" name="gebruikersnaam" placeholder="username" required><br>
	<input type="password" name="wachtwoord" placeholder="password" required><br>
	<input type="text" name="email" placeholder="email" required><br>
	<input type="text" name="woonplaats" placeholder="residence" required><br>
	<input type="integer" name="leeftijd" placeholder="age" required><br>
	<input type="radio" name="gender" value="man" required>
		<label>man</label>
	<input type="radio" name="gender"value="woman" required>
		<label>woman</label>
	<input type="radio" name="gender"value="neutral" required>
		<label>neutral</label><br>
	<input type="submit" name="inloggen" value="aanmelden" required>
  </form>
	<div id="account1">
		<p>Already have an account? <a href="inloggen.php">Login</a></p>
	</div>
</div>
<?php 
  try {
    $db = new PDO("mysql:host=localhost;dbname=vrijwilligers", "root", "");
	$wachtwoord = filter_input(INPUT_POST, "wachtwoord", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$hash= password_hash($wachtwoord, PASSWORD_DEFAULT);
	$gebruikersnaam = filter_input(INPUT_POST, "gebruikersnaam", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $leeftijd = filter_input(INPUT_POST, "leeftijd", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$woonplaats = filter_input(INPUT_POST, "woonplaats", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$query = $db->prepare("INSERT INTO inloggen(gebruikersnaam, wachtwoord, gender, leeftijd, woonplaats, email) VALUES(:gebruikersnaam, :wachtwoord, :gender, :leeftijd, :woonplaats, :email)");
    $query->bindParam("wachtwoord", $hash);
	$query->bindParam("gebruikersnaam", $gebruikersnaam);
	$query->bindParam("gender", $gender);
    $query->bindParam("leeftijd", $leeftijd);
	$query->bindParam("email", $email);
    $query->bindParam("woonplaats", $woonplaats);
	if($query->execute()) {
		echo "";
    } else {
      echo "Er is een fout opgetreden!";
    }
  } catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
  }
?>
