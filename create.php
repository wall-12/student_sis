<?php
// create.php - Bootstrap form for adding a new student (posts to store.php)
require 'includes/header.php';
?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Add New Student</h5>
    <form action="store.php" method="post">
      <div class="mb-3">
        <label class="form-label">Student Number</label>
        <input type="text" name="student_number" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Course</label>
        <input type="text" name="course" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Year Level</label>
        <input type="number" name="year_level" class="form-control" min="1" max="10">
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
<?php require 'includes/footer.php'; ?>
