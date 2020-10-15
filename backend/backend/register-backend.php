<?php

if(isset($_POST['registerbtn'])){
    session_start();    
    include_once "dbconnection.php";
    
    $fullname = $_POST['fname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $password = trim($_POST['password']);    
    $active = True;
    $today = date('Y-m-d');

    $fullname_lower = strtolower($fullname);
    $formatted_name =  ucwords($fullname_lower);

    $username_lower =($username);
    $formatted_username = ($username_lower);


    $hashed_password = password_hash($password,PASSWORD_DEFAULT);

    $create_user_query = "INSERT INTO `users`(`email`,`fullname`,`username`,`password`,`active`,`date`)
            VALUES ('$email','$formatted_name','$formatted_username','$hashed_password','$active','$today')";

    $execution = mysqli_query($connection,$create_user_query);

    if($execution){

        $user_id = mysqli_insert_id($connection);

        $profile  ="INSERT INTO  `profile` (userid) VALUES ('$user_id')";

        $events ="INSERT INTO `events` (userid) VALUES('$user_id')";

        $exec = mysqli_query($connection, $profile);

        if($exec)
        {
            $_SESSION['user'] = $email;
        $_SESSION['fullname'] = $formatted_name;      
        $_SESSION['username'] = $formatted_username;
        $_SESSION['date'] = $today;
        $_SESSION['joinedon'] = $user['date']; 
        $_SESSION['id'] = $user_id;
        header("location:../home.php");
        }else{
            echo "Error Profile => ".mysqli_error($connection);
        }

        
    }else{
        echo "Error => ".mysqli_error($connection);
    }

}else{
    header("location:../register.php");
}
?>
