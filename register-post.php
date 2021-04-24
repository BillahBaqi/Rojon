<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    /*     $select = "SELECT COUNT(*) as email_exist FROM `users` WHERE email = '$email'";
    $select_query = mysqli_query($db_connection, $select);
    $select_assoc = mysqli_fetch_assoc($select_query); */

    /*     $insert = "INSERT INTO users(name, email, phone, password)VALUES('$name', '$email', '$phone', '$password')";
    $insert_query = mysqli_query($db_connection, $insert); */

    // $_SESSION['success'] = 'Registered Successfully!';
    // header('location:login.php');

    if (empty($name)) {
        $_SESSION['name'] = 'Name field empty';
        header('location:register.php');
        
    }
    if (!empty($name)) {
        // $len = strlen($name);
        if (!preg_match('/^[a-z\d_\s]{2,20}$/i', $name)) {
            $_SESSION['namecar'] = 'Name must have at least 2 characters & Alphabetic';
            header('location:register.php');
            die();
        }
    }
    
    if (empty($email)) {
        $_SESSION['email'] = 'Email field empty';
        header('location:register.php');
        
    }

    if (!empty($email)) {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,20})$/';
        if (!preg_match($regex, $email)) {
            $_SESSION['emailinv'] = 'Invalid email';
            header('location:register.php');
            die();
            
        }
    }

    if (!empty($phone)) { //not empty thakle keno phone validation kora jaceena.
        $phv = "@[0-9]@";
        if (!preg_match($phv, $phone)) {
            $_SESSION['Phoneinv'] = 'Invalid Phone No.';
            header('location:register.php');
            die();
        }
    }

    if (empty($password)) {
        $_SESSION['password'] = 'Set your password';
        header('location:register.php');
        
    }


    if (!empty($password)) {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 7) {            
            $_SESSION['passwordinv'] = 'Password must have 8 characters, 1 Uppercase, 1 Lowercase, 1 number.';
            header('location:register.php');
            die();
            
        }

        if ($password != $cpassword) {
            $_SESSION['cpasswordinv'] = 'Password not match';
            header('location:register.php');
            die();

        
        } else {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $select = "SELECT COUNT(*) as email_exist FROM `users` WHERE email = '$email'";
            $select_query = mysqli_query($db_connection, $select);
            $select_assoc = mysqli_fetch_assoc($select_query);
        
            if ($select_assoc['email_exist'] != 0) {
                $_SESSION['email-exist'] = 'This Email already Registered';
                header('location:register.php');
                
            } else {
                $insert = "INSERT INTO users(name, email, phone, password)VALUES('$name', '$email', '$phone', '$hash_password')";
                $insert_query = mysqli_query($db_connection, $insert);
                $_SESSION['reg-success'] = 'Registered Successfully!';
                header('location:login.php');
            }
        }
    }
} else {
    header('location:register.php');
}










/* 
$select = "SELECT COUNT(*) as email_exist FROM users WHERE email='$email'";
$select_query = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_query);

if($after_assoc['email_exist'] != 0){
    $_SESSION['email_ache'] = 'Ek Email koybar des?';
    header('location:register-post.php');
}
else {
    $insert = "INSERT INTO users(name, email, phone, password)VALUES('$name', '$email', '$phone', '$password')";
    $insert_query = mysqli_query($db_connection, $insert);
    
    $_SESSION['success'] = 'Registered Successfully!';
    header('location:register-post.php');
} */
?>