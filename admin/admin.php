<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <?php
    include("../include/header.php");
    include("sidebar.php");
    include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                    
                        <div class="col-md-6">
                            <h5 class="text-center">All Admin</h5>
                            <?php 
                            $ad = $_SESSION['admin'];
                            $query = "SELECT * FROM admin WHERE username != '$ad'";
                            $res = mysqli_query($connect, $query);
                            $output ="
                            <table class='table table-bordered'>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th style='width: 10%;'>Action </th>
                            </tr>
                            ";
                            if ($res && mysqli_num_rows($res) < 1){
                                $output .= " 
                                <tr>
                                <td class='text-center' colspan='3'> No New Admin </td>
                                </tr>";
                                
                            }
                            if ($res) {
                                while ($row = mysqli_fetch_array($res)){
                                    $id = $row['id'];
                                    $username = $row['username'];

                                    $output .= "
                                         <tr>
                                        <td>$id</td>
                                        <td>$username</td>
                                        <td>
                                        <a href = 'admin.php?id=$id'> <button id='$id' class='btn btn-danger remove'>Remove</button> </a>
                                        </td>
                                    </tr>
                                    ";

                                }
                            } else {
                                $output .= "<tr><td colspan='3' class='text-center'>Query Error: " . mysqli_error($connect) . "</td></tr>";
                            }
                            $output .= "
                            </table>
                            ";
                            echo $output;

                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $delete_query = "DELETE FROM admin WHERE id='$id'";
                                $del_r = mysqli_query($connect, $delete_query);
                                if ($del_r) {
                                    echo "<script>alert('Admin removed successfully.');</script>";
                                    echo '<meta http-equiv=Refresh content="0;url=admin.php?reload=1">';
                                    exit;
                                } else {
                                    echo "<script>alert('Failed to remove admin.');</script>";
                                }
                                
                            }

                            ?> 

                            
                               
                                

                        </div>
                        <div class="col-md-6">
                            <h5 class="text-center">Add Admin</h5>
                            <form method="post" enctype="multipart/form-data" action="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="uname" class="form-control" required>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="pass" class="form-control" required>
                                </div>
                                <div class="from-group">
                                    <label for="">Add Admin Picture</label>
                                    <input type="file" name="img" class="form-control" required>
                                </div>
                                <input type="submit" name="add_admin" class="btn btn-primary mt-3" value="Add New Admin">
                            </form>
                            <?php
                            if (isset($_POST['add_admin'])) {
                                $uname = $_POST['uname'];
                                $pass = $_POST['pass'];
                                $image = $_FILES['img']['name'];

                                $error = array();     

                                $check_query = "SELECT * FROM admin WHERE username='$uname'";
                                $check_res = mysqli_query($connect, $check_query);

                                if (mysqli_num_rows($check_res) > 0) {
                                    echo "<div class='alert alert-danger mt-2'>Username already exists.</div>";
                                } else {
                                    $insert_query = "INSERT INTO admin(username, password, profile) VALUES('$uname', '$pass', '$image')";
                                    if (mysqli_query($connect, $insert_query)) {
                                        move_uploaded_file($_FILES['img']['tmp_name'], "img/$image" );
                                        echo "<div class='alert alert-success mt-2'>Admin added successfully.</div>";
                                        echo "<meta http-equiv='refresh' content='1'>";
                                    } else {
                                        echo "<div class='alert alert-danger mt-2'>Failed to add admin.</div>";
                                    }
                                }
                            }
                            ?>
                        </div>
                      
            </div>
        </div>
    </div>
</body>
</html>