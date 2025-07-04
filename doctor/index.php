<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Doctor Dashboard | Acharya Prafulla Chandra Roy Hospital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

  <?php
  include ("../include/header.php");
  include ("sidebar.php"); 
  include ("../include/connection.php");
  ?>
 

    <!-- Main Content -->
    <div class="flex-grow-1 p-4 bg-light">
      <h2>Welcome, Dr. <?php echo $_SESSION['doctor']  ?></h2>
      <p class="text-muted">Here’s your quick overview today.</p>

      <!-- Stats Cards -->
      <div class="row g-4 my-4">
        <div class="col-md-4">
          <div class="card text-white bg-success">
            <div class="card-body">
              <?php 
              $app = mysqli_query($connect, "SELECT * FROM appointment WHERE status = 'pending'");
              $totalAppointments = mysqli_num_rows($app); 
              ?>
              <h5 class="card-title"> Appointments</h5>
              <p class="card-text fs-4"><?php echo $totalAppointments ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-white bg-info">
            <div class="card-body">
              <h5 class="card-title">New Patients</h5>
              <p class="card-text fs-4">3</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-white bg-warning">
            <div class="card-body">
              <h5 class="card-title">Pending Prescriptions</h5>
              <p class="card-text fs-4">4</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Upcoming Appointments Table -->
      <div class="card">
        <div class="card-header">Upcoming Appointments</div>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Alice Johnson</td>
                <td>2025-06-20</td>
                <td>10:00 AM</td>
                <td>Fever & cough</td>
                <td><span class="badge bg-success">Confirmed</span></td>
              </tr>
              <tr>
                <td>Ravi Mehta</td>
                <td>2025-06-20</td>
                <td>11:30 AM</td>
                <td>Follow-up</td>
                <td><span class="badge bg-warning">Pending</span></td>
              </tr>
              <tr>
                <td>Sunita Das</td>
                <td>2025-06-20</td>
                <td>2:00 PM</td>
                <td>Blood Pressure</td>
                <td><span class="badge bg-secondary">Rescheduled</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Message Section -->
      <!-- <div class="card mt-4">
        <div class="card-header">Recent Messages</div>
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item">Message from Admin: “Please update your profile.”</li>
            <li class="list-group-item">Message from Patient: “Need clarification on dosage.”</li>
            <li class="list-group-item">System Alert: “Upcoming meeting at 5 PM today.”</li>
          </ul>
        </div>
      </div> -->

    </div>
  </div>

</body>
</html>
