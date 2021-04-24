<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['up_name'];
    $email = $_POST['up_email'];
    $phone = $_POST['up_phone'];
    $image = $_FILES['up_image'];
    $id = $_SESSION['id'];


    $image_name = $image['name'];
    if ($image_name == '') {
        $profile_update = "UPDATE users SET name = '$name', phone = '$phone', email = '$email' WHERE id = $id";
        $profile_update_query = mysqli_query($db_connection, $profile_update);
        $_SESSION['update-success'] = 'Registered Successfully!';
        header('location:edit-profile.php');
    } else {
        $image_name_explode = explode('.', $image_name);
        $image_name_ext = end($image_name_explode);
        $allow_image_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];
        if (in_array($image_name_ext, $allow_image_format)) {
            if ($image['size'] < 1024 * 1024) {
                $select_user_img = "SELECT * FROM users WHERE id=$id";
                $Check_user_img_query = mysqli_query($db_connection, $select_user_img);
                $Check_user_img_assoc = mysqli_fetch_assoc($Check_user_img_query);
                $user_old_img = 'upload/' . $Check_user_img_assoc ['image'];
                if (file_exists($user_old_img)) {
                    if ($Check_user_img_assoc['image'] != 'default.png') {
                        unlink($user_old_img);
                    }
                }                
                $image_new_name = $id . rand(1, 999999) . '.' . $image_name_ext;
                $new_img_location = 'upload/' . $image_new_name;
                move_uploaded_file($image['tmp_name'], $new_img_location);

                $profile_update = "UPDATE users SET name = '$name', phone = '$phone', email = '$email', image = '$image_new_name'  WHERE id = $id";
                $profile_update_query = mysqli_query($db_connection, $profile_update);
                $_SESSION['update-success'] = 'Registered Successfully!';
                header('location:edit-profile.php');
            } else {
                $_SESSION['img_size'] = 'Image Size Must less then 1MB';
                header('location:edit-profile.php');
            }
        } else {
            header('location:edit-profile.php');
        }
    }
    /* } else {
        header('location:edit-profile.php');
    } */
}
?>



<?php //with image validation

// $image_name = $image['name'];
// $image_name_explode = explode('.', $image_name);
// $image_name_ext = end($image_name_explode);
// $allow_image_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];
// if (in_array($image_name_ext, $allow_image_format)) {
//     if ($image['size'] < 1024 * 1024) {
//         $image_new_name = $id . rand(1, 999999) . '.' . $image_name_ext;
//         $new_img_location = 'upload/' . $image_new_name;
//         move_uploaded_file($image['tmp_name'], $new_img_location);

//         $profile_update = "UPDATE users SET name = '$name', phone = '$phone', email = '$email', image = '$image_new_name'  WHERE id = $id";
//         $profile_update_query = mysqli_query($db_connection, $profile_update);
//         $_SESSION['update-success'] = 'Registered Successfully!';
//         header('location:edit-profile.php');
//     } else {
//         $_SESSION['img_size'] = 'Image Size Must less then 1MB';
//         header('location:edit-profile.php');
//     }
// } else {
//     header('location:edit-profile.php');
// }


?>