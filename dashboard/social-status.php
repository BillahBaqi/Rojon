<?php 

require_once '../db.php';
$id = $_GET['id'];

$status_select = "SELECT * FROM socials WHERE id = $id";
$status_select_query = mysqli_query($db_connection, $status_select);
$status_select_assoc = mysqli_fetch_assoc($status_select_query);

if ($status_select_assoc['status'] == 1) {
    $update = "UPDATE socials SET status = 2 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    header('location:social-list.php');
}
else {
    $update = "UPDATE socials SET status = 1 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    header('location:social-list.php');
}

?>