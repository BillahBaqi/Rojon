<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $quote = htmlentities($_POST['quote'], ENT_QUOTES);
    $image = $_FILES['image'];
    $id = $_POST['testimonial_edit'];    
    $up_image_name = $image['name'];

    if ($up_image_name == '') {
        $testimonial_update = "UPDATE testimonials SET name='$name', designation='$designation', quotes='$quote' WHERE id = $id";
        $testimonial_update_query = mysqli_query($db_connection, $testimonial_update);
        
        $_SESSION['update-success'] = 'Testimonial Update Successfully!';
        header('location:testimonials.php');

        
    } else {
        $image_name_explode = explode('.', $up_image_name);
        $image_name_ext = end($image_name_explode);
        $allow_image_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];
        if (in_array($image_name_ext, $allow_image_format)) {
            if ($image['size'] < 1024 * 1024) {
                $select_image = "SELECT * FROM testimonials WHERE id=$id";
                $Check_image_query = mysqli_query($db_connection, $select_image);
                $Check_image_assoc = mysqli_fetch_assoc($Check_image_query);
                $old_image = 'upload/' . $Check_image_assoc['image'];
            
                if (file_exists($old_image)) {
                    if ($Check_image_assoc['image'] != 'default-img.png') {
                        unlink($old_image);
                    }
                }
                $image_new_name = $id . rand(1, 999999) . '.' . $image_name_ext;    
                $new_image_location = 'upload/' . $image_new_name;
                move_uploaded_file($image['tmp_name'], $new_image_location);

                $testimonial_update = "UPDATE testimonials SET name='$name', designation='$designation', quotes='$quote', image='$image_new_name'  WHERE id = $id";
                $testimonial_update_query = mysqli_query($db_connection, $testimonial_update);
                $_SESSION['update-success'] = 'Testimonial Update Successfully!';
                header('location:testimonials.php');
            } else {
                $_SESSION['img_size'] = 'Image Size Must less then 1MB';
                header('location:testimonials-update.php');
            }
        } else {
            header('location:testimonials-update.php');
        }
    }
}else {
    header('location:testimonials.php');
} 

?>

