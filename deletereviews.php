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


	$ReviewID = $_POST["ReviewDelete"];


// set up a query 
$query_string = "DELETE FROM reviews WHERE ReviewID ='".$ReviewID."';";

// run the query and store in result, if unsuccesful it will display an error
$result = mysqli_query($conn, $query_string) or die(mysqli_error($conn));

					mysqli_close($conn);
					echo "<p class='correct'>You have succesfully deleted a review.</p>";
					include("Reviews.php");
					//show successful output
							
?>
