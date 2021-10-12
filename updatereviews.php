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
// Check if the user trying to add a review IS a reviewer, for security
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

	$ReviewID = $_POST["ReviewID"];
	$ReviewTitle = $_POST["ReviewTitle"];
    $ReviewText = $_POST["ReviewText"];

// set up a query 
$query_string = "UPDATE reviews
SET ReviewTitle = '".$ReviewTitle."', ReviewText = '".$ReviewText."' WHERE ReviewID = '".$ReviewID."' ";

// run the query and store in result, if unsuccesful it will display an error
$result = mysqli_query($conn, $query_string) or die(mysqli_error($conn));

					echo "<p class='correct'>You have succesfully edited a review.</p>";
					mysqli_close($conn);
					include("Reviews.php");
					//show successful output
		
?>
