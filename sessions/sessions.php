<?php
session_start();
?>
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<title>Glyndwr University Showcase</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="/assets/favicon.ico"/>
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/GlyndwrBlog/css/styles.css" rel="stylesheet"/>
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
                                        <select id="programme" name="Programme" class="form-control">
                                            <?php
                                            include "config.php";
                                            // Query to fetch programme names from the database
                                            $programmeQuery = "SELECT ProgName FROM programmes";
                                            $result = mysqli_query($connect, $programmeQuery);

                                            // Loop through each row and create an option for the dropdown
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $programmeName = $row['ProgName'];
                                                echo "<option value='$programmeName'>$programmeName</option>";
                                            }
                                            ?>

                                        </select>
                                    </th>
                                    <th><input type="email" id="email" name="E-mail" class="form-control"
                                               placeholder="E-mail"></th>
                                    <th><input type="tel" id="phone" name="phone" class="form-control"
                                               placeholder="Phone"></th>
                                    <th>
                                        <button type="submit" class="btn btn-primary btn-lg" name="addNewUser">Add New
                                            User
                                        </button>
                                    </th>
                                </tr>
                            </form>



                        <?php
                        if (isset($_POST['addNewUser'])) {
                            // Handle form submission to add new user
                            $fullName = $_POST["fullName"];
                            $Programme = $_POST["Programme"];
                            $Email = $_POST["E-mail"];
                            $phone = $_POST["phone"];
                            include "config.php";

                            // Get ProgrammeID
                            $queryDptID = "SELECT ProgrammeID FROM programmes WHERE ProgName = ?";
                            $stmtDptID = $connect->prepare($queryDptID);
                            $stmtDptID->bind_param("s", $Programme);
                            $stmtDptID->execute();
                            $resultDptID = $stmtDptID->get_result();
                            $db_dpID = $resultDptID->fetch_assoc();
                            $programmeID = $db_dpID['ProgrammeID'];
                            $stmtDptID->close();

                            // Check for email uniqueness
                            $emailCheckQuery = "SELECT StudentEmail FROM students WHERE StudentEmail = ? UNION SELECT LectEmail FROM lecturers WHERE LectEmail = ?";
                            $stmt = $connect->prepare($emailCheckQuery);
                            $stmt->bind_param("ss", $Email, $Email);
                            $stmt->execute();
                            $stmt->store_result();

                            if ($stmt->num_rows == 0) {
                                // Email is unique, proceed to insert
                                $insertQuery = "INSERT INTO lecturers (LectName, ProgrammeID, LectEmail, LectPhone) VALUES (?, ?, ?, ?)";
                                $insertStmt = $connect->prepare($insertQuery);
                                $insertStmt->bind_param("siss", $fullName, $programmeID, $Email, $phone);
                                $success = $insertStmt->execute();
                                
                                if ($success) {
                                    echo "<script>alert('User added successfully!');</script>";
                                    echo "<script>window.location.href = 'staff.php';</script>";
                                } else {
                                    die("Error inserting new user: " . $connect->error);
                                }
                                $insertStmt->close();
                            } else {
                                // Email is not unique, alert the user
                                echo "<script>alert('This email is already in use. Please use another email.');</script>";
                            }
                            $stmt->close();
                        }
                        ?>






                        <tr>
                            <th><span>Staff Name</span></th>
                            <th><span>Programme</span></th>
                            <th class="text-center"><span>E-mail</span></th>
                            <th><span>Phone</span></th>
                            <th><span>Delete User</span></th>
                        </tr>
                        </thead>

                        <form action="staff.php" method="POST">

                        </form>

                        <?php  /* Staff Table   */
                        include "config.php";

                        $query = "SELECT * FROM lecturers JOIN programmes ON lecturers.ProgrammeID = programmes.ProgrammeID";
                        $db_staffInfo = mysqli_query($connect, $query);
                        $db_staff = mysqli_fetch_assoc($db_staffInfo);


                        echo "<tbody>";


                        foreach ($db_staffInfo as $db_staff) {
                            $lectName = $db_staff['LectName'];
                            $lectProgramme = $db_staff['ProgName'];
                            $lectEmail = $db_staff['LectEmail'];
                            $lectPhone = $db_staff['LectPhone'];
                            $StudentImage = "https://icons.getbootstrap.com/icons/person/#";
                            //Staff img


                            echo "<tr>";

                            echo "<td>";
                            echo "<a href='#' class='user-link'>$lectName</a>";

                            echo "</td>";

                            echo "<td class='text-center'>";
                            echo "<span class='label label-default'>$lectProgramme</span>";
                            echo "</td>";

                            echo "<td>";
                            echo "<a href='#'>$lectEmail</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href='#'>$lectPhone</a>";
                            echo "</td>";


                                echo '<td style="width: 20%;">';
                                echo '<form action="deletestaff.php" method="POST" style="display:inline;">';
                                echo '<input type="hidden" name="LecturerID" value="' . $db_staff['LecturerID'] . '"/>';
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
<?php include '../../timetable_viewer/mainPages/footer.php'; ?>
</body>
</html>