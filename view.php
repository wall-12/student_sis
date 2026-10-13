<?php
// view.php - displays the details of a single student (linked from index.php Actions)
require_once 'includes/config.php';
require 'includes/header.php';

$id = intval($_GET['id'] ?? 0);

$stmt = mysqli_prepare($conn, "SELECT student_number, first_name, last_name, course, year_level, created_at FROM students WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$student) {
    echo '<div class="alert alert-warning">Student not found.</div>';
    echo '<a href="index.php" class="btn btn-secondary">Back</a>';
    require 'includes/footer.php';
    exit;
}
?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Student Details</h5>
    <p><strong>Student Number:</strong> <?php echo htmlspecialchars($student['student_number']); ?></p>
    <p><strong>First Name:</strong> <?php echo htmlspecialchars($student['first_name']); ?></p>
    <p><strong>Last Name:</strong> <?php echo htmlspecialchars($student['last_name']); ?></p>
    <p><strong>Course:</strong> <?php echo htmlspecialchars($student['course']); ?></p>
    <p><strong>Year Level:</strong> <?php echo htmlspecialchars($student['year_level']); ?></p>
    <p><strong>Created At:</strong> <?php echo htmlspecialchars($student['created_at']); ?></p>
    <a href="index.php" class="btn btn-secondary">Back</a>
  </div>
</div>
<?php require 'includes/footer.php'; ?>
