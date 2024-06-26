<?php
include "config.php";

if (isset($_POST['LecturerID'])) {
    $LecturerID = mysqli_real_escape_string($connect, $_POST['LecturerID']);

    // Prepare the delete statement to avoid SQL injection
    $query = "DELETE FROM lecturers WHERE LecturerID = ?";

    if ($stmt = mysqli_prepare($connect, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $LecturerID);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Redirect back to the students page
    header("Location: staff.php");
    exit;
} else {
    // If StudentID isn't set, redirect or show an error
    echo "Error: StudentID not provided.";
}
?>