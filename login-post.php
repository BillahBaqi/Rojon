<?php 
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT COUNT(*) as total, id, password, status, role FROM `users` WHERE email = '$email'";
    $select_query = mysqli_query($db_connection, $select);
    $assoc = mysqli_fetch_assoc($select_query);

    $hash = $assoc['password'];

    if ($assoc['total'] != 0) {
        if (password_verify($password, $hash)) {
            $_SESSION['email'] = $assoc['email'];
            $_SESSION['id'] = $assoc['id'];
            header('location:dashboard/dashboard.php');
           /*  $_SESSION['status'] = $assoc['status'];
            if ($assoc['status'] == 1 && $assoc['role'] == 1) {
                header('location:dashboard/dashboard.php'); 
            }
            
            elseif ($assoc['status'] == 2 && $assoc['role'] == 1) {
                $_SESSION['email_p'] = 'You Have No Access!';
                header('location:login.php');
            } */
        }
        else {
            $_SESSION['email_w'] = 'Wrong Password!';
            header('location:login.php');  
        }
    }
    else {
        $_SESSION['email_nf'] = 'User Email Not registered';
        header('location:login.php');  
    }
    



}
