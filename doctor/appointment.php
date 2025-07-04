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
    include("sidebar.php");
    include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <h5 class="text-center my-2">Total Appointment</h5>
                    <?php
                    $res = mysqli_query($connect, "SELECT * FROM appointment WHERE status = 'Pending'");
                    $output = "";
                    $output .= "<table class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Appointment Date</th>
                                            <th>Symptoms</th>
                                            <th>Status</th>
                                            <th>Date Booked</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                    if (mysqli_num_rows($res) < 1) {
                        $output .= "<tr><td colspan='6' class='text-center'>No appointments found</td></tr>";
                    } else {
                        while ($row = mysqli_fetch_array($res)) {
                            $output .= "<tr>
                                                <td>{$row['name']}</td>
                                                <td>{$row['email']}</td>
                                                <td>{$row['appointment_date']}</td>
                                                <td>{$row['symptoms']}</td>
                                                <td>{$row['status']}</td>
                                                <td>{$row['date_booked']}</td>
                                                <td>
                                                    <div class='d-flex gap-2'>
                                                        <a href='discharge.php?id={$row['id']}' class='btn btn-success'>Check</a>
                                                        
                                                    </div>
                                                </td>
                                            </tr>";
                        }
                    }
                    $output .= "</tbody></table>";
                    echo $output;
                    ?>

                </div>

            </div>
        </div>
    </div>
</body>

</html>