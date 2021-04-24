<?php 

require_once '../db.php';
$id = $_GET['id'];

$status_select = "SELECT * FROM services WHERE id = $id";
$status_select_query = mysqli_query($db_connection, $status_select);
$status_select_assoc = mysqli_fetch_assoc($status_select_query);

if ($status_select_assoc['trash_status'] == 1) {
    $update = "UPDATE services SET trash_status = 2 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    header('location:services.php');
}
else {
    $update = "UPDATE services SET trash_status = 1 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    header('location:services.php');
}
