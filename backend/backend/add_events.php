<?php
if(isset($_POST['add-event'])){
    include_once "dbconnection.php";
    include_once "manage/events.php";
    $eventname = $_POST['eventname'];
    $category = $_POST['category'];
    $county = $_POST['county'];
    $venue= $_POST['venue'];
    $ticketprice = $_POST['ticketprice'];
    $period = $_POST['period'];
    $poster=time() . '-' . $_FILES["poster"]["name"];
    $description=$_POST['description'];

    
  
     

   addEvent($eventname,$category,$county,$venue,$ticketprice,$period,$poster,$description,$connection);

}
?>