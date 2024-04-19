<?php
include "../config.php";

if (isset($_POST['StudentID'])) {
    $StudentID = mysqli_real_escape_string($connect, $_POST['StudentID']);

    // Prepare the delete statement to avoid SQL injection
    $query = "DELETE FROM students WHERE StudentID = ?";

    if ($stmt = mysqli_prepare($connect, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $StudentID);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Redirect back to the students page
    header("Location: students.php");
    exit;
} else {
    // If StudentID isn't set, redirect or show an error
    echo "Error: StudentID not provided.";
}
?>