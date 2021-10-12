<?php
// Start the session
    session_start();
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_destroy();
        echo "<p class='correct'>You have succesfully logged out.";
        include 'login.php';
        die();
    }
?>