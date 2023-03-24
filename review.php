<!DOCTYPE html> 
	<head>
		<title> review</title>
		<link rel="stylesheet" href="design.css">
	</head> 
	<body>
	<div id="review1">
		<p>if you want to let us know anything else or have any tips let us know below.</p>
	</div>
	<div id="review2">
		<form method="post" action="">
			<label></label>
			<textarea name="review" rows="10" cols="100"></textarea>
			
			<input type="submit" name="verzenden" value="save">
		</form>
	</div>
<?php
	try {
		$db = new PDO("mysql:host=localhost;dbname=vrijwilligers", "root", "");
		if(isset($_POST['verzenden'])) {
		$review = filter_input(INPUT_POST, "review", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$query = $db->prepare("INSERT INTO review(review)VALUES(:review)");
		$query->bindParam("review", $review);
	if($query->execute()) {
        echo "";
      } else {
        echo "";
      }
     echo "<br>";
	}
	}catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
   }
?> 
	</body>
</html>