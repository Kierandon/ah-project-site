<!DOCTYPE html>
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
			<link rel="stylesheet" href="AH-Style.css"</head>
		<body>
			<div class="Main">
				<h1>Myst - Game Reviews</h1>
				<div class="HorizontalNav">
					<a class="active" href="home.php">Homepage</a>
					<a href="Reviews.php">Reviews</a>
					<a href="Login.php">Sign-up/Login</a>
				</div>
<?php
// Check if the user trying to add a review IS a reviewer
	 if ($_SESSION['UserType'] !== "Reviewer")
	 {
		 
		 echo "<p class='error'>You are not authorised to use this " . $_SESSION['UserType'] . "</p>";
		 include("home.php");
		 die();

	 }
	

	$host="127.0.0.1";
  	$username="root";
  	$pword="mysql";
  	$database="myst";
 
					$conn = mysqli_connect($host, $username, $pword, $database);
				
					$ReviewSelect = $_POST["ReviewSelect"];
				
				
					// query to select all reviews in the database
					$query_string = "SELECT ReviewTitle, ReviewText FROM reviews WHERE ReviewID = '".$ReviewSelect."'";

					// run the query and store in result, if unsuccesful it will display an error
					$result = mysqli_query($conn, $query_string) or die(mysqli_error($conn));
				
					// Take query and initialise into an array
					$ReviewDetails = mysqli_fetch_all($result);
				    echo"<form action='updatereviews.php' method='POST'>";
					echo"ReviewID<br><input style='width:30px';type='text' name='ReviewID' readonly value='".$ReviewSelect."'>";
					echo"<br>Review Title:";
					echo"<br>";
					echo"<input type='text' name='ReviewTitle' value='".$ReviewDetails[0][0]."'>";
					echo"<br>";
					echo"Review Text:";
					echo"<br>";
					echo"<textarea name='ReviewText' rows='10' cols='60'/>".$ReviewDetails[0][1]."</textarea>";
					echo"<br>";
					echo"<input type='submit' value='Update Review'>";
					echo"</form>";

?>
					<div class="Footer">
						<a href="#T&Cs">Terms & Conditions</a>
					</body>
				</div>
			</html>








