

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
                    <h5 class="text-center my-2">My Invoice</h5>
                    <?php
                    $pat = $_SESSION['patient'];
                    $query = "SELECT * FROM patient WHERE name='$pat'";
                    $result = mysqli_query($connect, $query);

                    $row = mysqli_fetch_array($result);
                    $name = $row['name'];
                    
                    $querys = mysqli_query($connect, "SELECT * FROM income WHERE patient='$name'");
                    
                    $output = "";

                    $output .= "<table class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Doctor Name</th>
                            <th>Patient Name</th>
                            
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        ";
                    while ($row = mysqli_fetch_array($querys)) {
                        $output .= "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['doctor'] . "</td>
                            <td>" . $row['patient'] . "</td>
                           
                            <td>" . $row['amount_paid'] . "</td>
                            <td>" . $row['date_discharge'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>
                            <a href='view.php?id=" . $row['id'] . "' class='btn btn-primary'>View</a>
                            </td>
                        </tr>"; 
                    }
                    $output .= "</thead></table>";
                    if (mysqli_num_rows($querys) > 0) {
                        echo $output;
                    } else {
                        echo "<h5 class='text-center'>No Invoice Found</h5>";
                    }
                    ?>
                    
                    <div class="text-center my-3">
                        <a href="invoice.php?download_pdf=true" class="btn btn-success">Download PDF</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>