<?php
    include("../include/connection.php");

    $query = "SELECT * FROM doctor  WHERE status = 'pending' ORDER BY date_reg ASC";
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
            <th>Experience</th>
            <th>CV</th>
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
                $experience = $row['experience'];
                $cv = $row['cv'];
                $date_reg = date('d-m-Y', strtotime($row['date_reg']));

                $output .= "
                <tr>
                    <td>$id</td>
                    <td>$fullname</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$specialization</td>
                    <td>$experience</td>
                    <td><a href='../uploads/$cv' target='_blank'>View CV</a></td>
                    <td>$date_reg</td>
                    <td>
                        <div class='d-flex justify-content-between'>
                            <button id='".$row['id']."' class='btn btn-success approve'>Approve</button>
                            <button id='".$row['id']."' class='btn btn-danger reject'>Reject</button>
                        </div>
                    </td>
                ";
            }
        
    $output .= "
    </tr>
    </table>";
        echo $output;
?>