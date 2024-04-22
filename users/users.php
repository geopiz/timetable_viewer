<?php
session_start();
include '../mainPages/logincheck.php';
checkUserLoggedIn();
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
        <link rel="stylesheet" type="text/css" href="../css/style.css">

    </head>
    <body>
    <title>Glyndwr University Timetable</title>
    <!-- Icons Library-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <?php include '../../timetable_viewer/mainPages/Header.php';
    $loggedInUserEmail = ucfirst($_SESSION['username']) . " <br> <span style='color: black; '>Create User Account</span> ";
    echo "<h1 style='text-align: center; padding-top:50px;'>You're logged in as: <span style='color: #5eb7b7'>$loggedInUserEmail</span></h1>";
    ?>
    <div class="container-custom custom-margin-top">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>

                            <!-- Display the button only if the user is an admin -->

                            <form method="POST">
                                <tr>
                                    <th>
                                    <select id="role" name="role" class="form-control">
                                    <?php
                                    $userroles = ["staff", "member"]; // Array containing the options
                                    foreach ($userroles as $role) {
                                        echo "<option value='$role'>$role</option>"; // Generating option elements dynamically
                                    }
                                    ?>
                                    </select>
                                    </th>

                                <th>
                                <select id="username" name="username" class="form-control">
                                    <?php
                                    include "../config.php";
                                    // Initial query, assuming staff is selected by default
                                    $userTypeQuery = "SELECT DISTINCT LectEmail as useremail FROM lecturers";
                                    $result = mysqli_query($connect, $userTypeQuery);

                                    // Loop through each row and create an option for the dropdown
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $userEmail = $row['useremail'];
                                        echo "<option value='$userEmail'>$userEmail</option>";
                                    }
                                    ?>
                                </select>
                                </th>
                                
                                    <th><input type="password" name="password" class="form-control"
                                               placeholder="Enter Password"></th>
                                    <th>
                                        <button type="submit" class="btn btn-primary btn-lg" name="addNewUser"> Add New User Account
                                        </button>
                                    </th>
                                </tr>
                            </form>

                            <?php
                           
                           if (isset($_POST['addNewUser'])) {
                            $useremail = $_POST["username"];
                            $userRole = $_POST["role"];
                            $userPassword = $_POST["password"];
                            include "../config.php";
                        
                            // Check if the email already exists in the users table
                            $checkEmailQuery = "SELECT COUNT(*) as cnt FROM users WHERE UserName = ?";
                            $stmt = $connect->prepare($checkEmailQuery);
                            $stmt->bind_param("s", $useremail);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();
                        
                            if($row['cnt'] > 0) {
                                // Email already exists
                                echo "<script>alert('User account already exists!');</script>";
                            } else {
                                // Email does not exist, proceed with insertion
                                mysqli_begin_transaction($connect);
                                $newUserQuery = "INSERT INTO users (UserName, Role, Password) VALUES (?, ?, ?)";
                                $stmt = $connect->prepare($newUserQuery);
                                $stmt->bind_param("sss", $useremail, $userRole, $userPassword);
                                $stmt->execute();
                        
                                if(!$stmt) {
                                    // Handle error - insert failed
                                    mysqli_rollback($connect);
                                    echo "<script>alert('Failed to add user account.');</script>";
                                } else {
                                    // If everything is fine, commit the transaction
                                    mysqli_commit($connect);
                                    echo "<script>alert('User account added successfully!');</script>";
                                }
                            }
                            echo "<script>window.location.href = 'users.php';</script>";
                        }
                           ?>

                            <tr>
                                <th><span>Role</span></th>

                                <th><span>Username</span></th>
                                <th><span>Password</span></th>
                                <th><span>Delete User</span></th>
                            </tr>
                            </thead>

                            <form action="users.php" method="POST">

                            </form>

                            <?php /* Staff Table   */
                            include "../config.php";

                            $query = "SELECT * FROM users where Role !='admin'";
                            $db_userInfo = mysqli_query($connect, $query);
                            $db_user = mysqli_fetch_assoc($db_userInfo);


                            echo "<tbody>";


                            foreach ($db_userInfo as $db_user) {
                                $userName = $db_user['UserName'];
                                $userRole = $db_user['Role'];
                                $userPass = $db_user['Password'];
                                $StudentImage = "https://icons.getbootstrap.com/icons/person/#";
                                //Staff img


                                echo "<tr>";

                                echo "<td>";

                                echo "<a href='#' class='user-link'>$userRole</a>";

                                echo "</td>";

                                echo "<td class='text-center'>";
                                echo "<span class='label label-default'>$userName</span>";
                                echo "</td>";

                                echo "<td>";
                                echo "<span>$userPass</span>";
                                echo "</td>";


                                echo '<td style="width: 20%;">';
                                echo '<form action="deleteusers.php" method="POST" style="display:inline;">';
                                echo '<input type="hidden" name="UserID" value="' . $db_user['UserID'] . '"/>';
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
<?php endif; ?>

<script>
document.getElementById("role").addEventListener("change", function() {
    var role = this.value;
    // Fetch data using AJAX and update the options of the second select element
    fetchUserEmails(role);
});

function fetchUserEmails(role) {
    fetch("fetch_user_emails.php?role=" + encodeURIComponent(role))
        .then(response => response.text())
        .then(data => {
            // Update the options of the second select element
            document.getElementById("username").innerHTML = data;
        });
}
</script>