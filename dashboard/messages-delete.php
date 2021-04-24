<?php 
session_start();
require_once '../db.php';
$id = $_GET['messages_id'];
// $delete = "DELETE FROM users WHERE id=$id";
// $delete_query = mysqli_query($db_connection, $delete);

$update = "UPDATE messages SET trash_status = 2 WHERE id=$id";
$delete_query = mysqli_query($db_connection, $update);


$_SESSION['message-delete'] = "Deleted Successfully!";
header('location:messages-list.php');
?>