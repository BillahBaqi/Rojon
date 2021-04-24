<?php
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$up_name = $_POST['up_social_name'];
$up_link = $_POST['up_social_link'];
$social_id = $_POST['social_edit'];
$social_update = "UPDATE socials SET name = '$up_name', link = '$up_link' WHERE id LIKE '$social_id'";
$social_update_query = mysqli_query($db_connection, $social_update);
header('location:social-list.php');
}



