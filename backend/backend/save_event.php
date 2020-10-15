<?php
if(isset($_POST['save-event'])){
    include_once "dbconnection.php";
    include_once "save.php";
    $id = $_POST['id'];
    $saved=$_POST['save-event'];



    mySaveFunction($id,$saved,$connection);

}
?>