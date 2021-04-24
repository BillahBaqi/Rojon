<?php 
session_start();
require_once '../db.php';
$id = $_GET['id'];

$education_select = "SELECT * FROM educations WHERE id = $id";
$education_select_query = mysqli_query($db_connection, $education_select);
$education_select_assoc = mysqli_fetch_assoc($education_select_query);

if ($education_select_assoc['trash_status'] == 1) {
    $update = "UPDATE educations SET trash_status = 2 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    $_SESSION['education'] = 'Education Delete Successfully!';
    header('location:education.php');
}
else {
    $update = "UPDATE educations SET trash_status = 1 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    $_SESSION['education'] = 'Education Delete Successfully!';
    header('location:education.php');

}
