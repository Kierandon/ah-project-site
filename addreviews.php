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


$ReviewTitle = $_POST["ReviewTitle"];
$ReviewText = $_POST["ReviewText"];

// Sanitize input by removing illegal characters.
$ReviewTitle = str_replace("'","", $ReviewTitle) ;
$ReviewText = str_replace("'","", $ReviewText) ;

//Upload image script - referenced from https://www.w3schools.com/php/php_file_upload.asp


// Only begin upload if an image has been selected.
if($_FILES["ReviewImage"]['name'] !== "") {

	$target_dir = "images/";
	$target_dir = $target_dir . basename($_FILES["ReviewImage"]["name"]);

	// If file already exists then send back to addreview page.
	if (file_exists($target_dir)) {
		echo "<p class='error'>Sorry, file already exists. Please change the filename.</p>";
		include("addreviewform.php");
		die();
	  } 


	if (move_uploaded_file($_FILES["ReviewImage"]["tmp_name"], $target_dir)) {
		
	} else {
		echo "Sorry, there was an error uploading your file. Please try again.";
		include("addreviewform.php");
		die();
	}

}


// set up a query
$query_string = "INSERT INTO reviews (ReviewTitle, ReviewText, ReviewerName, ReviewImageLocation) 
VALUES ('" . $ReviewTitle . "','" . $ReviewText . "','" . $_SESSION['UserName'] . "','" . $target_dir . "');"  ;

// run the query and store in result, if unsuccesful it will display an error
$result = mysqli_query($conn, $query_string) or die(mysqli_error($conn));

					echo "<p class='correct'>You have succesfully added a review.</p>";		
					mysqli_close($conn);
					include("Reviews.php");
					//show successful output

?>
