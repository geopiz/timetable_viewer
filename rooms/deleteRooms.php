<?php
include "../config.php";

if (isset($_POST['RoomID'])) {
    $RoomID = mysqli_real_escape_string($connect, $_POST['RoomID']);

    // Begin transaction
    mysqli_begin_transaction($connect);
    $errorOccurred = false;

    // First delete room-module associations to maintain database integrity
    $deleteRoomModulesQuery = "DELETE FROM roommodules WHERE RoomID = ?";
    if ($stmtRoomModules = mysqli_prepare($connect, $deleteRoomModulesQuery)) {
        mysqli_stmt_bind_param($stmtRoomModules, "i", $RoomID);
        if (!mysqli_stmt_execute($stmtRoomModules)) {
            $errorOccurred = true;
        }
        mysqli_stmt_close($stmtRoomModules);
    } else {
        $errorOccurred = true;
    }

    // Now, if there were no errors, delete the room
    if (!$errorOccurred) {
        $deleteRoomQuery = "DELETE FROM rooms WHERE RoomID = ?";
        if ($stmtRoom = mysqli_prepare($connect, $deleteRoomQuery)) {
            mysqli_stmt_bind_param($stmtRoom, "i", $RoomID);
            if (!mysqli_stmt_execute($stmtRoom)) {
                $errorOccurred = true;
            }
            mysqli_stmt_close($stmtRoom);
        } else {
            $errorOccurred = true;
        }
    }

    // If there were no errors, commit the transaction
    if (!$errorOccurred) {
        mysqli_commit($connect);
        // Redirect back to the rooms page
        header("Location: rooms.php");
        exit;
    } else {
        // Otherwise, roll back the transaction and report an error
        mysqli_rollback($connect);
        echo "Error: There was a problem deleting the room.";
    }
} else {
    // If RoomID isn't set, redirect or show an error
    echo "Error: RoomID not provided.";
}
?>
