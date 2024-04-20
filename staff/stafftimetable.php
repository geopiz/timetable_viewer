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
include '../config.php';
include "../mainPages/Header.php";
$loggedInUserEmail = ucfirst($_SESSION['username']);
echo "<h1 style='text-align: center; padding-top:100px;'>Welcome <span style='color: #5eb7b7'>$loggedInUserEmail</span></h1>";
?>

        <?php


        $loggedInUserEmail = $_SESSION['username'];
        $sessionsData = [];

        if (isset($_GET['date'])) {
            $selectedDate = new DateTime($_GET['date']);
        } else {
            $selectedDate = new DateTime('today');
        }

        $dayOfWeek = (int)$selectedDate->format('w');

        // If the selected date is Sunday, set the range to the next Sunday
        if ($dayOfWeek === 0) {
            $startOfWeek = clone $selectedDate;
            $endOfWeek = clone $selectedDate;
            $endOfWeek->modify('+6 days'); // Add 6 days to get to the next Saturday
        } else {
            // Find the previous Sunday and set the range from it to the next Sunday
            $startOfWeek = clone $selectedDate;
            $startOfWeek->modify('last Sunday');
            $endOfWeek = clone $startOfWeek;
            $endOfWeek->modify('+6 days'); // Add 6 days to get to the next Saturday
        }

        $startDate = $startOfWeek->format('Y-m-d');
        $endDate = $endOfWeek->format('Y-m-d');
        $startDateFormatted = date('m/d/y', strtotime($startDate));
        $endDateFormatted = date('m/d/y', strtotime($endDate));

        // Assuming $connect is your database connection
        $query = "SELECT LecturerID FROM lecturers where LectEmail = '$loggedInUserEmail'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
        $lectID = $row['LecturerID'];

        $sessionsQuery = "SELECT * FROM sessions
        join rooms on sessions.RoomID = rooms.RoomID
        join modules on sessions.ModuleID = modules.ModuleID
        WHERE LecturerID = ? AND DATE(SessionDate) BETWEEN ? AND ?";
        $sessionsStmt = $connect->prepare($sessionsQuery);

        // Initialize parameters array with types string
        $params = ['iss', $lectID, $startDate, $endDate];

        // Execute and process results
        $sessionsStmt->bind_param(...$params);
        $sessionsStmt->execute();
        $sessionsResult = $sessionsStmt->get_result();
        $sessionsStmt->close();

            

        // Populate session data
        while ($session = $sessionsResult->fetch_assoc()) {
            $sessionsData[] = [
                'SessionID' => $session['SessionID'],
                'ModuleID' => $session['ModuleID'],
                'ModuleName' => $session['ModName'],
                'RoomID' => $session['RoomID'],
                'RoomName' => $session['RoomName'],
                'StartTime' => $session['StartTime'],
                'EndTime' => $session['EndTime'],
                'SessionDate' => $session['SessionDate']
            ];
        }
?>


<div id="container" class="container container-maxwidth">
    <div class="container-timetable">
        <table class="table table-bordered ">
        <!-- Filter Form -->
        <div id="filter-form" class="filter-form">
            <form method="get" action="">
                <input type="date" name="date" onchange="this.form.submit()" value="<?php echo isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'); ?>">
            </form>
        </div>
        <span>Week: <?php echo $startDateFormatted ?> - <?php echo $endDateFormatted ?></span>
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
    <?php for ($hour = 8; $hour <= 16; $hour++): ?>
    <tr>
        <td><?php echo sprintf('%02d:00 - %02d:00', $hour, $hour + 1); ?></td>
        <?php for ($day = 1; $day <= 7; $day++): ?>
            <?php
            $slotFilled = false;
            foreach ($sessionsData as $session):
                $sessionDate = new DateTime($session['SessionDate']);
                $dayOfWeek = (int)$sessionDate->format('N');
                $startTime = new DateTime($session['StartTime']);
                $endTime = new DateTime($session['EndTime']);
                $startHour = (int)$startTime->format('G');
                $durationHours = $endTime->diff($startTime)->h;
                $durationMinutes = $endTime->diff($startTime)->i;
                $duration = $durationHours + ($durationMinutes > 0 ? 1 : 0);
                $gradientClasses = [
                    'green-gradient',
                    'blue-gradient',
                    'orange-gradient',
                    'cyan-gradient',
                    'pink-gradient',
                    'purple-gradient'
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

<?php include "../mainPages/footer.php"; ?>

</body>
</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var datePicker = document.querySelector('[name="date"]');
    datePicker.addEventListener('change', function() {
        var selectedDate = new Date(this.value);
        var day = selectedDate.getDay();

        if (day === 0) { // If the selected date is Sunday
            // Set startOfWeek to the selected Sunday
            var startOfWeek = selectedDate;
            // Set endOfWeek to the next Sunday
            var endOfWeek = new Date(selectedDate);
            endOfWeek.setDate(selectedDate.getDate() + 6); // Next Sunday

            // Updating the hidden inputs to be submitted with the form
            var startDateInput = document.querySelector('[name="startOfWeek"]');
            var endDateInput = document.querySelector('[name="endOfWeek"]');
            startDateInput.value = startOfWeek.toISOString().substring(0, 10);
            endDateInput.value = endOfWeek.toISOString().substring(0, 10);
        }

        // Form submission is handled separately below
    });
});


</script>
