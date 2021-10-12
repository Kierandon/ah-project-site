<!DOCTYPE html>
<?php
 // Start the session
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
					<a href="home.php">Homepage</a>
					<a class="active" href="Reviews.php">Reviews</a>
					<a href="Login.php">Sign-up/Login</a>
				</div>
				
				<?php
				if(isset($_SESSION['UserName'])) 
				{
					if($_SESSION['UserType'] == "Reviewer")
					{
						include('reviewertoolbar.html');
					}
				}
					
					$host="127.0.0.1";
 				 	$username="root";
 				 	$pword="mysql";
 				 	$database="myst";
 
					$conn = mysqli_connect($host, $username, $pword, $database);
				
					// query to select all reviews in the database
					$query_string = "SELECT * FROM reviews";

					// run the query and store in result, if unsuccesful it will display an error
					$result = mysqli_query($conn, $query_string) or die(mysqli_error($conn));
				
					// Take query and initialise into an array
					$ReviewDetails = mysqli_fetch_all($result);
					
					$num_of_rows = mysqli_num_rows($result);
					
					if ($num_of_rows > 0) {
					
						for ($x = $num_of_rows-1; $x >= 0; $x--) 
						{		
						echo"<div class='reviewbox'>";
						echo"<div class='reviewDetails'><div class='left'>Review No: ".$ReviewDetails[$x][0]."</div><div class='right'>Posted: ".$ReviewDetails[$x][4]."</div></div>";
						echo"<p style='text-decoration:underline;text-align:center;font-size: 30px;'><b>".$ReviewDetails[$x][1]."</b></p>";

						// Don't display review image element if not in database
						if($ReviewDetails[$x][5] !== "") {
							echo"<img class='reviewImage' src='". $ReviewDetails[$x][5] ."'>";
						}

						echo"<div class='center'><h2>By ".$ReviewDetails[$x][3]."</h2><br></div>";
						echo"<hr><br><p>".$ReviewDetails[$x][2]."</p><br>";
						echo"</div>";
						}
				
					}
				?>
				<div class="Footer">
					<a href="#T&Cs">Terms & Conditions</a>
				</body>
			</div>
		</html>
