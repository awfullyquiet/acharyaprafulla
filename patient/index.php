<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php
include ("../include/header.php");
include ("sidebar.php");
include ("../include/connection.php");
?>
<div class="container-fluid ">
    <div class="col-md-12">
        <div class="row">
            
            <div class="col-md-10">
                <!-- center ko part -->
                <div class="row g-4 my-4">
                  <div class="col-md-4">
                    <div class="card bg-info text-white">
                      <div class="card-body">
                        <?php
                        $pat = $_SESSION['patient'];
                        $res = mysqli_query($connect, "SELECT COUNT(*) as total FROM appointment WHERE name='$pat' AND status='approved'");
                        $row = mysqli_fetch_assoc($res);
                        $totalAppointments = $row['total'];
                        ?>
                        <h5 class="card-title">Upcoming Appointments</h5>
                        <p class="card-text fs-4"><?php echo $totalAppointments ?></p>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-md-4">
                    <div class="card bg-success text-white">
                      <div class="card-body">
                        <h5 class="card-title">Active Prescriptions</h5>
                        <p class="card-text fs-4">4</p>
                      </div>
                    </div>
                  </div> -->
                  
                  
                </div>
      
      


      <!-- Appointments Table -->
       <?php
       
       $res = mysqli_query($connect, "SELECT * FROM appointment WHERE name='$pat' ORDER BY appointment_date DESC");
       if (mysqli_num_rows($res) > 0) {
           echo "<div class='card mt-4'>
                   <div class='card-header'>My Appointments</div>
                   <div class='card-body'>
                     <table class='table table-striped'>
                       <thead>
                         <tr>
                           <th>Date</th>
                           <th>Reason</th>
                           <th>Status</th>
                         </tr>
                       </thead>
                       <tbody>";
           while ($row = mysqli_fetch_assoc($res)) {
            $status = $row['status'];
                      $badgeClass = 'bg-secondary';
                      if ($status == 'Approved') {
                        $badgeClass = 'bg-success';
                      } elseif ($status == 'Pending') {
                        $badgeClass = 'bg-warning text-dark';
                      } 
               echo "<tr>
                       <td>{$row['appointment_date']}</td>
                        <td>{$row['symptoms']}</td>
                     
                      
                      <td><span class='badge $badgeClass'>{$status}</span></td>
                      
                     </tr>";
           }
           echo "     </tbody>
                     </table>
                   </div>
                 </div>";
       } else {
           echo "<div class='alert alert-info mt-4'>No appointments found.</div>";
       }
        ?>
      

      <!-- Prescription Section -->
      <!-- <div class="card mt-4">
        <div class="card-header">Recent Prescriptions</div>
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item">Paracetamol 500mg - 2 times daily – (Dr. Shweta Das)</li>
            <li class="list-group-item">Cough Syrup – 3 tsp before bed – (Dr. Rajiv Mehra)</li>
          </ul>
        </div>
      </div> -->

            </div>
        </div>
    </div>
    
</div>
</body>
</html>