<?php 
session_start();
require_once '../db.php';
$id = $_GET['social_id'];
// $delete = "DELETE FROM users WHERE id=$id";
// $delete_query = mysqli_query($db_connection, $delete);

$social_delete = "DELETE FROM socials WHERE id=$id";
$social_delete_query = mysqli_query($db_connection, $social_delete);


// $_SESSION['delete'] = "Deleted Successfully!";
header('location:social-list.php');
?>