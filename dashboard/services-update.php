<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_up_name = $_POST['s_up_name'];
    $s_up_details = $_POST['s_up_details'];
    $s_up_icon = $_FILES['s_up_icon'];
    $id = $_POST['services_edit'];
    
    $up_icon_name = $s_up_icon['name'];
    if ($up_icon_name == '') {
        $service_update = "UPDATE services SET name='$s_up_name', details='$s_up_details' WHERE id = $id";
        $service_update_query = mysqli_query($db_connection, $service_update);
        
        $_SESSION['update-success'] = 'Social Update Successfully!';
        header('location:services.php');

        
    } else {
        $icon_name_explode = explode('.', $up_icon_name);
        $icon_name_ext = end($icon_name_explode);
        $allow_icon_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];
        if (in_array($icon_name_ext, $allow_icon_format)) {
            if ($s_up_icon['size'] < 1024 * 1024) {
                $select_icon = "SELECT * FROM services WHERE id=$id";
                $Check_icon_query = mysqli_query($db_connection, $select_icon);
                $Check_icon_assoc = mysqli_fetch_assoc($Check_icon_query);
                $old_icon = 'upload/' . $Check_icon_assoc['icon'];
                if (file_exists($old_icon)) {
                    if ($Check_icon_assoc['icon'] != 'default-icon.png') {
                        unlink($old_icon);
                    }
                }
                $icon_new_name = $id . rand(1, 999999) . '.' . $icon_name_ext;
                $new_icon_location = 'upload/' . $icon_new_name;
                move_uploaded_file($s_up_icon['tmp_name'], $new_icon_location);

                $service_update = "UPDATE services SET name = '$s_up_name', details = '$s_up_details', icon = '$icon_new_name'  WHERE id = $id";
                $service_update_query = mysqli_query($db_connection, $service_update);
                $_SESSION['update-success'] = 'Social Update Successfully!';
                header('location:services.php');
            } else {
                $_SESSION['img_size'] = 'Image Size Must less then 1MB';
                header('location:services.php');
            }
        } else {
            header('location:services.php');
        }
    }
}else {
    header('location:services.php');
} 

?>

