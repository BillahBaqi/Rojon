<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_name = $_POST['p_name'];
    $p_category = $_POST['p_category'];
    $p_title = $_POST['p_title'];
    $p_details = htmlentities($_POST['p_details'], ENT_QUOTES);   
    $p_thumbnail = $_FILES['p_thumbnail'];
    $p_feature = $_FILES['p_feature'];
    $id = $_POST['portfolio_edit'];


    $thumbnail_name = $p_thumbnail['name']; 
    $feature_name = $p_feature['name'];

    $allow_img_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];

    if ($thumbnail_name == '' && $feature_name == '') {

        $portfolio_update = "UPDATE portfolio SET category_id='$p_category', project= '$p_name', title='$p_title',  description='$p_details' WHERE p_id = $id";
        mysqli_query($db_connection, $portfolio_update);
        
        $_SESSION['update-success'] = 'Portfolio Update Successfully!';
        header('location:portfolio.php');
        
    }
    elseif ($thumbnail_name != '' && $feature_name == '') {
        $thumbnail_name_explode = explode('.', $thumbnail_name);
        $thumbnail_name_ext = end($thumbnail_name_explode);

        $allow_img_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];

        if (in_array($thumbnail_name_ext, $allow_img_format)) {
            if ($p_thumbnail['size'] < 1024 * 1024) {
                $select_portfolio = "SELECT * FROM portfolio WHERE p_id=$id";
                $Check_portfolio_query = mysqli_query($db_connection, $select_portfolio);
                $Check_portfolio_assoc = mysqli_fetch_assoc($Check_portfolio_query);
                $old_thumbnail = 'upload/' . $Check_portfolio_assoc['thumbnail'];
                if (file_exists($old_thumbnail)) {
                    unlink($old_thumbnail);
                }
                
                $thumbnail_new_name = rand(1, 9999999) . '.' . $thumbnail_name_ext;
                $new_thumbnail_location = 'upload/' . $thumbnail_new_name;

                move_uploaded_file($p_thumbnail['tmp_name'], $new_thumbnail_location);

                $portfolio_update = "UPDATE portfolio SET category_id='$p_category', project= '$p_name', title='$p_title',  description='$p_details', thumbnail='$thumbnail_new_name' WHERE p_id = $id";
                mysqli_query($db_connection, $portfolio_update);

                $_SESSION['update-success'] = 'Portfolio Update Successfully!';
                header('location:portfolio.php');
            } else {
                $_SESSION['img-size'] = 'Image Size Must less then 1MB';
                header('location:services.php');
            }
        } else {

            header('location:services.php');
        }
    } 
    elseif ($thumbnail_name == '' && $feature_name != '') {
        
        $feature_name_explode = explode('.', $feature_name);
        $feature_name_ext = end($feature_name_explode);

        $allow_img_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];

        if (in_array($feature_name_ext, $allow_img_format)) {
            if ($p_feature['size'] < 1024 * 1024) {
                $select_portfolio = "SELECT * FROM portfolio WHERE p_id=$id";
                $Check_portfolio_query = mysqli_query($db_connection, $select_portfolio);
                $Check_portfolio_assoc = mysqli_fetch_assoc($Check_portfolio_query);                
                $old_featured = 'upload/' . $Check_portfolio_assoc['featured'];
                if (file_exists($old_featured)) {
                    unlink($old_featured);
                }
                
                $feature_new_name = rand(1, 9999999) . '.' . $feature_name_ext;
                $new_feature_location = 'upload/' . $feature_new_name;
                
                move_uploaded_file($p_feature['tmp_name'], $new_feature_location);

                $portfolio_update = "UPDATE portfolio SET category_id='$p_category', project= '$p_name', title='$p_title',  description='$p_details', featured='$feature_new_name' WHERE id = $id";
                mysqli_query($db_connection, $portfolio_update);

                $_SESSION['update-success'] = 'Portfolio Update Successfully!';
                header('location:portfolio.php');
            } else {
                $_SESSION['img-size'] = 'Image Size Must less then 1MB';
                header('location:portfolio.php');
            }
        } else {

            header('location:portfolio.php');
        }
    }
    else {
        $thumbnail_name_explode = explode('.', $thumbnail_name);
        $thumbnail_name_ext = end($thumbnail_name_explode);

        $feature_name_explode = explode('.', $feature_name);
        $feature_name_ext = end($feature_name_explode);

        $allow_img_format = ["jpg", "jpeg", "gif", "png", "bmp", "JPG", "PNG", "GIF", "webp", "svg"];

        if (in_array($thumbnail_name_ext && $feature_name_ext, $allow_img_format)) {            
            if ($p_thumbnail['size'] < 1024 * 1024 && $p_feature['size'] < 1024 * 1024) {
                $select_portfolio = "SELECT * FROM portfolio WHERE p_id=$id";
                $Check_portfolio_query = mysqli_query($db_connection, $select_portfolio);
                $Check_portfolio_assoc = mysqli_fetch_assoc($Check_portfolio_query);
                $old_thumbnail = 'upload/' . $Check_portfolio_assoc['thumbnail'];
                if (file_exists($old_thumbnail)) {
                    unlink($old_thumbnail);
                }
                $old_featured = 'upload/' . $Check_portfolio_assoc['featured'];
                if (file_exists($old_featured)) {
                    unlink($old_featured);
                }                
                $thumbnail_new_name = rand(1, 9999999) . '.' . $thumbnail_name_ext;
                $new_thumbnail_location = 'upload/' . $thumbnail_new_name;

                $feature_new_name = rand(1, 9999999) . '.' . $feature_name_ext;
                $new_feature_location = 'upload/' . $feature_new_name;

                move_uploaded_file($p_thumbnail['tmp_name'], $new_thumbnail_location);
                move_uploaded_file($p_feature['tmp_name'], $new_feature_location);

                $portfolio_update = "UPDATE portfolio SET category_id='$p_category', project= '$p_name', title='$p_title',  description='$p_details', thumbnail='$thumbnail_new_name', featured='$feature_new_name' WHERE p_id = $id";
                mysqli_query($db_connection, $portfolio_update);

                $_SESSION['update-success'] = 'Social Update Successfully!';
                header('location:portfolio.php');
            } else {
                $_SESSION['img-size'] = 'Image Size Must less then 1MB';
                header('location:portfolio.php');
            }
        } else {

            header('location:portfolio.php');
        }
    }
}else {
    header('location:portfolio.php');
}
?>