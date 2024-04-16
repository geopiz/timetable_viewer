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

<?php
// Your PHP code for session checks and fetching data goes here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Timetable</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<?php include "mainPages/Header.php"; ?>

<div class="container-timetable">
    <div class="timetable">
        <div class="week-names">
            <div>Monday</div>
            <div>Tuesday</div>
            <div>Wednesday</div>
            <div>Thursday</div>
            <div>Friday</div>
            <div class="weekend">Saturday</div>
            <div class="weekend">Sunday</div>
        </div>
        <div class="time-interval">
            <div>09:00 - 10:00</div>
            <div>10:00 - 11:00</div>
            <div>11:00 - 12:00</div>
            <div>12:00 - 13:00</div>
            <div>13:00 - 14:00</div>
            <div>14:00 - 15:00</div>
            <div>15:00 - 16:00</div>
            <div>16:00 - 17:00</div>
            
        </div>
        <div class="content">
            <!-- Dynamically populate the timetable with PHP -->
            <?php foreach ($sessionsData as $session):
            // Calculate the day of the week for the session
            $sessionDate = new DateTime($session['SessionDate']);
            $dayOfWeek = (int)$sessionDate->format('N'); // 1 for Monday, 7 for Sunday

            // Time formatting
            $startTime = new DateTime($session['StartTime']);
            $endTime = new DateTime($session['EndTime']);

            // Calculate start time position (assuming the first time slot starts at 9:00)
            $startHour = (int)$startTime->format('G'); // 24-hour format without leading zeros
            $startTimePosition = $startHour - 9 + 1; // +1 because grid-row is 1-indexed

            // Calculate duration in hours
            $duration = $endTime->diff($startTime)->h;

            // If the duration is 0 and the end minute is greater, it means the session is less than 1 hour but should still take 1 hour slot
            if ($duration === 0 && $endTime->format('i') > $startTime->format('i')) {
                $duration = 1;
            }

            // Determine the gradient class based on the module or any other criteria
            $gradientClass = "accent-orange-gradient"; // This is an example, you can customize it
            ?>
            <div class="<?php echo $gradientClass; ?>" style="grid-column: <?php echo $dayOfWeek; ?>; grid-row: <?php echo $startTimePosition; ?> / span <?php echo $duration; ?>;">
            <div><strong><?= $session['ModuleName']; ?></strong></div>
            <div><?= $session['RoomName']; ?></div>
    </div>
            </div>
            <?php endforeach; ?>


            <!-- The rest of the empty divs go here if needed for layout -->
        </div>
    </div>
</div>

<?php include "mainPages/footer.php"; ?>

</body>
</html>

