<?php
// index.php - lists all students in a Bootstrap table
require_once 'includes/config.php';
require 'includes/header.php';

// Fetch students
$sql = "SELECT * FROM students ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Alert messages from query string
if (isset($_GET['msg']) && $_GET['msg'] === 'created') {
    echo '<div class="alert alert-success">Student added successfully.</div>';
}
?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Students List</h5>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Student Number</th>
          <th>Full Name</th>
          <th>Course</th>
          <th>Year</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
<?php
if ($result && mysqli_num_rows($result) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = (int)$row['id'];
        $student_no = htmlspecialchars($row['student_number']);
        $fullname = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
        $course = htmlspecialchars($row['course']);
        $year = htmlspecialchars($row['year_level']);
        echo "<tr>
                <td>{$i}</td>
                <td>{$student_no}</td>
                <td>{$fullname}</td>
                <td>{$course}</td>
                <td>{$year}</td>
                <td>
                  <a href='view.php?id={$id}' class='btn btn-sm btn-info'>View</a>
                  <a href='edit.php?id={$id}' class='btn btn-sm btn-warning'>Edit</a>
                  <a href='delete.php?id={$id}' class='btn btn-sm btn-danger'>Delete</a>
                </td>
              </tr>";
        $i++;
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>No records found.</td></tr>";
}
?>
      </tbody>
    </table>
  </div>
</div>
<?php require 'includes/footer.php'; ?>
