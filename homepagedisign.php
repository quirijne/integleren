<!DOCTYPE html> 
	<head>
		<title>homepage</title>
		<link rel="stylesheet" href="design.css">
	</head> 
	<body>
	<?php
	session_start();
		if($_SESSION['inlog'] == 'true'){
			echo "";
		} else {
			header("location: inloggen.php");
		}
	?>
		<div id="home">
			<a href="home2.php" target="main">
				<img src="logo.png" id="logo">
			</a>
			<div id="topin"><a href="inhoud.php" target="main">
					<button class="knop">content</button>
				</a>
			</div>
			<div id="topdoel"><a href="doel.php" target="main">
					<button class="knop">about this website</button>
				</a>
			</div>
			<div id="review"> <a href="review.php" target="main">
					<button class="knop">review</button>
				</a>
			</div>
			<div id="uit"> 
				<a href="begin.php">
					<button type="submit" class="knop" name="loguit">
						log out
					</button>
				</a>
			</div>
		</div>
		<iframe src="home2.php"id="div2" name="main"></iframe>
	</body>
</html>