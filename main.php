<?php
include 'config.php';
include 'mainPages/logincheck.php';
checkUserLoggedIn();

$loggedInUserEmail = $_SESSION['username'];
$sessionsData = [];

// Get the ProgrammeID and StudentSemester for the logged-in student
$studentInfoStmt = $connect->prepare("SELECT ProgrammeID, StudentSemester FROM students WHERE StudentEmail = ?");
$studentInfoStmt->bind_param("s", $loggedInUserEmail);
$studentInfoStmt->execute();
$studentResult = $studentInfoStmt->get_result();
$studentInfoStmt->close();

if ($studentInfo = $studentResult->fetch_assoc()) {
    $programmeId = $studentInfo['ProgrammeID'];
    $studentSemester = $studentInfo['StudentSemester'];

    // Get all ModuleIDs for that ProgrammeID and StudentSemester
    $modulesQuery = "SELECT ModuleID FROM modules WHERE ProgrammeID = ? AND ModSemester = ?";
    if ($modulesStmt = $connect->prepare($modulesQuery)) {
        $modulesStmt->bind_param("ii", $programmeId, $studentSemester);
        $modulesStmt->execute();
        $modulesResult = $modulesStmt->get_result();
        $modulesStmt->close();

        $moduleIds = [];
        while ($moduleId = $modulesResult->fetch_assoc()) {
            $moduleIds[] = $moduleId['ModuleID'];
        }

        if (count($moduleIds) > 0) {
            // Create a dynamic SQL query to fetch sessions for these modules
            $placeholders = implode(',', array_fill(0, count($moduleIds), '?')); // Placeholders for the query
            $types = str_repeat('i', count($moduleIds)); // Types for the bind_param

            // Prepare the SQL query with the right number of placeholders
            $sessionsQuery = "SELECT * FROM sessions join rooms on sessions.RoomID = rooms.RoomID WHERE ModuleID IN ($placeholders)";
            if ($sessionsStmt = $connect->prepare($sessionsQuery)) {
                $sessionsStmt->bind_param($types, ...$moduleIds);
                $sessionsStmt->execute();
                $sessionsResult = $sessionsStmt->get_result();
                $sessionsStmt->close();

                while ($session = $sessionsResult->fetch_assoc()) {
                    // Fetch the module name
                    $moduleInfoQuery = "SELECT ModName FROM modules WHERE ModuleID = ?";
                    if ($moduleInfoStmt = $connect->prepare($moduleInfoQuery)) {
                        $moduleInfoStmt->bind_param("i", $session['ModuleID']);
                        $moduleInfoStmt->execute();
                        $moduleInfoResult = $moduleInfoStmt->get_result();
                        $moduleInfoStmt->close();

                        if ($moduleInfo = $moduleInfoResult->fetch_assoc()) {
                            // Populate session data array
                            $sessionsData[] = [
                                'SessionID' => $session['SessionID'],
                                'ModuleID' => $session['ModuleID'],
                                'ModuleName' => $moduleInfo['ModName'],
                                'RoomID' => $session['RoomID'],
                                'RoomName' => $session['RoomName'],
                                'StartTime' => $session['StartTime'],
                                'EndTime' => $session['EndTime'],
                                'SessionDate' => $session['SessionDate']
                            ];
                        }
                    }
                }
            }
        } else {
            echo "No modules found for the given ProgrammeID and Semester.";
        }
    } else {
        echo "Failed to prepare modules query.";
    }
} else {
    echo "Student not found.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Timetable</title>
    <link rel="stylesheet" type="text/css" href="../css/styleMain.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

</head>
<body>

<?php
include "mainPages/Header.php";
$loggedInUserEmail = $_SESSION['username'];
echo "<h1 style='text-align: center; padding-top:50px;'>Welcome <span style='color: #5eb7b7'>$loggedInUserEmail</span></h1>";
?>


<div id="container" class="container container-maxwidth">
    <div class="container-timetable">
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th>Time / Day</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($hour = 9; $hour <= 16; $hour++): // Loop through each hour from 9 to 16 ?>
                <tr>
                    <td><?php echo sprintf('%02d:00 - %02d:00', $hour, $hour + 1); ?></td>
                    <?php for ($day = 2; $day <= 7; $day++): // Loop through each day ?>
                        <?php
                        $slotFilled = false;
                        foreach ($sessionsData as $session):
                            $sessionDate = new DateTime($session['SessionDate']);
                            $dayOfWeek = (int)$sessionDate->format('N');
                            $startTime = new DateTime($session['StartTime']);
                            $endTime = new DateTime($session['EndTime']); // Make sure to define $endTime here
                            $startHour = (int)$startTime->format('G');
                            $durationHours = $endTime->diff($startTime)->h;
                            $durationMinutes = $endTime->diff($startTime)->i;
                            $duration = $durationHours + ($durationMinutes > 0 ? 1 : 0); // Calculate duration including minutes

                            $gradientClasses = [
                                'accent-green-gradient',
                                'accent-blue-gradient',
                                'accent-orange-gradient',
                                'accent-cyan-gradient',
                                'accent-pink-gradient',
                                'accent-purple-gradient'
                            ];
                            $gradientClass = $gradientClasses[rand(0, count($gradientClasses) - 1)];

                            if ($dayOfWeek == $day && $startHour == $hour):
                                $slotFilled = true;
                                ?>
                                <td class="<?= $gradientClass; ?>" rowspan="<?= $duration ?>">
                                    <div class="content">
                                        <strong><?= $session['ModuleName']; ?></strong><br>
                                        <?= $session['RoomName']; ?>
                                    </div>
                                </td>
                            <?php endif;
                        endforeach;
                        if (!$slotFilled) echo '<td></td>'; // Fill in empty slot
                        ?>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>

            </tbody>
        </table>
    </div>
</div>


<?php include "mainPages/footer.php"; ?>

</body>
</html>

