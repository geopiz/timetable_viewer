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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="\timetable_viewer\css\style.css" rel="stylesheet">
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
</head>
<body>
<title>Glyndwr University Showcase</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="/assets/favicon.ico"/>
<!-- Core theme CSS (includes Bootstrap)-->
<link rel="stylesheet" href="../css/style.css">

<?php include '../../timetable_viewer/mainPages/Header.php'; ?>

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
                                <th><input type="text" id="name" name="fullName" class="form-control"
                                           placeholder="Full Name" required></th>
                                <th>
                                    <?php
                                    include "config.php";
                                    ?>
                                    <select id="department" name="Department" class="form-control"
                                            onchange="updateProgramme();">
                                        <option value="">Select a Department</option>
                                        <?php
                                        $departmentQuery = "SELECT DepName FROM departments";
                                        $result = mysqli_query($connect, $departmentQuery);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $departmentName = htmlspecialchars($row['DepName']);
                                            echo "<option value='$departmentName'>$departmentName</option>";
                                        }
                                        ?>
                                    </select>

                                </th>
                                <th>
                                    <select id="programme" name="programmeName" class="form-control">
                                        <option value="">Select a Programme</option>
                                    </select>

                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    <script>
                                        function updateProgramme() {
                                            var departmentName = $('#department').val();

                                            $.ajax({
                                                url: 'fetch_programmes.php', // Point to the new dedicated PHP script
                                                type: 'POST',
                                                data: {department: departmentName},
                                                success: function (response) {
                                                    $('#programme').html(response); // Update the students dropdown
                                                },
                                                error: function () {
                                                    alert('Error fetching students.');
                                                }
                                            });
                                        }
                                    </script>


                                </th>
                                <th><input type="email" id="email" name="E-mail" class="form-control"
                                           placeholder="E-mail"></th>
                                <th><input type="number" id="phone" name="semester" class="form-control"
                                           placeholder="Semester" max="6"></th>
                                <th>
                                    <button type="submit" class="btn btn-primary btn-lg" name="addNewUser">Add New
                                        Student
                                    </button>
                                </th>
                            </tr>
                        </form>


                        <?php
                            if (isset($_POST['addNewUser'])) {
                                // Handle form submission to add new user
                                $fullName = $_POST["fullName"];
                                $Department = $_POST["Department"];
                                $programme = $_POST["programmeName"];
                                $Email = $_POST["E-mail"];
                                $semester = $_POST["semester"];
                                include "config.php";

                                // Fetch department ID
                                $queryDptID = "Select DepartmentID from departments WHERE depName = '$Department' ";
                                $db_resultDptID = mysqli_query($connect, $queryDptID);
                                $db_dpID = mysqli_fetch_assoc($db_resultDptID);
                                $departmentID = $db_dpID['DepartmentID'];

                                // Fetch programme ID
                                $queryProgID = "Select ProgrammeID from programmes WHERE ProgName = '$programme' ";
                                $db_resultProgID = mysqli_query($connect, $queryProgID);
                                $db_progID = mysqli_fetch_assoc($db_resultProgID);
                                $programmeID = $db_progID['ProgrammeID'];

                                // Check for email uniqueness
                                $emailCheckQuery = "SELECT StudentEmail FROM students WHERE StudentEmail = ? UNION SELECT LectEmail FROM lecturers WHERE LectEmail = ?";
                                $stmt = $connect->prepare($emailCheckQuery);
                                $stmt->bind_param("ss", $Email, $Email);
                                $stmt->execute();
                                $stmt->store_result();

                                if ($stmt->num_rows == 0) {
                                    // Email is unique, proceed with inserting the new student
                                    $newUserQuery = "INSERT INTO students (StudentName, StudentEmail, ProgrammeID, StudentSemester) VALUES (?, ?, ?, ?)";
                                    $newUserStmt = $connect->prepare($newUserQuery);
                                    $newUserStmt->bind_param("ssii", $fullName, $Email, $programmeID, $semester);
                                    $created = $newUserStmt->execute();

                                    if ($created) {
                                        echo "<script>alert('Student added successfully!');</script>";
                                        echo "<script>window.location.href = 'student.php';</script>";
                                    } else {
                                        echo "<script>alert('Error: could not execute the query.');</script>";
                                    }

                                    $newUserStmt->close();
                                } else {
                                    echo "<script>alert('This email is already in use. Please use another email.');</script>";
                                }

                                $stmt->close();
                            }
                            ?>


                        <tr>
                            <th><span>Student Name</span></th>

                            <th><span>Department</span></th>
                            <th><span>Programme</span></th>
                            <th class="text-center"><span>E-mail</span></th>
                            <th><span>Semester</span></th>
                            <th><span>Delete User</span></th>
                        </tr>
                        </thead>

                        <form action="student.php" method="POST">
                        </form>

                        <?php /* Staff Table   */
                        include "config.php";

                        // Pagination Variables
                        $results_per_page = 40;
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }
                        $start_from = ($page - 1) * $results_per_page;

                        $query = "SELECT * FROM students JOIN programmes ON students.ProgrammeID = programmes.ProgrammeID JOIN departments ON programmes.DepartmentID = departments.DepartmentID ORDER BY StudentID DESC LIMIT $start_from, $results_per_page";
                        $db_studentInfo = mysqli_query($connect, $query);
                        $db_student = mysqli_fetch_assoc($db_studentInfo);

                        echo "<tbody>";

                        foreach ($db_studentInfo as $db_student) {
                            $studentName = $db_student['StudentName'];
                            $studentEmail = $db_student['StudentEmail'];
                            $studentDepartment = $db_student['DepName'];
                            $studentProgram = $db_student['ProgName'];
                            $studentSemester = $db_student['StudentSemester'];

                            echo "<tr>";

                            echo "<td>";

                            echo "<span class='user-link'>$studentName</span>";

                            echo "</td>";


                            echo "<td class='text-center'>";
                            echo "<span class='label label-default'>$studentDepartment</span>";
                            echo "</td>";
                            echo "<td class='text-center'>";
                            echo "<span class='label label-default'>$studentProgram</span>";
                            echo "</td>";

                            echo "<td>";
                            echo "<a href='mailto:$studentEmail'>$studentEmail</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<span>$studentSemester</span>";
                            echo "</td>";


                            echo '<td style="width: 20%;">';
                            echo '<form action="deletestudent.php" method="POST" style="display:inline;">';
                            echo '<input type="hidden" name="StudentID" value="' . $db_student['StudentID'] . '"/>';
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

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php
                        $sql = "SELECT COUNT(*) AS total FROM students";
                        $result = mysqli_query($connect, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total_pages = ceil($row["total"] / $results_per_page);

                        if ($page > 1) {
                            echo "<li class='page-item'><a class='page-link' href='student.php?page=1'>&laquo; First</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='student.php?page=" . ($page - 1) . "'>&lsaquo; Previous</a></li>";
                        }
                        echo "<li class='page-item'><a class='page-link' href='student.php?page=$page'>$page</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='student.php?page=$total_pages'>$total_pages</a></li>";
                        if ($page < $total_pages) {
                            echo "<li class='page-item'><a class='page-link' href='student.php?page=" . ($page + 1) . "'>Next &rsaquo;</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='student.php?page=$total_pages'>Last &raquo;</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
                <!-- End Pagination -->

            </div>
        </div>
    </div>
</div>




<?php include '../../timetable_viewer/mainPages/footer.php'; ?>


</body>
</html>
<?php endif; ?>