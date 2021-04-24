<?php 
session_start();
require_once '../db.php';
$id = $_GET['user_id'];
// $delete = "DELETE FROM users WHERE id=$id";
// $delete_query = mysqli_query($db_connection, $delete);

$update = "UPDATE users SET status = 2 WHERE id=$id";
$delete_query = mysqli_query($db_connection, $update);


$_SESSION['delete'] = "Deleted Successfully!";
header('location:user-table.php');
?>