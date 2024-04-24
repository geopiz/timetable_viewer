<?php
session_start();
include "../config.php";
include '../mainPages/logincheck.php';
checkUserLoggedIn();
if (isset($_POST['programme'])) {
    $programmeID = $_POST['programme'];

    // Assuming you have a ModuleID column in your modules table
    $stmt = $connect->prepare("SELECT ModuleID, ModName, ModDuration FROM modules WHERE ProgrammeID = ?");
    $stmt->bind_param("s", $programmeID);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = "<option value=''>Select a Module</option>";
    while ($row = $result->fetch_assoc()) {
        $ModName = htmlspecialchars($row['ModName']);
        $ModuleID = $row['ModuleID']; // Assuming there is a ModuleID field in your query result
        $options .= "<option value='" . $ModuleID . "'>" . $ModName . "</option>";  // Now the value attribute will hold the Module ID
    }

    echo $options;
}
?>
