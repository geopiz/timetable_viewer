<?php
include "../config.php";

if (isset($_POST['UserID'])) {
    $UserID = mysqli_real_escape_string($connect, $_POST['UserID']);

    // Begin transaction
    mysqli_begin_transaction($connect);
    $errorOccurred = false;

    // Now, if there were no errors, delete the user
    if (!$errorOccurred) {
        $deleteUserQuery = "DELETE FROM users WHERE UserID = ?";
        if ($stmtUser = mysqli_prepare($connect, $deleteUserQuery)) {
            mysqli_stmt_bind_param($stmtUser, "i", $UserID);
            if (!mysqli_stmt_execute($stmtUser)) {
                $errorOccurred = true;
            }
            mysqli_stmt_close($stmtUser);
        } else {
            $errorOccurred = true;
        }
    }

    // If there were no errors, commit the transaction
    if (!$errorOccurred) {
        mysqli_commit($connect);
        // Redirect back to the users page
        header("Location: users.php");
        exit;
    } else {
        // Otherwise, roll back the transaction and report an error
        mysqli_rollback($connect);
        echo "Error: There was a problem deleting the user.";
    }
} else {
    // If UserID isn't set, redirect or show an error
    echo "Error: UserID not provided.";
}
?>
