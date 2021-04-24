<?php
require_once '../db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $link = $_POST['link'];
    $social_insert = "INSERT INTO socials(name, icon, link)VALUES('$name', '$icon', '$link')";
    $social_insert_query = mysqli_query($db_connection, $social_insert);
    header('location:social-list.php');

}

?>