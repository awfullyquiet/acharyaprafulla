<?php
include("../include/connection.php");

$id = $_POST['id'];
$query = "UPDATE doctor SET status = 'approved' WHERE id = '$id'";
mysqli_query($connect, $query);
?>