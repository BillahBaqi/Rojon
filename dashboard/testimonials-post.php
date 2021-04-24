<?php
session_start();
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $quote = htmlentities($_POST['quote'], ENT_QUOTES);
    $image = $_FILES['image'];
    $id = $_SESSION['id'];

    if (empty($name)){
        header('location:testimonials-add.php');
        $_SESSION['name'] = 'Name Field Empty!';  
    }

    if (empty($designation)){
        header('location:testimonials-add.php');
        $_SESSION['designation'] = 'Designation Field Empty!';
        die();
    }
    if (empty($quote)) {
        header('location:testimonials-add.php');
        $_SESSION['quote'] = 'Quote Field Empty!';
        die();
    }
    
 
 
    $image_name = $image['name'];
    $image_name_explode = explode('.', $image_name);
    $image_name_ext = end($image_name_explode);
    $allow_image_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];
    if (in_array($image_name_ext, $allow_image_format)) {
        if ($image['size'] < 1024 * 1024) {
                        
            $image_new_name = $id . rand(1, 999999) . '.' . $image_name_ext;
            $new_image_location = 'upload/' . $image_new_name;
            move_uploaded_file($image['tmp_name'], $new_image_location);

            $testimonial_insert = "INSERT INTO testimonials(name, designation, quotes, image)VALUES('$name', '$designation', '$quote', '$image_new_name')";
            mysqli_query($db_connection, $testimonial_insert);
            header('location:testimonials.php');
            $_SESSION['services'] = 'Testimonials added Successfully!';
            
            
        } else {
            $_SESSION['img_size'] = 'Image Size Must less then 1MB';
            header('location:testimonials-add.php');
        }
    } else {
        $_SESSION['services-icon'] = 'Set A Services icon!';
        header('location:testimonials-add.php');
    }



    
}
