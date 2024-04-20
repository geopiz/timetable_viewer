<?php
session_start();
include './mainPages/logincheck.php';
checkUserLoggedIn();

$loggedInUserEmail = $_SESSION['username'];
$sessionsData = [];
$isStudent = isset($_SESSION['role']) && $_SESSION['role'] == 'member';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
if (isset($loggedInUserEmail) && strtolower($loggedInUserEmail) == "admin") {
    header('Location: sessions/sessions.php');
    exit; 
} else 
if($isStudent){ 
        header("Location: ../students/studenttimetable.php");
   }   else {
            header("Location: ../staff/stafftimetable.php");
        }
?>