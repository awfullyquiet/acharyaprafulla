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
                    <h5 class="text-center my-2">Total Appointment</h5>
                    <?php 
                    if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $res = mysqli_query($connect, "SELECT * FROM appointment WHERE id = '$id'");
                    $row = mysqli_fetch_array($res);
                }
                    ?>
                    
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2" class="text-center">Appointment Details</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>
                                            <?php
                                            echo $row['name'];
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <?php
                                            echo $row['email'];
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Appointment Date</td>
                                        <td>
                                            <?php
                                            echo $row['appointment_date'];
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Symptoms</td>
                                        <td>
                                            <?php
                                            echo $row['symptoms'];
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date Booked</td>
                                        <td>
                                            <?php
                                            echo $row['date_booked'];
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center my-1">Invoice</h5>
                                <?php
                                if (isset($_POST['send'])){
                                    $fee = $_POST['fee'];
                                    $des = $_POST['des'];

                                    if ($fee == "" || $des == "") {
                                        echo "<div class='alert alert-danger'>Please fill all fields</div>";
                                    } else {
                                        $doc = $_SESSION['doctor'];
                                        $insert = mysqli_query($connect, "INSERT INTO income (doctor, patient, date_discharge, amount_paid, description) VALUES ('$doc', '{$row['name']}', NOW(), '$fee', '$des')");
                                        
                                        if ($insert) {
                                            echo "<div class='alert alert-success'>Invoice sent successfully</div>";
                                            $qq= mysqli_query($connect, "UPDATE appointment SET status = 'Approved' WHERE id = '$id'");
                                        } else {
                                            echo "<div class='alert alert-danger'>Error sending invoice</div>";
                                        }
                                    }
                                }
                                ?>
                                <form method="post">
                                    <label for="">Fee</label>
                                    <input type="number" name="fee" id="" class="form-control">

                                    <label for="">Description</label>
                                    <input type="text" name="des" id="" class="form-control">

                                    <input type="submit" name="send" value="Send" class="btn btn-info my-2">
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