<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acharya Prafulla Chandra Roy Hospital</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
     <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-2">
        <a class="navbar-brand" href="#">
          <img src="include/img/icon.png" alt="" width="80" />
        </a>
        
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">

          <?php 
                if (isset($_SESSION['admin'])){
                    $user = $_SESSION['admin'];
                    echo '
                    <li class="nav-item">
                        <a class="nav-link active" href="admin/index.php">'.$user.'</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../admin/logout.php">Logout</a>   
                    </li>
                    ';
                }else {
                    echo '
                    <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Login 
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="adminlogin.php">Admin</a></li>
                <li><a class="dropdown-item" href="#">Doctor</a></li>
                <li>
                  <a class="dropdown-item" href="#">Patient</a>
                </li>
              </ul>
            </li>
                ';
                }
                    
                ?>
          
            
          </ul>
        </div>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>