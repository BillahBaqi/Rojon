<?php
session_start();
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $id = $_POST['category-edit'];


    if (strlen($name) === 0) {
        $_SESSION['cnameempty'] = "Your Categories name can't be empty!";
        header('location:categories.php');        
    }
    else {
        $Category_update = "UPDATE categories SET name = '$name' WHERE id = $id";
        mysqli_query($db_connection, $Category_update);
        $_SESSION['cup'] = 'Category Update Successfully';
        header('location:categories.php');
    }
} 
else {
    header('location:categories.php');
}

