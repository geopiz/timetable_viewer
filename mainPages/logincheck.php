<link href="/css/styles.css" rel="stylesheet"/>
<?php
function checkUserLoggedIn()
{
    if (!isset($_SESSION['username'])) {
        // Display an error message with Bootstrap and custom CSS styling
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-6 text-center">';
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo '<strong>Error:</strong> You must be logged in to access this page. Redirecting to login page in 3 seconds...';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Redirect the user to the login page
        header("Refresh: 3; URL=\mainPages\login.php"); // Redirect after 3 seconds
        exit(); // Stop further execution of the script
    }
}



?>
