<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    print_r($email);


    if ($address != '' && $phone != '' && $email != '') {
        $portfolio_update = "UPDATE information SET address='$address', phone= '$phone', email='$email'";
        mysqli_query($db_connection, $portfolio_update);

        $_SESSION['update-success'] = 'Information Update Successfully!';
        header('location:information.php');
    }

}
?>