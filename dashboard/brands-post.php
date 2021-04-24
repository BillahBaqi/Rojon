<?php
session_start();
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand_name = $_POST['brand_name'];
    $brand_image = $_FILES['brand_image'];
       

    $brand_image_name = $brand_image['name'];
    
    $brand_image_explode = explode('.', $brand_image_name);
    $brand_image_ext = end($brand_image_explode);
    $allow_brand_image_format = ["png", "bmp", "PNG", "GIF", "webp", "svg"];
    if (strlen($brand_name) === 0) {
        $_SESSION['bnameempty'] = "Your Brand name can't be empty!";
        header('location:brands.php');
        die();
    }

    if (in_array($brand_image_ext, $allow_brand_image_format)) {
        if ($brand_image['size'] < 1024 * 1024) {

            $brand_image_name = rand(1, 999999) . '.' . $brand_image_ext;
            $new_brand_image_location = 'upload/' . $brand_image_name;                       
            move_uploaded_file($brand_image['tmp_name'], $new_brand_image_location);            

            $brand_insert = "INSERT INTO brands(brand_name, brand_image)VALUES('$brand_name', '$brand_image_name')";
            $brand_insert_query = mysqli_query($db_connection, $brand_insert);
            $_SESSION['services'] = 'Services added Successfully!';
            header('location:brands.php');
        } else {
            $_SESSION['img_size'] = 'Image Size Must less then 1MB';
            header('location:brands.php');
        }
    } else {
        $_SESSION['brand_image'] = 'Set a Brand Image!';
        header('location:brands.php');
    }
}
