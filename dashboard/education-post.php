<?php
session_start();
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    }
    else {
        $education_insert = "INSERT INTO educations(degree, subject, passing_year, percentage)VALUES('$degree', '$subject', '$passing_year', '$percentage')";
        mysqli_query($db_connection, $education_insert);
        $_SESSION['education'] = 'Education added Successfully!';
        header('location:education.php');
    }
    
    
} else {
        header('location:education.php');
    }
