<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['education'];
    $degree = $_POST['degree'];
    $subject = $_POST['subject'];
    $passing_year = $_POST['passing_year'];
    $percentage = $_POST['percentage'];

    if (empty($degree)) {
        $_SESSION['degree'] = 'Degree field empty';
        header('location:education.php');
    }
    if (empty($subject)) {
        $_SESSION['subject'] = 'Subject field empty';
        header('location:education.php');
    }
    if (empty($passing_year)) {
        $_SESSION['passing_year'] = 'Select A Passing Year';
        header('location:education.php');
    }
    if (empty($percentage)) {
        $_SESSION['percentage'] = 'Percentage field empty';
        header('location:education.php');
        die();
    } else {
        $education_update = "UPDATE educations SET degree='$degree', subject='$subject', passing_year='$passing_year', percentage='$percentage'  WHERE id = $id";
        mysqli_query($db_connection, $education_update);
        $_SESSION['education'] = 'Education Update Successfully!';
        header('location:education.php');
    }
} else {
    header('location:education.php');
}