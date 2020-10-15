<?php
  function updateEvent($id,$eventname,$county,$venue,$ticketprice,$period,$poster_Image,$description,$con){
    session_start();
    $poster_Image=time() . '-' . ($_FILES["posterupdate"]["name"]);
    $target_file = "../images3/$poster_Image";
    $targetFileForItem = "images3/$poster_Image";
   
    if(move_uploaded_file($_FILES['posterupdate']['tmp_name'], $target_file))
    {
    $sql = "UPDATE `events` SET`name`='$eventname',`county` = '$county',`venue`='$venue',`ticketprice`='$ticketprice',`period`='$period',`poster`='$poster_Image',`description`='$description' WHERE `id` = $id";
 
    $execution = mysqli_query($con, $sql);
   
    if($execution){
        //notify the user
        $_SESSION['success_operation'] = $eventname." has been updated!";
        //redirect
        header('location:../events.php');
    }else{
        echo "Error ".mysqli_error($con);
    }
}  
}

?>