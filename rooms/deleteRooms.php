<?php
include "config.php";

if (isset($_POST['RoomID'])) {
    $RoomID = mysqli_real_escape_string($connect, $_POST['RoomID']);

    // Prepare the delete statement to avoid SQL injection
    $query = "DELETE FROM rooms WHERE RoomID = ?";

    if ($stmt = mysqli_prepare($connect, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $RoomID);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Redirect back to the students page
    header("Location: rooms.php");
    exit;
} else {
    // If StudentID isn't set, redirect or show an error
    echo "Error: RoomID not provided.";
}
?>