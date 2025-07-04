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
    include("../include/header.php");
    include("../include/connection.php");
    include("sidebar.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-10-md">
                    <h5 class="text-center my-3">View Patient Details</h5>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = mysqli_query($connect, "SELECT * FROM patient WHERE id='$id'");
                        if (mysqli_num_rows($query) > 0) {
                            $row = mysqli_fetch_assoc($query);
                            echo "<p><strong>ID:</strong> " . $row['id'] . "</p>";
                            echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
                            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
                            echo "<p><strong>Date Registered:</strong> " . $row['date_reg'] . "</p>";
                        } else {
                            echo "<p class='text-danger'>No patient found with this ID.</p>";
                        }
                    } else {
                        echo "<p class='text-danger'>Invalid request.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>