<?php
include "../config.php";
include '../mainPages/logincheck.php';
checkUserLoggedIn();
if (isset($_POST['SessionID'])) {
    $SessionID = mysqli_real_escape_string($connect, $_POST['SessionID']);

    // Prepare the delete statement to avoid SQL injection
    $query = "DELETE FROM sessions WHERE SessionID = ?";

    if ($stmt = mysqli_prepare($connect, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $SessionID);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Redirect back to the students page
    header("Location: sessions.php");
    exit;
} else {
    // If StudentID isn't set, redirect or show an error
    echo "Error: SessionID not provided.";
}
?>