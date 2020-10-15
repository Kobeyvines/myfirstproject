<?php 
if(isset($_POST['close-account.php'])){
session_start();
$msgToUser="";
if(@!$_SESSION['user_id'])
{
    $msgToUser= '<br /><br /><font color = "#FF000">Only registered users can delete their account</font><p><a href = "register.php">Join Here</a></p>';
    exit();
}
$id = $_SESSION['user_id'];

if(isset($_POST['delete']))
{


        $del_acct_pass = $_POST['del_account_pass'];

         require_once('include/dbconnection.php');  
        $check_pass= mysql_query("SELECT password FROM user WHERE password = '$del_acct_pass' AND  user_id = '$id'") or die(mysql_error());
        if($check_pass)
        {
            $sql = mysql_query("SELECT * FROM user  WHERE user_id = '$id'")or die(mysql_error());
            $pass_check_num = mysql_num_rows($sql);
            if($pass_check_num >0)
            {
                $pic1=("members/$id/image01.jpg");
                if(file_exists($pic1))
                { 
                      unlink($pic1);

                }
                $dir = "members/$id";
                rmdir($dir);
                $sqltable1 = mysql_query("DELETE FROM user WHERE user_id ='$id'")or die(mysql_error());
                $sqltable1 = mysql_query("DELETE FROM blabing WHERE u_id ='$id'")or die(mysql_error());
                session_destroy();
                $msgToUser="YOUR Account Has Been Deleted!!!";
                exit();
            }
       }
       $msgToUser="<h3 style='color:#CC0000'>You must Write the Correct Password</h3>";
 }
} 
?>