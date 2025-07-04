<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
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
                <div class="col-md-10">
                    <h5 class="text-center">Edit Doctor Details</h5>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM doctor WHERE id='$id'";
                        $res = mysqli_query($connect, $query);
                        $row = mysqli_fetch_array($res);
                    } 

                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="my-3">ID : <?php echo $row['id']; ?></h5>
                            <h5 class="my-3">Name : <?php echo $row['name']; ?></h5>
                            <h5 class="my-3">Email : <?php echo $row['email']; ?></h5>
                            <h5 class="my-3">Phone : <?php echo $row['phone']; ?></h5>
                            <h5 class="my-3">Specialization : <?php echo $row['specialization']; ?></h5>
                            <h5 class="my-3">Salary : <?php echo $row['salary']; ?></h5>
                            <h5 class="my-3">Date Registered : <?php echo $row['date_reg']; ?></h5>
                            
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Update Salary</h5>
                            <?php
                            if(isset($_POST['salary'])) {
                                $salary = $_POST['salary'];
                                $update_query = "UPDATE doctor SET salary='$salary' WHERE id='$id'";
                                if (mysqli_query($connect, $update_query)) {
                                    echo "<div class='alert alert-success'>Salary updated successfully!</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Error updating salary: " . mysqli_error($connect) . "</div>";
                                }
                                //refresh the page to show updated data using script
                                echo "<script>setTimeout(function(){ window.location.href = 'edit.php?id=$id'; }, 1000);</script>";
                                
                            }
                            ?>
                            <form method="post">
                                <label for="">Enter Doctor's Salary</label>
                                <input type="number" name="salary" class="form-control" value="<?php echo $row['salary']; ?>" required>
                                <input type="submit" value="Update Salary" class="btn btn-info my-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>