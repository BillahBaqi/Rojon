<?php
session_start();
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand_name = $_POST['brand_name'];
    $brand_image = $_FILES['brand_image'];
    $id = $_POST['brand-edit'];
   

    $brand_image_name = $brand_image['name'];
    if (strlen($brand_name) === 0) {
        $_SESSION['bnameempty'] = "Your Brand name can't be empty!";
        header('location:brands.php');
        die();
    }
    if ($brand_image_name == '') {
        $brand_update = "UPDATE brands SET brand_name='$brand_name' WHERE id = $id";
        $brand_update_query = mysqli_query($db_connection, $brand_update);
        $_SESSION['brands_update'] = 'Brands Update Successfully!';
        header('location:brands.php');
        

        
    } else {
        $brand_image_explode = explode('.', $brand_image_name);
        $brand_image_ext = end($brand_image_explode);
        $allow_brand_image_format = ["png", "bmp", "PNG", "GIF", "webp", "svg"];
        if (in_array($brand_image_ext, $allow_brand_image_format)) {
            if ($brand_image['size'] < 1024 * 1024) {
                $select_brand_image = "SELECT * FROM brands WHERE id=$id";                
                $Check_brand_image_query = mysqli_query($db_connection, $select_brand_image);
                $Check_brand_image_assoc = mysqli_fetch_assoc($Check_brand_image_query);
                $old_brand_image = 'upload/' . $Check_brand_image_assoc['brand_image'];
                if (file_exists($old_brand_image)) {
                    unlink($old_brand_image);
                }
                $new_brand_image_name = rand(1, 9999999) . '.' . $brand_image_ext;
                $new_brand_image_location = 'upload/' . $new_brand_image_name;

                move_uploaded_file($brand_image['tmp_name'], $new_brand_image_location);
                

                $brand_update = "UPDATE brands SET brand_name='$brand_name', brand_image='$new_brand_image_name' WHERE id = $id";
                $brand_update_query = mysqli_query($db_connection, $brand_update);
                $_SESSION['brands_update'] = 'Brands Update Successfully!';
                header('location:brands.php');
            } else {
                $_SESSION['img_size'] = 'Image Size Must less then 1MB';
                header('location:brand-edit.php');
            }
        } else {
            $_SESSION['brand_image'] = 'Set a Brand Image!';
            header('location:brand-edit.php');
        }
    }
}else {
    header('location:services.php');
} 

?>

