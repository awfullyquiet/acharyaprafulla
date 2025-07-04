<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<body>
    <?php
    include("../include/header.php");
    include("sidebar.php");
    include("../include/connection.php");
    $ad = $_SESSION['admin'];
    $query = "SELECT * FROM admin WHERE username = '$ad'";
    $res = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($res)) {
        // $id = $row['id'];
        $username = $row['username'];
        $profile = $row['profile'];
    }
    ?>
    <div class="container-fluid">

    
    <div class="col-md-10 ms-4 ">
        <div class="row">
            <div class="col-md-4">
                <h4>
                    <?php echo $username; ?>'s Profile
                </h4>

                <?php
                if(isset($_POST['update'])) {
                    $profile = $_FILES['profile']['name'];
                    $temp_name = $_FILES['profile']['tmp_name'];
                    $folder = "img/" . $profile;

                    if(move_uploaded_file($temp_name, $folder)) {
                        $query = "UPDATE admin SET profile='$profile' WHERE username='$ad'";
                        if(mysqli_query($connect, $query)) {
                            echo "<script>alert('Profile Updated Successfully');</script>";
                            echo "<script>window.open('profile.php', '_self');</script>";
                        } else {
                            echo "<script>alert('Profile Update Failed');</script>";
                        }
                    } else {
                        echo "<script>alert('Failed to upload image');</script>";
                    }
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <?php 
                    echo "<img src='img/$profile' class='col-md-12'
                    style='width: 150px;'>";
                    ?>
                    <br>
                    <div class="form-group">
                        <label for="">Udate Profile</label>
                        <input type="file" name="profile" class="form-control" style="width: 40%">

                    </div>
                    <br>
                    <input type="submit" name="update" value="Update Profile" class="btn btn-success">
                </form>
            </div>
            <div class="col-md-8">
                <?php
                if(isset($_POST['change_username'])) {
                    $new_username = $_POST['username'];
                    if(!empty($new_username)) {
                        $query = "UPDATE admin SET username='$new_username' WHERE username='$ad'";
                        if(mysqli_query($connect, $query)) {
                            $_SESSION['admin'] = $new_username;
                            echo "<script>alert('Username Changed Successfully');</script>";
                            echo "<script>window.open('profile.php', '_self');</script>";
                        } else {
                            echo "<script>alert('Username Change Failed');</script>";
                        }
                    } else {
                        echo "<script>alert('Username cannot be empty');</script>";
                    }
                }
                ?>
                <form action="" method="post" style="width: 40%">
                    <div class="form-group">
                        <label for="">Change Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" >
                        <input type="submit" name="change_username" value="Change Username" class="btn btn-primary mt-2">
                </form>
                <br>
                <?php
                if (isset($_POST['change_password'])) {
                    $old_password = $_POST['old_password'];
                    $new_password = $_POST['new_password'];
                    $confirm_password = $_POST['confirm_password'];

                    if(!empty($old_password) && !empty($new_password) && !empty($confirm_password)) {
                        $query = "SELECT * FROM admin WHERE username='$ad' AND password='$old_password'";
                        $result = mysqli_query($connect, $query);
                        if(mysqli_num_rows($result) > 0) {
                            if($new_password === $confirm_password) {
                                $update_query = "UPDATE admin SET password='$new_password' WHERE username='$ad'";
                                if(mysqli_query($connect, $update_query)) {
                                    echo "<script>alert('Password Changed Successfully');</script>";
                                    echo "<script>window.open('profile.php', '_self');</script>";
                                } else {
                                    echo "<script>alert('Password Change Failed');</script>";
                                }
                            } else {
                                echo "<script>alert('New Passwords do not match');</script>";
                            }
                        } else {
                            echo "<script>alert('Old Password is incorrect');</script>";
                        }
                    } else {
                        echo "<script>alert('All fields are required');</script>";
                    }
                }
                ?>
                <form method="post">
                    <h5 class="text-center my-4">Change Password</h5>
                    <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" name="old_password" class="form-control" required>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="new_password" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label for="">Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>

                        </div>
                        <input type="submit" name="change_password" value="Change Password" class="btn btn-danger mt-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>