<?php
include("../include/connection.php");

$id = $_POST['id'];
$query = "UPDATE doctor SET status = 'rejected' WHERE id = '$id'";
mysqli_query($connect, $query);
?>