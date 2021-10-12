<?php
    $host="127.0.0.1";
    $username="root";
    $pword="mysql";
    $database="myst";
 
$conn = mysqli_connect($host, $username, $pword, $database);
    $username = $_POST['username'];
    $password = $_POST['userpassword'];
    $type = $_POST['type'];


// Check if username is empty, display error if true and go back to register page.
if ($username == "") {
    mysqli_close($conn);
    include("login.php");
    echo "<p class='error'>Username cannot be empty.</p>";
    die();
}

// Check if password is less than 7 characters, display error if true and go back to register page.
if (strlen($password) <= 6) {
    mysqli_close($conn);
    include("login.php");
    echo "<p class='error'>Password not long enough, needs to be more than 6 characters long.</p>";
    die();
}


//Checking if user with the same username already exists before adding the user
$query_string = "SELECT username FROM logins WHERE logins.username = '". $username . "'";

// run the query and store in result, if unsuccesful it will display an error
$result = mysqli_query($conn, $query_string) or die(mysqli_error($conn));

// if number of rows stored in $num_of_rows > 0, means record with the same username has been detected
        if (mysqli_num_rows($result) > 0) {
            //show successful output
                        
            mysqli_close($conn);
            include("login.php");
            echo "<p class='error'>User already exists, please try a different username</p>";
        }
                
            // if number of rows stored in $num_of_rows < 0, means no record with the same username exists
            elseif (mysqli_num_rows($result) == 0) {

                //set up a query to add user to database
                $query_string = "INSERT INTO logins (username, password, type) VALUES ('" . $username . "','" . $password . "','" . $type . "')";
                
                //run the query
                if (mysqli_query($conn, $query_string)) {
                    echo "<p class='correct'>You have succesfully registered.";
                    include("login.php");
                    mysqli_close($conn);
                } else {
                    echo "Error: " . $query_string . "<br>" . mysqli_error($conn);
                    mysqli_close($conn);
                }
            }
