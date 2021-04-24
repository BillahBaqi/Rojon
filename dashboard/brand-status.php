<?php 

require_once '../db.php';
$id = $_GET['id'];

$brands_select = "SELECT * FROM brands WHERE id = $id";
$brands_select_query = mysqli_query($db_connection, $brands_select);
$brands_select_assoc = mysqli_fetch_assoc($brands_select_query);

if ($brands_select_assoc['status'] == 1) {
    $update = "UPDATE brands SET status = 2 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    header('location:brands.php');
}
else {
    $update = "UPDATE brands SET status = 1 WHERE id=$id";
    $update_query = mysqli_query($db_connection, $update);
    header('location:brands.php');
}

?>