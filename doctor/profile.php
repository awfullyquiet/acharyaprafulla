<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include("sidebar.php");
    include("../include/connection.php");
    ?>
    <div class="container-fluid my-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $doc = $_SESSION['doctor'];
                                    $query = "SELECT * FROM doctor WHERE name='$doc'";
                                    $result = mysqli_query($connect, $query);
                                    $row = mysqli_fetch_array($result);
                                    if (isset($_POST['change_profile'])) {
                                        $img = $_FILES['img']['name'];
                                        $tmp_name = $_FILES['img']['tmp_name'];
                                        $target = "img/" . basename($img);
                                        if (move_uploaded_file($tmp_name, $target)) {
                                            $update_query = "UPDATE doctor SET profile='$img' WHERE name='$doc'";
                                            mysqli_query($connect, $update_query);
                                            echo "<script>alert('Profile image updated successfully!');</script>";
                                            echo "<script>window.location.href='profile.php';</script>";
                                        } else {
                                            echo "<script>alert('Failed to upload image.');</script>";
                                        }
                                    }
                                    ?>
                                    <form method="post" enctype="multipart/form-data">
                                        <?php
                                        echo "<img src='img/" . $row['profile'] . "' class='img-fluid' alt='Doctor Image' style='width: 200px;  border-radius: 10%;'>";
                                        ?>
                                        <input type="file" name="img" class="form-control my-2" required>
                                        <input type="submit" class="btn btn-primary my-2" value="Update Profile Image" name="change_profile">
                                    </form>
                                    <div class="my-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Name</th>
                                                <td><?php echo $row['name']; ?></td>
                                            </tr>

                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $row['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td><?php echo $row['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Specialization</th>
                                                <td><?php echo $row['specialization']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Salary</th>
                                                <td><?php echo $row['salary']; ?></td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center my-2">Change Name</h5>
                                    <form method="post">
                                        <?php
                                        if (isset($_POST['change_name'])) {
                                            $new_name = $_POST['name'];
                                            $update_query = "UPDATE doctor SET name='$new_name' WHERE name='$doc'";
                                            mysqli_query($connect, $update_query);
                                            echo "<script>alert('Name updated successfully!');</script>";
                                            echo "<script>window.location.href='profile.php';</script>";
                                            if ($result) {
                                                $_SESSION['doctor'] = $new_name; // Update session variable
                                            } else {
                                                echo "<script>alert('Failed to update name.');</script>";
                                            }
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label for="name">New Name</label>
                                            <input type="text" class="form-control" name="name" id="name" required>
                                        </div>
                                        <input type="submit" class="btn btn-primary my-2" value="Change name" name="change_name" name>

                                    </form>
                                    <br><br>
                                    <h5 class="text-center my-2">Change Password</h5>
                                    <?php
                                    if (isset($_POST['change_password'])) {
                                        $current_password = $_POST['current_password'];
                                        $new_password = $_POST['new_password'];
                                        $confirm_password = $_POST['confirm_password'];

                                        // Check if current password is correct
                                        $check_query = "SELECT * FROM doctor WHERE name='$doc' AND password='$current_password'";
                                        $check_result = mysqli_query($connect, $check_query);

                                        if (mysqli_num_rows($check_result) > 0) {
                                            if ($new_password === $confirm_password) {
                                                // Update password
                                                $update_query = "UPDATE doctor SET password='$new_password' WHERE name='$doc'";
                                                mysqli_query($connect, $update_query);
                                                echo "<script>alert('Password changed successfully!');</script>";
                                                echo "<script>window.location.href='profile.php';</script>";
                                            } else {
                                                echo "<script>alert('New passwords do not match.');</script>";
                                            }
                                        } else {
                                            echo "<script>alert('Current password is incorrect.');</script>";
                                        }
                                    }
                                    ?>

                                    <form method="post">
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" class="form-control" name="current_password" id="current_password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <input type="password" class="form-control" name="new_password" id="new_password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm New Password</label>
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                                        </div>
                                        <input type="submit" class="btn btn-primary my-2" value="Change Password" name="change_password">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>