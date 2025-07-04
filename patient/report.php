<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include ("../include/header.php");
    include ("sidebar.php");
    include ("../include/connection.php");
    ?>
    <!-- Report Section -->
       <?php
       if (isset($_POST['send_report'])) {
           $title = $_POST['title'];
           $message = $_POST['message'];
           $patient_name = $_SESSION['patient']; // Assuming patient ID is stored in session

           // Insert report into database
           $query = "INSERT INTO report (name, title, message, date_send) VALUES ('$patient_name', '$title', '$message', NOW())";
           $res = mysqli_query($connect, $query);
           if ($res) {
               echo '<div class="alert alert-success">Report sent successfully!</div>';
           } else {
               echo '<div class="alert alert-danger">Error sending report: ' . mysqli_error($connect) . '</div>';
           }
       }
       ?>
      <div class="col-md-8 ">
        <div class="row ">
          <div class="col-md-6  mx-auto">
            <div class="card my-4 shadow">
              <div class="card-header bg-info text-white">
                <h5 class="mb-0 text-center">Send a Report</h5>
              </div>
              <div class="card-body">
                <form method="post">
                  <div class="mb-3">
                    <label for="reportTitle" class="form-label">Report Title</label>
                    <input type="text" name="title" id="reportTitle" class="form-control" placeholder="Enter report title" required>
                  </div>
                  <div class="mb-3">
                    <label for="reportMessage" class="form-label">Message</label>
                    <textarea name="message" id="reportMessage" class="form-control" rows="4" placeholder="Enter your message" required></textarea>
                  </div>
                  <div class="d-grid">
                    <button type="submit" name="send_report" class="btn btn-primary">Send Report</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>