<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
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
                <h5 class="text-center">Total Doctors</h5>
                <?php
                $query = "SELECT * FROM doctor WHERE status='approved' ORDER BY date_reg ASC";
                $res = mysqli_query($connect, $query);
                $output = "";

    $output .= "
    <table class='table table-bordered'>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Specialization</th>
            <th>Salary</th>
            <th>Date of Registration</th>
            <th style='width: 10%;'>Action</th>
        </tr>";
        
        if (mysqli_num_rows($res) < 1) {
            $output .= "
            <tr>
                <td class='text-center' colspan='9'> No New Job Request </td>
            </tr>";
        } 
            while ($row = mysqli_fetch_array($res)) {
                $id = $row['id'];
                $fullname = $row['name'];
                $email = $row['email'];
                $phone = $row['phone'];
                $specialization = $row['specialization'];
                $salary = $row['salary'];
                
                $date_reg = date('d-m-Y', strtotime($row['date_reg']));

                $output .= "
                <tr>
                    <td>$id</td>
                    <td>$fullname</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$specialization</td>
                    <td>$salary</td>
                    <td>$date_reg</td>
                    <td>
                        <a href='edit.php?id=".$row['id']."'>
                            <button class='btn btn-info'>Edit</button>
                    </td>
                ";
            }
        
    $output .= "
    </tr>
    </table>";
        echo $output;
                ?>
                </div>
        </div>
    </div>
    </div>
</body>
</html>