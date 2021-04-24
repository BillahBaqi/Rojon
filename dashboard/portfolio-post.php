<?php
session_start();
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_name = $_POST['p_name'];
    $p_category = $_POST['p_category'];
    $p_title = $_POST['p_title'];
    $p_details = htmlentities($_POST['p_details'], ENT_QUOTES);
    $p_thumbnail = $_FILES['p_thumbnail'];
    $p_feature = $_FILES['p_feature'];

    if (strlen($p_name) === 0) {
        $_SESSION['pnameempty'] = "Your Project name can't be empty!";
        header('location:portfolio-add.php');
        
    }

    if (strlen($p_category) === 0) {
        $_SESSION['pcategoryempty'] = "Your Project category can't be empty!";
        header('location:portfolio-add.php');
        
    }

    if (strlen($p_title) === 0) {
        $_SESSION['ptitleempty'] = "Your Project title can't be empty!";
        header('location:portfolio-add.php');
        die();
    }

    $thumbnail_name = $p_thumbnail['name'];
    $thumbnail_name_explode = explode('.', $thumbnail_name);
    $thumbnail_name_ext = end($thumbnail_name_explode);

    $feature_name = $p_feature['name'];
    $feature_name_explode = explode('.', $feature_name);
    $feature_name_ext = end($feature_name_explode);
    
    $allow_img_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];

    
    
    if (in_array($thumbnail_name_ext, $allow_img_format) && in_array($feature_name_ext, $allow_img_format)) {
        $thumbnail_new_name = rand(1, 9999999) . '.' . $thumbnail_name_ext;
        $new_thumbnail_location = 'upload/' . $thumbnail_new_name;
        $feature_new_name = rand(1, 9999999) . '.' . $feature_name_ext;
        $new_feature_location = 'upload/' . $feature_new_name;

        if ($p_thumbnail['size'] < 1024 * 1024 && $p_feature['size'] < 1024 * 1024) {            
            move_uploaded_file($p_thumbnail['tmp_name'], $new_thumbnail_location);
            move_uploaded_file($p_feature['tmp_name'], $new_feature_location);      
            $portfolio_insert = "INSERT INTO portfolio (category_id, project, title, description, thumbnail, featured)VALUES('$p_category', '$p_name', '$p_title', '$p_details', '$thumbnail_new_name', '$feature_new_name')";
            mysqli_query($db_connection, $portfolio_insert);
            header('location:portfolio.php');
        } else {
            $_SESSION['image-size'] = 'Set image less then 1mb!';
            header('location:portfolio-add.php');
        }
    } 
    else {
        $_SESSION['image-field'] = "Image field can't be Empty";
        header('location:portfolio-add.php');
    }
}
