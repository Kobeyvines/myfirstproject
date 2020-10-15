<?php 
    if(isset($_GET["id"])){
        include_once "dbconnection.php";
        include_once "manage/events.php";
       
        $eventname_id = $_GET['id'];

        deleteEvent($eventname_id, $connection);

        
    }else{
        header('location:../events.php');
    }

?>