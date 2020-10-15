<?php

if(isset($_POST['loginbtn'])){
    session_start();

    include_once "dbconnection.php";

    $email = $_POST['email'];
    $password = trim($_POST['password']);

    $get_users = "SELECT * FROM `users` WHERE `email`='$email'";

    $results = mysqli_query($connection,$get_users);

    $records = mysqli_num_rows($results);

    if ($records < 1 )
    {
            // echo "Unavailable email";
            $_SESSION['error'] = "Invalid Credentials";
            header("location:../login.php");
    }else{

       $user = mysqli_fetch_assoc($results);        
        $email = $user["email"];
        $storedpassword = $user["password"];
        $names = $user['fullname'];
        $uname = $user['username'];
        $id = $user['id'];
        

        $user_profile = "SELECT * FROM `profile` WHERE userid = '$id' LIMIT 1";

        $user_events ="SELECT * FROM `events` WHERE userid = '$id' LIMIT 1";

        $results_profile = mysqli_query($connection, $user_profile);
        $profile = mysqli_fetch_assoc($results_profile);

        $results_events = mysqli_query($connection,$user_profile);
        $events = mysqli_fetch_assoc($connection,$user_events);


        $_SESSION['user'] = $email;
        $_SESSION['fullname'] = $names;
        $_SESSION['username'] = $uname;
        $_SESSION['joinedon'] = $user['date']; 
        $_SESSION['id'] =$id;
        $_SESSION['bio'] = $profile['bio'];
        $_SESSION['image'] = $profile['profile_image'];
        $_SESSION['events'] = $events['events'];

        if(password_verify($password,$storedpassword)){
           header("location:../home.php");
        }else{
            $_SESSION['error'] = "Invalid Credentials";
            header("location:../login.php");
        }
       
    }
    
    
    
}



?>