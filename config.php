<?php
// config.php - database connection (procedural mysqli)
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = ''; // default XAMPP password is empty
$DB_NAME = 'student_sis';

// Create connection
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
