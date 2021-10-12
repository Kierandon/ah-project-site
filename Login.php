<!DOCTYPE html>
<?php
// Start the session
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
        // If the session variable userLogin does not exist then create one.
        if (!isset($_SESSION['UserLogin'])) {
            $_SESSION['UserLogin']= false ;
        }
    }
?>
<html>
	<head>
		<meta charset=UTF-8>
			<title>Myst</title>
			<link rel="stylesheet" href="AH-Style.css"</head>
		<body>
			<div class="Main">
				<h1>Myst - Game Reviews</h1>
				<div class="HorizontalNav">
					<a href="home.php">Homepage</a>
					<a href="reviews.php">Reviews</a>
					<a class="active" href="login.php">Sign-up/Login</a>
				</div>
				<?php

#If logged in, only the log out form will display
if ($_SESSION['UserLogin'] == true) {
    echo"<div id='registerloginbox''><div id='signoutbox'>";
    include("logouttemplate.php");
    echo"</div></div>";
}
#If not logged in, both the log in and register form will display
else {
    echo"<div class='row' id='registerloginbox'>";
    echo"<div class='column' id='loginbox'>";
    include("logintemplate.php");
    echo"</div><br>";

    echo"<div class='column' id='registerbox'>";
    include("registertemplate.php");
    echo"</div>";
    echo"</div>";
}
?>
				<div class="Footer">
					<a href="#T&Cs">Terms & Conditions</a>
				</body>
			</div>
		</html>
