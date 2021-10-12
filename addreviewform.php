<![DOCTYPE html>
<?php
    if(session_status() !== PHP_SESSION_ACTIVE)
    {
        session_start();
        // If the session variable userLogin does not exist then create one.
        if (!isset($_SESSION['UserLogin'])) {
            $_SESSION['UserLogin']= False ;   
			}
	}
?>
<html>
	<head>
		<meta charset=UTF-8>
			<title>Myst</title>
			<link rel="stylesheet" href="AH-Style.css">
	</head>
		<body>
			<div class="Main">
				<h1>Myst - Game Reviews</h1>
				<div class="HorizontalNav">
					<a class="active" href="home.php">Homepage</a>
					<a href="Reviews.php">Reviews</a>
					<a href="Login.php">Sign-up/Login</a>
				</div>
				<div id="box">
				<h2>Add review!</h2>

				<form action='addreviews.php' method='POST' enctype="multipart/form-data">
					Review Title:
					<br>
					<input type='text' name='ReviewTitle'>
					<br>
					<br>
					Review Text:
					<br>
					<textarea name='ReviewText' rows="10" cols="60"></textarea>
					<br>
					<br>
     				Review Image:
					<br>
					<input type="file" name="ReviewImage">
					<br>
					<br> 
					<br>
				<input type='submit' value='Add Review'>
				</div>
				<br>
				</form>
				<div class="Footer">
				<a href="#T&Cs">Terms & Conditions</a> 
			</div>
		</body>
</html>
