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
                <div class="col-md-10">
                    <h5 class="text-center my-2">Total Income</h5>
                    <?php
                    $res = mysqli_query($connect, "SELECT * FROM income");
                    $output = "";
                    $output .= "
                    <table class='table table-bordered table-striped'>
                        <tr>
                            <th>Income ID</th>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Amount Paid</th>
                            <th>Date</th>
                        </tr>
                    ";

                    if (mysqli_num_rows($res) < 1) {
                        $output .= "
                        <tr>
                            <td colspan='5' class='text-center'>No Income Records Found</td>
                        </tr>
                        ";
                    }
                    while ($row = mysqli_fetch_assoc($res)) {
                        $output .= "
                        <tr>
                            <td>{$row['income_id']}</td>
                            <td>{$row['patient_name']}</td>
                            <td>{$row['doctor_name']}</td>
                            <td>{$row['amount_paid']}</td>
                            <td>{$row['date']}</td>
                        
                        ";
                    }
                    $output .= "</tr></table>";  
                    echo $output;
                    ?>


                </div>
            </div>
        </div>
    </div>
</body>
</html>