<?php
  include ("include/connection.php");

  if(isset($_POST['create_account'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    if(empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
      echo "All fields are required.";
    } elseif($password !== $confirm_password) {
      echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } else {
      // Insert into database (assuming a table named 'patients')
      $query = "INSERT INTO patient (name, email, password, profile, date_reg) VALUES ('$name', '$email', '$password', 'patient.png', NOW())";
      if(mysqli_query($connect, $query)) {
       echo "<script>alert('Account created successfully');</script>";
      } else {
        echo "Error: " . mysqli_error($connect);
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
</head>
<body>
    <?php
    include ("include/header.php");
    ?>
     
    <!-- Registration Form Section -->
    <section class="vh-100 d-flex align-items-center justify-content-center my-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
              <div class="card-body p-4">
                <h2 class="text-center mb-4">Create an Account</h2>
                <form method="POST" >
                  <!-- Name Input -->
                  <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="name"
                      placeholder="Enter your full name"
                      required
                    />
                  </div>

                  <!-- Email Input -->
                  <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      placeholder="Enter your email"
                      name="email"
                      required
                    />
                  </div>

                  <!-- Password Input -->
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="password"
                      placeholder="Enter your password"
                      name="password"
                      required
                    />
                  </div>

                  <!-- Confirm Password Input -->
                  <div class="mb-3">
                    <label for="confirmPassword" class="form-label"
                      >Confirm Password</label
                    >
                    <input
                      type="password"
                      class="form-control"
                      id="confirmPassword"
                      placeholder="Confirm your password"
                      name="confirm_password"
                      required
                    />
                  </div>

                  <!-- Submit Button -->
                  <input
                    type="submit"
                    class="btn btn-primary w-100"
                    value="Create Account"
                    name="create_account"
                  />
                </form>

                <div class="text-center mt-3">
                  <!-- Login Link -->
                  <p>
                    Already have an account?
                    <a href="patientlogin.html" class="text-decoration-none">Login</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>
</html>