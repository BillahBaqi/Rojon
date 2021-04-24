<?php 

require_once '../db.php';
$id = $_GET['messages_id'];

$status_select = "SELECT * FROM messages WHERE id = $id";
$status_select_query = mysqli_query($db_connection, $status_select);
$status_select_assoc = mysqli_fetch_assoc($status_select_query);

if ($status_select_assoc['read_status'] == 1) {
    $update = "UPDATE messages SET read_status = 2 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    header('location:messages-list.php');
}
else {
    $update = "UPDATE messages SET read_status = 1 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    header('location:messages-list.php');
}

?>