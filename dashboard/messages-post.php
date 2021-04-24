<?php
    session_start();
    include '../db.php';
      
    if(isset($_POST['messages-post'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $messages = htmlspecialchars(stripslashes(trim($_POST['messages'])));
        
        if(strlen($name) === 0){
        $_SESSION['contactnameempty'] = 'Your name should not be empty!';
        header('location:../index.php#contact');
        
        }
        
        if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
        $_SESSION['contactemail'] = 'Your name is invalid!';
        header('location:../index.php#contact');    
        
        }

        if(strlen($email) === 0){
        $_SESSION['contactemailempty'] = 'Your email should not be empty!';
        header('location:../index.php#contact');
        
        }

        if (strlen($messages) === 0) {
        $_SESSION['contactmessagesempty'] = 'Your message should not be empty!';
        header('location:../index.php#contact');
        
        }

        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
        $_SESSION['contactemail'] = 'Your email is invalid!';
        header('location:../index.php#contact');  
        die();          
        }       

        
        else {
                $insert = "INSERT INTO messages(name, email, messages)VALUES('$name', '$email', '$messages')";
                $insert_query = mysqli_query($db_connection, $insert);
                $_SESSION['contactmessagessuccess'] = 'Your message send successfully!';
                header('location:../index.php#contact');
        }
    }
?>