<!doctype html>
<head>
	<title>aanmelden</title>
	<link rel="stylesheet" href="design.css">
</head>
<body>
<?php
  try {
    $db = new PDO("mysql:host=localhost;dbname=vrijwilligers", "root", "");
    if(isset($_POST['verzenden']) && !empty($_POST['naam']) &&!empty($_POST['gender']) && !empty($_POST['woonplaats']) && !empty($_POST['email'])) {
      $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $leeftijd = filter_input(INPUT_POST, "leeftijd", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	  $woonplaats = filter_input(INPUT_POST, "woonplaats", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $query = $db->prepare("INSERT INTO vrijwilligers(naam,gender,leeftijd,woonplaats,email)VALUES(:naam, :gender, :leeftijd, :woonplaats, :email)");
      $query->bindParam("naam", $naam);
      $query->bindParam("gender", $gender);
      $query->bindParam("leeftijd", $leeftijd);
	  $query->bindParam("email", $email);
      $query->bindParam("woonplaats", $woonplaats);
	if($query->execute()) {
        echo "";
      } else {
        echo "fout";
      }
     echo "<br>";
	}
	}catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
   }
?> 
<div id="divge1">                      
<form method="post" action="">
  <input type="text" name="naam" placeholder="name"required><br>
  <input type="integer" name="leeftijd" placeholder="age" required><br>
  <input type="text" name="woonplaats" placeholder="residence" required><br>
  <input type="text" name="email" placeholder="email" required><br>
  
  <input type="radio" name="gender" value="man" required>
	<label>man</label>
  <input type="radio" name="gender"value="woman" required>
	<label>woman</label>
  <input type="radio" name="gender"value="neutral" required>
	<label>neutral</label>
  <br>
  
  
  <input type="submit" name="verzenden" value="Save">
  <input type="reset" value="Reset">
</form>
</div>
<div id="divge"> 
<?php
  try {
    $db = new PDO("mysql:host=localhost;dbname=vrijwilligers", "root", "");
    $query = $db->prepare("SELECT * FROM vrijwilligers");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
      foreach($result as &$data) {
        echo "<tr>";
          echo "<td>" . $data["naam"] . "</td>";
          echo "<td>" . $data["woonplaats"] . "</td>";
          echo "<td>" . $data["email"] . "</td>";
		  echo "<td>" . $data["leeftijd"] . "</td>";
          echo "<td>" . $data["gender"] . "</td>";
        echo "</tr>";
      }
    echo "</table>";
  } catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
  }
?>
</div>
<div id="divge2">
 <iframe id="iframe"src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d576771.5184934672!2d5.084090575265657!3d51.94813620724987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1snl!2snl!4v1678090540440!5m2!1snl!2snl" 
 style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</body>
</html>