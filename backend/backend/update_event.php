<?php
if(isset($_POST['update-event'])){
    include_once "dbconnection.php";
    include_once "manage/update-events.php";
    $eventname = $_POST['eventname'];
    $county = $_POST['county'];
    $venue= $_POST['venue'];
    $ticketprice = $_POST['ticketprice'];
    $period = $_POST['period'];
    $poster_image=time() . '-' .( $_FILES["posterupdate"]["name"]);
    $description=$_POST['description'];
    $id = $_POST['id'];




    updateEvent($id,$eventname,$county,$venue,$ticketprice,$period,$poster_image,$description,$connection);

}
?>