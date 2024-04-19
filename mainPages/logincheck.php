<?php
function checkUserLoggedIn() {
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: /mainPages/login.php");
        exit();
    }
    // You can expand this function to perform more checks if needed
}

?>
