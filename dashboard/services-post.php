<?php
session_start();
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_name = $_POST['s_name'];
    $s_details = $_POST['s_details'];
    $s_icon = $_FILES['s_icon'];
    $s_id = $_SESSION['services-id'];

    $icon_name = $s_icon['name'];
    $icon_name_explode = explode('.', $icon_name);
    $icon_name_ext = end($icon_name_explode);
    $allow_icon_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];
    if (in_array($icon_name_ext, $allow_icon_format)) {
        if ($s_icon['size'] < 1024 * 1024) {
                        
            $icon_new_name = $s_id . rand(1, 999999) . '.' . $icon_name_ext;
            $new_icon_location = 'upload/' . $icon_new_name;
            move_uploaded_file($s_icon['tmp_name'], $new_icon_location);

            $services_insert = "INSERT INTO services(name, details, icon)VALUES('$s_name', '$s_details', '$icon_new_name')";
            $services_insert_query = mysqli_query($db_connection, $services_insert);
            header('location:services.php');
            $_SESSION['services'] = 'Services added Successfully!';
            
            
        } else {
            $_SESSION['img_size'] = 'Image Size Must less then 1MB';
            header('location:services-add.php');
        }
    } else {
        $_SESSION['services-icon'] = 'Set A Services icon!';
        header('location:services-add.php');
    }



    
}
