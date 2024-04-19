<?php
session_start();
// Check if user is logged in and is an admin
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] == 'admin';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>
<?php if ($isAdmin): ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <style>
            /* USER LIST TABLE */
            .user-list tbody td > img {
                position: relative;
                max-width: 50px;
                float: left;
                margin-right: 15px;
            }

            .user-list tbody td .user-link {
                display: block;
                font-size: 1.25em;
                padding-top: 3px;

            }

            .user-list tbody td .user-subhead {
                font-size: 0.875em;
                font-style: italic;
            }

            /* TABLES */
            .table {
                border-collapse: separate;
            }

            .table-hover > tbody > tr:hover > td,
            .table-hover > tbody > tr:hover > th {
                background-color: #eee;
            }

            .table thead > tr > th {
                border-bottom: 1px solid #C2C2C2;
                padding-bottom: 0;
            }

            .table tbody > tr > td {
                font-size: 0.875em;
                background: #f5f5f5;
                border-top: 10px solid #fff;
                vertical-align: middle;
                padding: 12px 8px;
            }

            .table tbody > tr > td:first-child,
            .table thead > tr > th:first-child {
                padding-left: 20px;
            }

            .table thead > tr > th span {
                border-bottom: 2px solid #C2C2C2;
                display: inline-block;
                padding: 0 5px;
                padding-bottom: 5px;
                font-weight: normal;
            }

            .table thead > tr > th > a span {
                color: #344644;
            }

            .table thead > tr > th > a span:after {
                content: "\f0dc";
                font-family: FontAwesome;
                font-style: normal;
                font-weight: normal;
                text-decoration: inherit;
                margin-left: 5px;
                font-size: 0.75em;
            }

            .table thead > tr > th > a.asc span:after {
                content: "\f0dd";
            }

            .table thead > tr > th > a.desc span:after {
                content: "\f0de";
            }

            .table thead > tr > th > a:hover span {
                text-decoration: none;
                color: #2bb6a3;
                border-color: #2bb6a3;
            }

            .table.table-hover tbody > tr > td {
                -webkit-transition: background-color 0.15s ease-in-out 0s;
                transition: background-color 0.15s ease-in-out 0s;
            }

            .table tbody tr td .call-type {
                display: block;
                font-size: 0.75em;
                text-align: center;
            }

            .table tbody tr td .first-line {
                line-height: 1.5;
                font-weight: 400;
                font-size: 1.125em;
            }

            .table tbody tr td .first-line span {
                font-size: 0.875em;
                color: #969696;
                font-weight: 300;
            }

            .table tbody tr td .second-line {
                font-size: 0.875em;
                line-height: 1.2;
            }

            .table a.table-link {
                margin: 0 5px;
                font-size: 1.125em;
            }

            .table a.table-link:hover {
                text-decoration: none;
                color: #2aa493;
            }

            .table a.table-link.danger {
                color: #fe635f;
            }

            .table a.table-link.danger:hover {
                color: #dd504c;
            }

            .table-products tbody > tr > td {
                background: none;
                border: none;
                border-bottom: 1px solid #ebebeb;
                -webkit-transition: background-color 0.15s ease-in-out 0s;
                transition: background-color 0.15s ease-in-out 0s;
                position: relative;
            }

            .table-products tbody > tr:hover > td {
                text-decoration: none;
                background-color: #f6f6f6;
            }

            .table-products .name {
                display: block;
                font-weight: 600;
                padding-bottom: 7px;
            }

            .table-products .price {
                display: block;
                text-decoration: none;
                width: 50%;
                float: left;
                font-size: 0.875em;
            }

            .table-products .price > i {
                color: #8dc859;
            }

            .table-products .warranty {
                display: block;
                text-decoration: none;
                width: 50%;
                float: left;
                font-size: 0.875em;
            }

            .table-products .warranty > i {
                color: #f1c40f;
            }

            .table tbody > tr.table-line-fb > td {
                background-color: #9daccb;
                color: #262525;
            }

            .table tbody > tr.table-line-twitter > td {
                background-color: #9fccff;
                color: #262525;
            }

            .table tbody > tr.table-line-plus > td {
                background-color: #eea59c;
                color: #262525;
            }

            .table-stats .status-social-icon {
                font-size: 1.9em;
                vertical-align: bottom;
            }

            .table-stats .table-line-fb .status-social-icon {
                color: #556484;
            }

            .table-stats .table-line-twitter .status-social-icon {
                color: #5885b8;
            }

            .table-stats .table-line-plus .status-social-icon {
                color: #a75d54;
            }

            .custom-margin-top {
                margin-top: 150px;
                margin-bottom: 500px;
            }
        </style>
        <link rel="stylesheet" href="../css/style.css">

    </head>
    <body>
    <title>Glyndwr University Showcase</title>

    <!-- Icons Library-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet"/>
    <?php include '../../timetable_viewer/mainPages/Header.php';
    $loggedInUserEmail = ucfirst($_SESSION['username']) . " <br> <span style='color: black; '>Sessions Edit Area</span> ";
    echo "<h1 style='text-align: center; padding-top:50px;'>You're logged in as: <span style='color: #5eb7b7'>$loggedInUserEmail</span></h1>";
    ?>
    <div class="container custom-margin-top">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>

                            <!-- Display the button only if the user is an admin -->

                            <form method="POST">
                                <tr>
                                    <th><input type="date" id="date" name="Date" class="form-control" required></th>
                                    <th>
                                        <select id="programme" name="Programme" class="form-control" onchange="updateModulesAndLecturers();">
                                            <option value="">Select a Programme</option>
                                            <?php
                                            include "../config.php";
                                            // Query to fetch programme names from the database
                                            $programmeQuery = "SELECT ProgName, ProgrammeID FROM programmes";
                                            $result = mysqli_query($connect, $programmeQuery);

                                            // Loop through each row and create an option for the dropdown
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $programmeName = htmlspecialchars($row['ProgName']);
                                                $programmeID = $row['ProgrammeID'];
                                                echo "<option value='$programmeID'>$programmeName</option>";
                                            }
                                            ?>

                                        </select>
                                    </th>

                                    <th>
                                        <select id="module" name="Module" class="form-control" required onchange="getModuleDuration();">
                                            <option value="">Select a Module</option>
                                            <!-- Options will be populated by AJAX -->
                                        </select>
                                    </th>

                                    <th>
                                        <select id="lecturer" name="Lecturer" class="form-control" required>
                                            <option value="">Select a Lecturer</option>
                                            <!-- Options will be populated by AJAX -->
                                        </select>
                                    </th>
                                    <th>
                                        <select id="room" name="Room" class="form-control" required>
                                            <option value="">Select a Room</option>
                                            <!-- Options will be populated by AJAX -->
                                        </select>
                                    </th>


                                    <th>
                                        <select id="starttime" name="Startime" class="form-control" required onchange="calculateEndTime();">
                                            <option value="">Select Start Time</option>
                                            <?php
                                            include "../config.php";
                                            // Query to fetch programme names from the database
                                            $starttimeQuery = "SELECT DISTINCT hourtime FROM hourtimes";
                                            $result = mysqli_query($connect, $starttimeQuery);

                                            // Loop through each row and create an option for the dropdown
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $starttime = $row['hourtime'];
                                                echo "<option value='$starttime'>$starttime</option>";
                                            }
                                            ?>

                                        </select>
                                    </th>

                                    <th>
                                        <select id="endtime" name="Endtime" class="form-control" required>
                                            <option value="">Select End Time</option> <!-- Default option that prompts user to select an end time -->
                                        </select>
                                    </th>


                                    <th>
                                        <button type="submit" class="btn btn-primary btn-lg" name="createSession"> Create New Session</button>
                                    </th>
                                </tr>
                            </form>


                            <?php
                            if (isset($_POST['createSession'])) {
                                // Handle form submission to add new session
                                $DATE = $_POST["Date"];
                                $ProgrammeID = $_POST["Programme"];
                                $ModuleID = $_POST["Module"];
                                $LecturerID = $_POST["Lecturer"];
                                $RoomID = $_POST["Room"];
                                $Startime = $_POST["Startime"];
                                $Endtime = $_POST["Endtime"];
                                include "../config.php";

                                // Prepare your insert query
                                $insertQuery = "INSERT INTO sessions (ProgrammeID, ModuleID, LecturerID,RoomID, StartTime, EndTime, SessionDate) VALUES (?, ?, ?, ?, ?, ?, ?)";
                                $insertStmt = $connect->prepare($insertQuery);
                                $insertStmt->bind_param("iiiisss", $ProgrammeID, $ModuleID, $LecturerID, $RoomID, $Startime, $Endtime, $DATE);
                                if ($insertStmt->execute()) {
                                    echo "<script>alert('Session added successfully!'); window.location.href = 'sessions.php';</script>";
                                } else {
                                    die("Error inserting new session: " . $insertStmt->error);
                                }

                                // Close your statement
                                $insertStmt->close();

                                // Optionally, close your database connection if you're done with it
                                $connect->close();
                            }
                            ?>
                            <tr>
                                <th><span>Date</span></th>
                                <th><span>Programme</span></th>
                                <th class="text-center"><span>Module</span></th>
                                <th><span>Lecturer</span></th>
                                <th><span>Room</span></th>
                                <th><span>Start Time</span></th>
                                <th><span>End Time</span></th>
                                <th><span>Delete Session</span></th>
                            </tr>
                            </thead>

                            <form action="session.php" method="POST">

                            </form>

                            <?php /* Staff Table   */
                            include "../config.php";

                            $query = "SELECT sessions.*, modules.ModName, rooms.RoomName, lecturers.LectName, programmes.ProgName
                        FROM sessions
                        JOIN rooms ON sessions.roomID = rooms.RoomID
                        JOIN programmes ON sessions.ProgrammeID = programmes.ProgrammeID
                        JOIN modules ON sessions.ModuleID = modules.ModuleID
                        JOIN lecturers ON sessions.LecturerID = lecturers.LecturerID
                        ORDER BY SessionDate DESC, StartTime ASC";
                            $db_sessionInfo = mysqli_query($connect, $query);
                            $db_session = mysqli_fetch_assoc($db_sessionInfo);


                            echo "<tbody>";


                            foreach ($db_sessionInfo as $db_session) {
                                $date = $db_session['SessionDate'];
                                $programme = $db_session['ProgName'];
                                $module = $db_session['ModName'];
                                $lecturer = $db_session['LectName'];
                                $room = $db_session['RoomName'];
                                $starttime = $db_session['StartTime'];
                                $endtime = $db_session['EndTime'];
                                $date = $db_session['SessionDate'];


                                echo "<tr>";

                                echo "<td>";
                                echo "<span>$date</span>";

                                echo "</td>";

                                echo "<td class='text-center'>";
                                echo "<span class='label label-default'>$programme</span>";
                                echo "</td>";

                                echo "<td>";
                                echo "<span>$module</span>";
                                echo "</td>";
                                echo "<td>";
                                echo "<span>$lecturer</span>";
                                echo "</td>";
                                echo "<td>";
                                echo "<span>$room</span>";
                                echo "</td>";
                                echo "<td>";
                                echo "<span>$starttime</span>";
                                echo "</td>";
                                echo "<td>";
                                echo "<span>$endtime</span>";
                                echo "</td>";


                                echo '<td style="width: 20%;">';
                                echo '<form action="deletesession.php" method="POST" style="display:inline;">';
                                echo '<input type="hidden" name="SessionID" value="' . $db_session['SessionID'] . '"/>';
                                echo '<button type="submit" class="table-link danger" style="border: none; background: none; padding: 0;" onclick="return confirmDelete()">';
                                echo '<a href="#" class="table-link danger">';
                                echo '<span class="fa-stack">';
                                echo '<i class="fa fa-square fa-stack-2x"></i>';
                                echo '<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>';
                                echo '</span>';
                                echo '</a>';
                                echo '</button>';
                                echo '</form>';

                                echo '</td>';
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            ?>
                            <script>
                                function confirmDelete() {
                                    if (confirm("Are you sure you want to delete this user?")) {
                                        // User confirmed, allow form submission
                                        return true;
                                    } else {
                                        // User canceled, prevent form submission
                                        return false;
                                    }
                                }
                            </script>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#programme').change(updateModulesAndLecturers);
            $('#module').change(function () {
                updateRooms();
                getModuleDuration();
            });
            $('#starttime').change(calculateEndTime);
        });


        function updateModulesAndLecturers() {
            var programmeName = $('#programme').val();

            // AJAX request for Modules
            $.ajax({
                url: 'getmodules.php',
                type: 'POST',
                data: {programme: programmeName},
                success: function (data) {
                    $('#module').html(data);
                    // Now update lecturers after modules have been updated
                    updateLecturers(programmeName);
                    $('#module').data('duration', ''); // Clear any previously set duration

                    // After updating modules, trigger change event on the module dropdown to automatically select the end time
                    $('#module').trigger('change');
                },
                error: function () {
                    alert('Error fetching modules.');
                }
            });

            // Initially clear lecturers and rooms dropdowns
            $('#lecturer').html('<option selected="selected" disabled>Select Lecturer</option>');
            $('#room').html('<option selected="selected" disabled>Select Room</option>');
        }

        function updateLecturers(programmeName) {
            // If programmeName is not provided, fetch it from the programme dropdown
            if (!programmeName) {
                programmeName = $('#programme').val();
            }

            // AJAX request for Lecturers
            $.ajax({
                url: 'getlecturers.php',
                type: 'POST',
                data: {programme: programmeName},
                success: function (data) {
                    $('#lecturer').html(data);
                },
                error: function () {
                    alert('Error fetching lecturers.');
                }
            });
        }

        function updateRooms() {
            var moduleName = $('#module').val();

            // AJAX request for Rooms
            $.ajax({
                url: 'getrooms.php',
                type: 'POST',
                data: {module: moduleName},
                success: function (data) {
                    $('#room').html(data);
                },
                error: function () {
                    alert('Error fetching rooms.');
                }
            });
        }

        function getModuleDuration() {
            var moduleId = $('#module').val();  // This gets the value of the selected option, which should be the ModuleID

            console.log("Sending Module ID:", moduleId); // Debugging to see what's being sent

            $.ajax({
                url: 'getmoduleduration.php',
                type: 'POST',
                data: {moduleId: moduleId},
                dataType: 'json',
                success: function (response) {
                    if (response.duration) {
                        $('#module').data('duration', response.duration);
                        calculateEndTime();  // Recalculate end time when duration is received
                    } else {
                        console.error("No duration found for the module:", response);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Failed to fetch module duration:", status, error);
                }
            });
        }


        function calculateEndTime() {
            var startTime = $('#starttime').val();
            var duration = $('#module').data('duration');
            if (!startTime || !duration) {
                return; // Do not proceed if the start time or duration is not set
            }

            // Parse the start time and add the duration
            var startTimeParts = startTime.split(':');
            var startTimeDate = new Date();
            startTimeDate.setHours(parseInt(startTimeParts[0]), parseInt(startTimeParts[1]), 0);

            // Adding duration in hours
            startTimeDate.setHours(startTimeDate.getHours() + parseInt(duration));

            // Formatting the end time to HH:mm format
            var endHour = startTimeDate.getHours();
            var endMinutes = startTimeDate.getMinutes();
            var formattedEndTime = ('0' + endHour).slice(-2) + ':' + ('0' + endMinutes).slice(-2);

            $('#endtime').empty(); // Clear previous options
            $('#endtime').append($('<option>', {
                value: formattedEndTime,
                text: formattedEndTime
            }));
            $('#endtime').val(formattedEndTime); // Automatically select the calculated end time
        }


    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <?php include '../../timetable_viewer/mainPages/footer.php'; ?>
    </body>
    </html>
<?php endif; ?>