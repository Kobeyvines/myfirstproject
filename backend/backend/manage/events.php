<?php
        //add an event
    function addEvent($eventname,$category,$county,$venue,$ticketprice,$period,$poster,$description,$con){
        session_start();
        $user_id= $_SESSION['id'];
        $today = date('Y-m-d');
        $poster_Image=time() . '-' . $_FILES["poster"]["name"];
        $target_file = "../images3/$poster_Image";
        $targetFileForItem = "images3/$poster_Image";
        
        // if folder not exists than it will make folder.
        
       
        
        if(move_uploaded_file($_FILES['poster']['tmp_name'], $target_file))
        {
            $sql = "INSERT INTO `events`(`name`,`category`,`county`,`venue`,`ticketprice`,`period`,`date`,`userid`,`poster`,`description`) VALUES ('$eventname','$category','$county','$venue','$ticketprice','$period','$today','$user_id','$poster_Image','$description')"; 
                                                    
            $execution = mysqli_query($con, $sql);
            //redirect
            if($execution){
                //notify the user
                $_SESSION['success'] = "Event added!";
                //redirect
                header('location:../events.php');
            }else{
                echo "Error ".mysqli_error($con);
            }
        }
    
    }


    

    


    function getEvents($con)
    {
        $id = $_SESSION['id']; 
        $sql = "SELECT * FROM `events`WHERE `userid` ='$id'";

        $results = mysqli_query($con, $sql);

        $number_of_records = mysqli_num_rows($results);

        $events =  array();

        if($number_of_records > 0 ){
            $fetched_events = array();
            
            while($rows = mysqli_fetch_assoc($results)){
                $fetched_events[] = $rows;
            } 
             $events =  $fetched_events;           

        } else{
            $events = [];
         }

        return $events;
    }

    function deleteEvent($id, $con)
    {
        session_start();

        $sql = "DELETE FROM `events` WHERE `id` = '$id'";
        if(mysqli_query($con, $sql))
        {
            $_SESSION["success_operation"] = "Record ".$id." deleted";
            
            header('location:../events.php');
        }

    }


       
?>