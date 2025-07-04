<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  
</head>
<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    include("sidebar.php");
    ?>
 
    <!-- Main Content -->
    <div class="flex-grow-1 p-4 bg-light">
        <?php 
        echo '<h2>Welcome, '.$user.' </h2>';
      
      ?>
      <p class="text-muted">Manage hospital operations from one place.</p>

      <!-- Summary Cards -->
      <div class="row g-4 my-4">
        <div class="col-md-3">
          <div class="card text-white bg-primary">
            <div class="card-body">
              <?php
                $doctors = mysqli_query($connect, "SELECT * FROM doctor WHERE status='approved'");
                $doctorCount = mysqli_num_rows($doctors);
                 $patients = mysqli_query($connect, "SELECT * FROM patient ");
                $patientCount = mysqli_num_rows($patients);
                $reports = mysqli_query($connect, "SELECT * FROM report");
                $reportCount = mysqli_num_rows($reports);

                $in = mysqli_query($connect, "SELECT sum(amount_paid) as profit FROM income");
                $row = mysqli_fetch_assoc($in);
                $inc = $row['profit'];

              ?>
              <h5 class="card-title">Doctors</h5>
              <p class="card-text fs-4"><?php echo $doctorCount ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-success">
            <div class="card-body">
              <h5 class="card-title">Patients</h5>
              <p class="card-text fs-4"><?php echo $patientCount?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-warning">
            <div class="card-body">
              <h5 class="card-title">Total Income</h5>
              <p class="card-text fs-4"><?php echo "₹$inc" ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-danger">
            <div class="card-body">
              <h5 class="card-title">Reports</h5>
              <p class="card-text fs-4"><?php echo $reportCount ?></p>
            </div>
          </div>
        </div>
      </div>      

    </div>
  </div>

</body>
</html>
