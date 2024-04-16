<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags, title, etc. -->
    
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Student Timetable</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/main.php">Home</a>
                </li>
                
                <!-- Dropdown Menu for Admin -->
                
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
        Admin
    </a>
    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
        <li><a class="dropdown-item" href="/staff/staff.php">Staff Panel</a></li>
        <li><a class="dropdown-item" href="/students/student.php">Student Panel</a></li>
        <li><a class="dropdown-item" href="/rooms/rooms.php">Room Panel</a></li>
        <li><a class="dropdown-item" href="/ProgramModules/programModules.php">Programme Panel</a></li>
        <li><a class="dropdown-item" href="/path_to_create_session">Create Session</a></li>
    </ul>
</li>

</ul>
</div>
</div>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>