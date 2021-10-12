<!DOCTYPE html>
<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
        // If the session variable userLogin does not exist then create one.
        if (!isset($_SESSION['UserLogin'])) {
            $_SESSION['UserLogin']= false ;
        }
    }
?>
<html lang="en">
	<head>
		<meta charset=UTF-8>
			<title>Myst</title>
			<link rel="stylesheet" href="AH-Style.css"</head>
		<body>
			<div class="Main">
				<h1>Myst - Game Reviews</h1>
				<div class="HorizontalNav">
					<a class="active" href="home.php">Homepage</a>
					<a href="reviews.php">Reviews</a>
					<a href="login.php">Sign-up/Login</a>
				</div>
				
			<br>
			<img src="frontpage.jpg" style="border-radius: 50px;border: 3px solid black;" class="center" width="500">	
				
				
			<div id="box">
				<div id="maincontent">
				<h2>Welcome to Myst - Game Reviews</h2>
				<br>
				</div>
				<div class="row">
					<h2 style="text-decoration:underline;">Featured Reviews:</h2>
					<div class="column">
						<h2>Hades</h2>
						<p>Defy the god of the dead as you hack and slash out of the Underworld in this rogue-like dungeon crawler from the creators of Bastion, Transistor, and Pyre. Hades is a god-like rogue-like dungeon crawler that combines the best aspects of Supergiants critically acclaimed titles, including the fast-paced action of Bastion, the rich atmosphere and depth of Transistor, and the character-driven storytelling of Pyre. </p>
					</div>
					<div class="column">
						<h2>Ori and the Will of the Wisps</h2>
						<p>From the creators of Ori and the Blind Forest comes the highly-anticipated sequel, Ori and the Will of the Wisps. Embark on an all-new adventure in a vast and exotic world where you’ll encounter towering enemies and challenging puzzles on your quest to discover Ori’s true destiny.</p>
					</div>
					<div class="column">
						<h2>Mortal Kombat 11 Ultimate</h2>
						<p>Experience 2 robust and critically acclaimed story campaigns from Mk11 & Mk11: aftermath. Play as the complete 37-character roster including newly added fighters mileena, RaiN & rambo. Thousands of Skins & weapons & Gear for an unprecedented level of Fighter customization. Includes all previous guest fighters such as Terminator Joker spawn & robocop. Every mode included.</p>
					</div>
				</div>
				
			</div>
			<div class="Footer">
						<a href="#T&Cs">Terms & Conditions</a>
					</div>
					</body>
			</html>

