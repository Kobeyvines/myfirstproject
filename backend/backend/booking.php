<?php
function booking($eventname,$category,$county,$venue,$ticketprice,$period,$poster,$description,$con){
session_start();
require_once("backend/dbconnection.php");
$db_handle = new dbconnection();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM events WHERE id='" . $_GET["id"] . "'");
			$itemArray = array($productByCode[0]["id"]=>array('name'=>$productByCode[0]["name"], 'id'=>$productByCode[0]["id"], 'quantity'=>$_POST["quantity"], 'ticketprice'=>$productByCode[0]["ticketprice"]));
			
			if(!empty($_SESSION["book_event"])) {
				if(in_array($productByCode[0]["id"],array_keys($_SESSION["book_event"]))) {
					foreach($_SESSION["book_event"] as $k => $v) {
							if($productByCode[0]["id"] == $k) {
								if(empty($_SESSION["book_event"][$k]["quantity"])) {
									$_SESSION["book_event"][$k]["quantity"] = 0;
								}
								$_SESSION["book_event"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["book_event"] = array_merge($_SESSION["book_event"],$itemArray);
				}
			} else {
				$_SESSION["book_event"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["book_event"])) {
			foreach($_SESSION["book_event"] as $k => $v) {
					if($_GET["id"] == $k)
						unset($_SESSION["book_event"][$k]);				
					if(empty($_SESSION["book_event"]))
						unset($_SESSION["book_event"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["book_event"]);
	break;
}	
}
}
?>