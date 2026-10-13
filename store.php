<?php
// store.php - receives POST from create.php, validates on the server, inserts into DB
require_once 'includes/config.php';

// Basic validation and sanitization
$student_number = trim($_POST['student_number'] ?? '');
$first_name = trim($_POST['first_name'] ?? '');
$last_name = trim($_POST['last_name'] ?? '');
$course = trim($_POST['course'] ?? '');
$year_level = intval($_POST['year_level'] ?? 0);

// Simple server-side validation
$errors = [];
if ($student_number === '') $errors[] = 'Student number is required.';
if ($first_name === '') $errors[] = 'First name is required.';
if ($last_name === '') $errors[] = 'Last name is required.';

if (!empty($errors)) {
    // For learning, simple echo; later improve UX
    foreach ($errors as $err) {
        echo '<div class="alert alert-danger">' . $err . '</div>';
    }
    echo '<a href="create.php">Go back</a>';
    exit;
}

// Use prepared statements to reduce SQL injection risk
$stmt = mysqli_prepare($conn, "INSERT INTO students (student_number, first_name, last_name, course, year_level) VALUES (?, ?, ?, ?, ?)");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssi", $student_number, $first_name, $last_name, $course, $year_level);
    $exec = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($exec) {
        header("Location: index.php?msg=created");
        exit;
    } else {
        die("Insert failed: " . mysqli_error($conn));
    }
} else {
    die("Prepare failed: " . mysqli_error($conn));
}
?>
