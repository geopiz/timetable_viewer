<?php
include "../config.php";

if (isset($_POST['programme'])) {
    $programmeID = $_POST['programme'];

    // Prepare a query to fetch lecturer names and IDs associated with a given programme
    $stmt = $connect->prepare("SELECT LecturerID, LectName FROM lecturers WHERE ProgrammeID = ?");
    $stmt->bind_param("s", $programmeID);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = "<option value=''>Select a Lecturer</option>";
    while ($row = $result->fetch_assoc()) {
        $LectName = htmlspecialchars($row['LectName']);
        $LectID = $row['LecturerID'];  // Use LecturerID as the value
        $options .= "<option value='" . $LectID . "'>" . $LectName . "</option>";  // Here LecturerID is used as the value for better data handling
    }

    echo $options;
}
?>
