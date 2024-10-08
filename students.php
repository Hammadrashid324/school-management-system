<?php
session_start();
include('db_config.php');

if ($_SESSION['role'] != 'teacher') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];

    $query = "INSERT INTO students (name, email, class) VALUES ('$name', '$email', '$class')";
    mysqli_query($conn, $query);
    echo "Student added successfully!";
}

$students = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students</title>
</head>
<body>
    <h2>Manage Students</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Student Name" required><br>
        <input type="email" name="email" placeholder="Student Email" required><br>
        <input type="text" name="class" placeholder="Class" required><br>
        <button type="submit">Add Student</button>
    </form>

    <h3>Student List</h3>
    <ul>
        <?php while($row = mysqli_fetch_assoc($students)) { ?>
            <li><?php echo $row['name'] . ' (' . $row['class'] . ')'; ?></li>
        <?php } ?>
    </ul>
</body>
</html>
