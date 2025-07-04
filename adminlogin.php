<?php
session_start();
include("include/connection.php");
if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($uname)) {
        $error['admin'] = "Enter Username";
    } else if (empty($password)) {
        $error['admin'] = "Enter Password";
        
    }

    if (count($error) == 0) {
        $query = "SELECT * FROM admin WHERE username='$uname' AND password='$password'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
           echo "<script>alert('Logged in as admin')</script>";

           $_SESSION['admin'] = $uname;
           header("location:admin/index.php");
           exit();
        } else {
           echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Acharya Prafulla Chandra Roy Hospital</title>
    
  </head>
  <body class="bg-light">
    <?php
include("include/header.php");
?>
    <!-- Login Form Section -->
    <section class="vh-100 d-flex align-items-center justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
              <div class="card-body p-4">
                <h2 class="text-center mb-4">Login For Admin</h2>
                <form method="post">
                  <!-- username -->
                  <div class="mb-3">
                    <label for="uname" class="form-label">Username</label>
                    <input
                    name="uname"
                      type="text"
                      class="form-control"
                      id="uname"
                      placeholder="Enter your username"
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
                  <button type="submit" class="btn btn-primary w-100" name="login">
                    Login
                  </button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
      <div class="container text-center">
        <p class="mb-1">&copy; 2025 APCR HOSPITAL. All rights reserved.</p>
        <p class="mb-0">
          Himachal Vihar, Matigara, Silliguri | Email: apcrgc21@gmail.com
        </p>
      </div>
    </footer>

    
  </body>
</html>
