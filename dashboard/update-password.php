<?php
session_start();
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $id = $_SESSION['id'];

    $hash_password = password_hash($old_password, PASSWORD_DEFAULT);
    $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);
    

    $select = "SELECT COUNT(*) as total, id, password, status, role FROM `users` WHERE id = '$id'";
    $select_query = mysqli_query($db_connection, $select);
    $assoc = mysqli_fetch_assoc($select_query);

    $hash = $assoc['password'];

    if (password_verify($old_password, $hash)) {
        if (empty($new_password)) {
        $_SESSION['password'] = 'Set your password';
        header('location:password-change.php');
        die();
        }

        if (empty($confirm_password)) {
            $_SESSION['c_password'] = 'Set your Confirm password';
            header('location:password-change.php');
            die();
        }

        if (!empty($new_password) && !empty($confirm_password)){
            if ($new_password != $confirm_password) {
                $_SESSION['c_password_match'] = 'Confirm Password not match';
                header('location:password-change.php');
                die();
            }
            else {
                if (password_verify($new_password, $hash)) {
                    $_SESSION['old-new-password'] = "New Password Can't be same Old Password";
                    header('location:password-change.php');  
                }
                else {
                    $password_update = "UPDATE users SET password = '$hash_new_password' WHERE id = $id";
                    mysqli_query($db_connection, $password_update);
                    $_SESSION['update-password'] = "Password Update SuccessFully";
                    header('location:password-change.php');  
                }                               
            } 
        }
        
    } else {
        $_SESSION['old-password'] = 'Wrong password';
        header('location:password-change.php');
    } 
}

?>
