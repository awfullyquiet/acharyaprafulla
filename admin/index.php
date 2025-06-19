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
              <h5 class="card-title">Doctors</h5>
              <p class="card-text fs-4">15</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-success">
            <div class="card-body">
              <h5 class="card-title">Patients</h5>
              <p class="card-text fs-4">120</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-warning">
            <div class="card-body">
              <h5 class="card-title">Appointments</h5>
              <p class="card-text fs-4">38</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-danger">
            <div class="card-body">
              <h5 class="card-title">Reports</h5>
              <p class="card-text fs-4">22</p>
            </div>
          </div>
        </div>
      </div>
      

      <!-- Recent Activity Table -->
      <div class="card">
        <div class="card-header">
          Recent Appointments
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John Doe</td>
                <td>Dr. Smith</td>
                <td>2025-06-04</td>
                <td><span class="badge bg-success">Confirmed</span></td>
              </tr>
              <tr>
                <td>Jane Roe</td>
                <td>Dr. Khan</td>
                <td>2025-06-05</td>
                <td><span class="badge bg-warning">Pending</span></td>
              </tr>
              <tr>
                <td>Bob Ray</td>
                <td>Dr. Lee</td>
                <td>2025-06-06</td>
                <td><span class="badge bg-danger">Cancelled</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
