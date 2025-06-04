<?php 
include("include/header.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acharya Prafulla Chandra Roy Hospital</title>
    
  </head>
  <body>
    <!-- Hero Section -->
    <section
      class="hero bg-dark text-white py-5 "
      style="
        background-image: url('include/img/merobg.png');
        background-size: cover;
        background-position: center;
        height: 60vh;
      "
    >
      <div class="container text-center">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-8">
            <h1 class="display-5 fw-bold">World-class care for everyone</h1>
            <p class="lead">
              Get expert care from our experienced specialists, anytime you need
              it.
            </p>
            <a href="#" class="btn btn-primary btn-lg mt-3">Book Appointment</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="py-5">
      <div class="container">
        <h2 class="mb-4 text-center">Our Services</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Cardiology</h5>
                <p class="card-text">
                  Advanced heart care from top cardiologists.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Neurology</h5>
                <p class="card-text">
                  Expert diagnosis and treatment for neurological issues.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Pediatrics</h5>
                <p class="card-text">
                  Comprehensive care for your little ones.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Find a Doctor -->
    <section class="bg-light py-5">
      <div class="container">
        <h2 class="mb-4 text-center">Find a Doctor</h2>
        <form class="row g-3 justify-content-center">
          <div class="col-md-4">
            <input
              type="text"
              class="form-control"
              placeholder="Doctor Name or Specialty"
            />
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Search</button>
          </div>
        </form>
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
