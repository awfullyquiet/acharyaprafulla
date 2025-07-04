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
                    <h2 class="text-center">Appointment</h2>
                    <?php
                        $pat = $_SESSION['patient'];
                        $sel = mysqli_query($connect,"SELECT * FROM patient WHERE name = '$pat'");
                        $row = mysqli_fetch_array($sel);

                        $name = $row['name'];
                        $email = $row['email'];

                        if (isset($_POST['book'])) {
                            $date = $_POST['date'];
                            $sym = $_POST['sym'];

                            if ($date == "" || $sym == "") {
                                echo "<div class='alert alert-danger'>Please fill all fields</div>";
                            } else {
                                $insert = mysqli_query($connect, "INSERT INTO appointment (name, email, appointment_date, symptoms, status, date_booked) VALUES ('$name', '$email', '$date', '$sym', 'Pending', NOW())");

                                if ($insert) {
                                    echo "<div class='alert alert-success'>Appointment booked successfully</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Error booking appointment</div>";
                                }
                            }
                        }

                    ?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <form  method="post">
                                        <br><br>
                                        <label for="">Appointment Date</label>   
                                        <input type="date" name="date" id="" class="form-control">
                                        <br>
                                        <label for="">Symptoms</label>
                                        <input type="text" name="sym" class="form-control" id="" placeholder="Enter your symptoms">
                                        <br>

                                        <input type="submit" value="Book Appointment" name="book" class="btn btn-info">
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>