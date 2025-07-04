<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
    body {
      background: #f8f9fa;
    }
    .sidebar {
      background:  #343a40;
      min-height: 100vh;
      box-shadow: 2px 0 10px rgba(0,0,0,0.08);
    }
    .sidebar h4 {
      font-weight: bold;
      letter-spacing: 1px;
    }
    .sidebar .nav-link {
      border-radius: 8px;
      margin-bottom: 8px;
      transition: background 0.2s, color 0.2s;
    }
    .sidebar .nav-link.active, .sidebar .nav-link:hover {
      background: #198754;
      color: #fff !important;
    }
    .sidebar .profile-img {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #198754;
      margin-bottom: 15px;
    }
    .logout-btn {
      margin-top: 30px;
    }
  </style>

</head>
<body>
    
  <div class="d-flex" style="min-height: 100vh;">
    <!-- Sidebar -->
  <div class="sidebar text-white p-4" style="width: 250px;">
    <div class="text-center mb-4">
    <img src="https://ui-avatars.com/api/?name=Doctor&background=198754&color=fff" alt="Profile" class="profile-img">
    <h4 class="mt-2">Doctor Panel</h4>
    </div>
    <ul class="nav flex-column">
    <li class="nav-item"><a href="#" class="nav-link text-white active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
    <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-calendar-check"></i> My Appointments</a></li>
    <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-folder2-open"></i> Patient Records</a></li>
    <li class="nav-item"><a href="#" class="nav-link text-white"><i class="bi bi-file-earmark-medical"></i> Prescriptions</a></li>
    <li class="nav-item"><a href="profile.php" class="nav-link text-white"><i class="bi bi-person"></i> Profile</a></li>
    </ul>
    <!-- <a href="index.html" class="btn btn-outline-light btn-sm w-100 logout-btn">Logout</a> -->
  </div>
</body>
</html>