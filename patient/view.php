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
    include ("../include/header.php");
    include ("sidebar.php");
    include ("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                   <h5 class="text-center my-2">View Invoice</h5>
                   <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $query = "SELECT * FROM income WHERE id='$id'";
                                    $result = mysqli_query($connect, $query);
                                    $row = mysqli_fetch_array($result);
                                } 
                                ?>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Invoice ID</th>
                                        <td><?php echo $row['id']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <td><?php echo $row['doctor']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Patient Name</th>
                                        <td><?php echo $row['patient']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Amount Paid</th>
                                        <td><?php echo $row['amount_paid']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date of Discharge</th>
                                        <td><?php echo $row['date_discharge']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><?php echo $row['description']; ?></td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>