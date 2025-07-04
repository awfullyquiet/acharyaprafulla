<?php
session_start();
include("include/connection.php");
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $query = "SELECT * FROM patient WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['patient'] = $row['name'];
        header("Location: patient/index.php");
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>

</head>
<body>
    <?php
    include ("include/header.php");
    
    
    ?>
    <div class="container">
         <!-- Login Form Section -->
    <section class="vh-100 d-flex align-items-center justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
              <div class="card-body p-4">
                <h2 class="text-center mb-4">Login For Patient</h2>
                <form method="post">
                  <!-- username -->
                  <div class="mb-3">
                    <label for="uname" class="form-label">Email</label>
                    <input
                    name="email"
                      type="text"
                      class="form-control"
                      id="uname"
                      placeholder="Enter your Email"
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
                      required
                        name="pass"
                    />
                  </div>

                  <!-- Submit Button -->
                  <input
                    type="submit"
                    class="btn btn-primary w-100"
                    value="Login"
                    name="login">
                  <p class="text-center mt-3">
                    Don't have an account? <a href="patientregister.php">Register</a>
                  </p>

                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
        
</body>
</html>