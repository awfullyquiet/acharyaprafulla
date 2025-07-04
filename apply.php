<?php
session_start();  
include("include/connection.php");

if (isset($_POST['apply'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $specialization = $_POST['specialization'];
    $experience = $_POST['experience'];
    
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];

    // Handle file upload
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        $cv = $_FILES['cv']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($cv);
        
        
    if ($password !== $con_password) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } 
     else {
         // Check if file is a PDF
        if (pathinfo($target_file, PATHINFO_EXTENSION) != 'pdf') {
            echo "<script>alert('Only PDF files are allowed.');</script>";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['cv']['tmp_name'], $target_file)) {
                // Insert application data into the database
                $query = "INSERT INTO doctor (name, email, phone, specialization, experience, cv, password, date_reg, status) VALUES ('$name', '$email', '$phone', '$specialization', '$experience', '$cv', '$password', NOW(), 'pending')";
                if (mysqli_query($connect, $query)) {
                    echo "<script>alert('Application submitted successfully!');</script>";
                } else {
                    echo "<script>alert('Error submitting application: " . mysqli_error($connect) . "');</script>";
                }
            } else {
                echo "<script>alert('Error uploading CV.');</script>";
            }
        }
    }
       
    } else {
        echo "<script>alert('Please upload your CV.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Apply as Doctor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <?php
include("include/header.php");
?>
  <!-- Header -->
  <div class="bg-primary text-white text-center py-4">
    <h2>Join Our Team</h2>
    <p>Fill out the form below to apply as a doctor at Acharya Prafulla Chandra Roy Hospital</p>
  </div>

  <!-- Application Form -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-4 text-center">Doctor Application Form</h4>
            <form  method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" id="fullName" class="form-control" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']?>" required />
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" class="form-control" name="email" 
                value="<?php if(isset($_POST['email'])) echo $_POST['email']?>" required />
              </div>

              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" id="phone" class="form-control" name="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'] ?> " required />
              </div>

              <div class="mb-3">
                <label for="specialization" class="form-label">Specialization</label>
                <select id="specialization" class="form-select" name="specialization"  required>
                  <option value="" disabled selected>Select your specialty</option>
                  <option>Cardiology</option>
                  <option>Neurology</option>
                  <option>Pediatrics</option>
                  <option>General Medicine</option>
                  <option>Orthopedics</option>
                  <option>Other</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="experience" class="form-label">Years of Experience</label>
                <input type="number" id="experience" class="form-control" min="0" name="experience" value="<?php if (isset($_POST['experience'])) echo $_POST['experience'] ?> " required />
              </div>

              <div class="mb-3">
                <label for="cv" class="form-label">Upload Your CV</label>
                <input type="file" id="cv" class="form-control" accept=".pdf" name="cv" required />
              </div>

              <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input id="pass" type="password" rows="4" class="form-control" placeholder="password" name="password"  required></input>
              </div>

              <div class="mb-3">
                <label for="confirm_pass" class="form-label">Confirm Password</label>
                <input id="confirm_pass" type="password" rows="4" class="form-control" placeholder="confirm password" name="con_password"  required></input>
             <span id='message'></span>
              </div>

              <div class="d-grid">
                <input type="submit" class="btn btn-primary" value="Submit Application" name="apply" />
              </div>
            </form>
          </div>
        </div>

        <div class="text-center mt-4">
          <a href="index.html" class="text-decoration-none">← Back to Home</a>
        </div>
      </div>
    </div>
  </div>
 

</body>
</html>
