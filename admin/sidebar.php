
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
  <?php
  include("../include/connection.php");
  ?>
     <!-- Sidebar & Main Content Wrapper -->
  <div class="d-flex" style="min-height: 100vh">
    <!-- Sidebar -->
    <div class="bg-primary text-white p-3" style="width: 250px;">
      <?php
      $job = mysqli_query($connect, "SELECT * FROM doctor WHERE status = 'pending'");
      $num1 = mysqli_num_rows($job);
      ?>
      <h4 class="mb-4">Admin Panel</h4>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="index.php" class="nav-link text-white">Dashboard</a></li>
        <li class="nav-item"><a href="doctors.php" class="nav-link text-white">Doctors</a></li>
        <li class="nav-item"><a href="patients.php" class="nav-link text-white">Patients</a></li>
        <!-- <li class="nav-item"><a href="appointments.php" class="nav-link text-white">Appointments</a></li> -->
        <li class="nav-item"><a href="reports.php" class="nav-link text-white">Reports</a></li>
        <li class="nav-item"><a href="admin.php" class="nav-link text-white">Administrators</a></li>
        <li class="nav-item"><a href="job_request.php" class="nav-link text-white"> Job Request <span class="badge badge-light bg-light text-dark"><?php echo $num1 ?></span></a></li>
      </ul>
    </div>

</body>
</html>