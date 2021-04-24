<?php
session_start();
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    if (strlen($name) === 0) {
        $_SESSION['cnameempty'] = "Your Categories name can't be empty!";
        header('location:categories.php');        
    }
    else {
            $Category_insert = "INSERT INTO categories (name)VALUES('$name')";
            mysqli_query($db_connection, $Category_insert);
            $_SESSION['cadd'] = 'Category Added Successfully';
            header('location:categories.php');
    }
} 
else {
    header('location:categories.php');
}

