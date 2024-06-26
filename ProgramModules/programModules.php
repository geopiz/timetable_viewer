<?php
session_start();
include "config.php";
$selectedProgram = isset($_POST['ProgName']) ? $_POST['ProgName'] : 'All';
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
<form action="" method="POST">
    <div class="form-group">
        <label for="programSelect">Select Program:</label>
        <select class="form-control" id="programSelect" name="ProgName" onchange="this.form.submit()">
            <option value="All" <?php echo ($selectedProgram == 'All') ? 'selected' : ''; ?>>All</option>
            <?php
            $sql = "SELECT ProgName FROM programmes";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $isSelected = ($row['ProgName'] == $selectedProgram) ? 'selected' : '';
                echo "<option value='" . htmlspecialchars($row['ProgName']) . "' $isSelected>" . htmlspecialchars($row['ProgName']) . "</option>";
            }
            ?>
        </select>
    </div>
</form>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
            <div class="table-responsive">
                <?php
                if ($selectedProgram == 'All') {
                    // Headers for the program information
                    echo "<table class='table user-list'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Programme Name</th>";
                    echo "<th>Department</th>";
                    echo "<th>Programme Description</th>";
                    echo "<th>Programme Duration</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    $sql = "SELECT programmes.ProgName, departments.DepName, programmes.ProgDescription, programmes.ProgDuration FROM programmes JOIN departments ON programmes.DepartmentID = departments.DepartmentID";
                    $result = mysqli_query($connect, $sql);

                    while ($program = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$program['ProgName']}</td>";
                        echo "<td>{$program['DepName']}</td>";
                        echo "<td>{$program['ProgDescription']}</td>";
                        echo "<td>{$program['ProgDuration']}</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    // Headers for the modules
                    echo "<table class='table user-list'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Module Name</th>";
                    echo "<th>Semester</th>";
                    echo "<th>Module Description</th>";
                    echo "<th>Module Duration</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    $stmt = $connect->prepare("SELECT ModName, ModSemester, ModDescription, ModDuration FROM modules JOIN programmes ON modules.ProgrammeID = programmes.ProgrammeID WHERE ProgName = ?");
                    $stmt->bind_param("s", $selectedProgram);
                    $stmt->execute();
                    $modulesResult = $stmt->get_result();

                    while ($module = $modulesResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$module['ModName']}</td>";
                        echo "<td>{$module['ModSemester']}</td>";
                        echo "<td>{$module['ModDescription']}</td>";
                        echo "<td>{$module['ModDuration']}</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    $stmt->close();
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include '../../timetable_viewer/mainPages/footer.php'; ?>
</body>
</html>