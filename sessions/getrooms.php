<?php
session_start();
include "../config.php";
include '../mainPages/logincheck.php';
checkUserLoggedIn();
if (isset($_POST['module'])) {
    $moduleId = $_POST['module'];  // Expecting the module ID now, not the name

    // Updated query to join on ModuleID directly
    $stmt = $connect->prepare("SELECT * FROM rooms JOIN roommodules ON rooms.RoomID = roommodules.RoomID WHERE roommodules.ModuleID = ?");
    $stmt->bind_param("i", $moduleId);  // Binding as integer since ModuleID is a numeric ID
    $stmt->execute();
    $result = $stmt->get_result();

    $options = "<option value=''>Select a Room</option>";
    while ($row = $result->fetch_assoc()) {
        $RoomName = htmlspecialchars($row['RoomName']);
        $RoomID = $row['RoomID'];  // Assuming you have a RoomID field
        $options .= "<option value='" . $RoomID . "'>" . $RoomName . "</option>";  // Using RoomID as the value for better data handling
    }

    echo $options;
}
?>
