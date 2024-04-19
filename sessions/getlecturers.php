<?php
include "config.php";

if (isset($_POST['programme'])) {
    $programmeName = $_POST['programme'];

    $stmt = $connect->prepare("SELECT LectName FROM lecturers WHERE ProgrammeID = (SELECT ProgrammeID FROM programmes WHERE ProgName = ?)");
    $stmt->bind_param("s", $programmeName);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = "<option value=''>Select a Lecturer</option>";
    while ($row = $result->fetch_assoc()) {
        $LectName = htmlspecialchars($row['LectName']);
        $options .= "<option value='" . $LectName . "'>" . $LectName . "</option>";
    }

    echo $options;
}
?>
