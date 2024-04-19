<?php
// Include the database connection file
include "../config.php";

// Make sure the moduleId parameter is passed to the script
if (isset($_POST['moduleId']) && !empty($_POST['moduleId'])) {
    // Retrieve the moduleId from the POST request
    $moduleId = $_POST['moduleId'];

    // Prepare a SQL query to get the module duration from the database
    $query = "SELECT ModDuration FROM modules WHERE ModuleID = ?";

    // Prepare the statement to prevent SQL injection
    if ($stmt = $connect->prepare($query)) {
        // Bind the moduleId parameter to the query
        $stmt->bind_param("i", $moduleId);
        // Execute the query
        $stmt->execute();
        // Store the result
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Bind the result to a variable
            $stmt->bind_result($modDuration);
            // Fetch the data
            $stmt->fetch();
            // Output the module duration as JSON
            echo json_encode(['duration' => $modDuration]);
        } else {
            // Output a JSON object with a null duration if the module was not found
            echo json_encode(['duration' => null]);
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // If the statement couldn't be prepared, output an error message
        echo json_encode(array('error' => 'Database query could not be prepared.'));
    }

    // Close the database connection
    $connect->close();
} else {
    // Output an error message if the moduleId wasn't provided
    echo json_encode(array('error' => 'Module ID was not provided.'));
}
?>
