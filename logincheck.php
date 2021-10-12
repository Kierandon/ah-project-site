<?php
// Start the session
    session_start();
    
    $host="127.0.0.1";
    $username="root";
    $pword="mysql";
    $database="myst";
 
$conn = mysqli_connect($host, $username, $pword, $database);


    $username = $_POST["username"];
    $userpass = $_POST["userpassword"];

// set up a query
$query_string = "SELECT * FROM logins WHERE logins.username = '". $username . "' AND logins.password = '". $userpass . "'";

// run the query and store in result, if unsuccesful it will display an error
$result = mysqli_query($conn, $query_string) or die(mysqli_error($conn));

// if number of rows stored in $num_of_rows > 0, means record with correct username and password was entered.
        if (mysqli_num_rows($result) > 0) {  //run the query
                    $_SESSION['UserLogin'] = true;
                
            // Take query and initialise into an array to find user name
            $Userarray = mysqli_fetch_array($result);
            $_SESSION['UserName'] = $Userarray['username'];
                    
            // Take query and initialise into an array to find id
            $_SESSION['UserID'] = $Userarray['id'];
                    
            // Find user type
            $_SESSION['UserType'] = $Userarray['type'];
            echo "<p class='correct'>You have logged in. Welcome ".$username.", you are a ".$_SESSION['UserType'].", with ID ".$_SESSION['UserID']."</p>";
            mysqli_close($conn);
            include("home.php");
                    
        //show successful output
        }
                
            // if number of rows stored in $num_of_rows < 0, means record with incorrect user+password was entered
            elseif (mysqli_num_rows($result) == 0) {
                echo "<p class='error'>Login incorrect</p>";
                mysqli_close($conn);
                include("login.php");
            }
