<?php
session_start();
if ($_SESSION['role'] != 'teacher') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
</head>
<body>
    <h1>Welcome, Teacher</h1>
    <nav>
        <a href="students.php">Manage Students</a>
        <a href="classes.php">Manage Classes</a>
        <a href="attendance.php">Manage Attendance</a>
        <a href="grades.php">Manage Grades</a>
        <a href="report.php">Generate Reports</a>
    </nav>
</body>
</html>
