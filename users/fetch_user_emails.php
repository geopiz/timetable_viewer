<?php
include "../config.php"; // Ensure this path is correct

if(isset($_GET['role'])) {
    $role = $_GET['role'];
    $query = $role === "staff" ? 
             "SELECT DISTINCT LectEmail AS useremail FROM lecturers" :
             "SELECT DISTINCT StudentEmail AS useremail FROM students";

    $result = mysqli_query($connect, $query);
    $options = "";
    while($row = mysqli_fetch_assoc($result)) {
        $email = $row['useremail'];
        $options .= "<option value='$email'>$email</option>";
    }
    echo $options;
    exit;
}
?>