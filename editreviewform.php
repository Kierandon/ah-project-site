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
					<a href="reviews.php">Reviews</a>
					<a href="login.php">Sign-up/Login</a>
				</div>
				<br>
				<div id="box">
				<h2>Edit review!</h2>

				<form action='displayeditreviews.php' method='POST'>
					Please select the title of the review you'd like to edit.
					<br>
					<select  name="ReviewSelect">
					<?php
                    
                    #Select all reviewIDs + Title to populate form
                    $host="127.0.0.1";
                    $username="root";
                    $pword="mysql";
                    $database="myst";
 
                    $conn = mysqli_connect($host, $username, $pword, $database);
                
                    // query to select all reviews in the database
                    $query_string = "SELECT ReviewID,ReviewTitle FROM reviews";

                    // run the query and store in result, if unsuccesful it will display an error
                    $result = mysqli_query($conn, $query_string) or die(mysqli_error($conn));
                
                    // Take query and initialise into an array
                    $ReviewDetails = mysqli_fetch_all($result);

                    if (mysqli_num_rows($result) > 0) {
                        for ($x = 0; $x <= ((mysqli_num_rows($result))-1); $x++) {
                            echo"<option value='".$ReviewDetails[$x][0]."'>".$ReviewDetails[$x][1]."</option>";
                        }
                    }
                    
                    ?>
					</select>
					<br>
				<input type='submit' value='Edit Review'>
				</div>
				<br>
				<br>
				</form>
				<div class="Footer">
				<a href="#T&Cs">Terms & Conditions</a> 
			</div>
		</body>
</html>
