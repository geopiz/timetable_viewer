<?php
// Include your database connection settings
include "../config.php";

// Check if the department name was sent to this script via POST
if (isset($_POST['department'])) {
    $departmentName = $_POST['department'];  // Retrieve the department name from POST data

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $connect->prepare("SELECT ProgName FROM programmes JOIN departments ON programmes.DepartmentID = departments.DepartmentID WHERE DepName = ?");
    $stmt->bind_param("s", $departmentName);  // Bind the department name to the prepared statement
    $stmt->execute();  // Execute the prepared statement
    $result = $stmt->get_result();  // Get the result of the query

    // Prepare an HTML string for output
    $options = "<option value=''>Select a Programme</option>";
    while ($row = $result->fetch_assoc()) {
        $ProgName = htmlspecialchars($row['ProgName']);
        // Append each student as an option in the dropdown
        $options .= "<option value='" . $ProgName . "'>" . $ProgName . "</option>";
    }

    // Output the options directly (this is what the AJAX call will receive as a response)
    echo $options;
}
?>