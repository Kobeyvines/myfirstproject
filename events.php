<?php 
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('header.html')?>
    <title>Add an Event</title>
</head>
<div class="dashboardbody">
<body>
    <!-- navbar -->
    <?php include('authe-nav.php'); ?>
<div class="container-fluid py-2">
    <div class="row mt-3">
        <div class="col-md-3">

        <?php if(isset($_SESSION['success'])){?>
                        
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <small> Success! <?php echo $_SESSION['success']; ?></small> 
                        </div>
                        <?php  } ?>
                
                    <?php $_SESSION['success'] = Null ?>
                    
                    <div id="mySidebar" class="sidebar">
  <div class="yourplugside"class="navbar-brand" href="index.php">
  <i>YOUR PLUG</i>
</div>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="user-profile.php">User Profile</a>
  <div class="dropdown">
   <button href="#" class ="dropdown-btn">Categories
     <i class="fa fa-caret-down"></I>
   </button>
    <div class="dropdown-container">
    <a href="music.php">Music<span style='font-size:30px;'>&#127927;</span></a>
      <a href="art.php">Art<span style='font-size:30px;'>&#127912;</span></a>
      <a href="fashion.php">Fashion<span style='font-size:30px;'>&#128083;</span></a>
      <a href="technology.php">Technology<span style='font-size:30px;'>&#128640;</span></a>
      <a href="food.php">Food<span style='font-size:30px;'>&#127829;</span></a>
      <a href="educative.php">Educative<span style='font-size:30px;'>&#128218;</span></a>
      <a href="sports.php">Sports<span style='font-size:30px;'>&#127936;</span></a>
    </div>
  </div>
  <a href="memoir.php">Memoir</a>
  <a href="events.php">Add an Event</a>
</div>
<div id="main">
  <button class="openbtn" onclick="openNav()">&#9776;</button>
</div>

        <div class="card">
            <div class="card-header text-center">
            <h3>Add an Event</h3>
            </div>
            <div class="card-body">
            
        
        <form method ="POST" action="backend/add_events.php"enctype="multipart/form-data">
                <div class="form-group">
                    <label for="eventInput">Event Name</label>
                    <input type="text" class="form-control" id="eventInput" aria-describedby="emailHelp" name="eventname">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="countyId">Category</label>
                    <select name="category" id="categoryId" class="form-control">
                        <option value="Music">Music</option>
                        <option value="Art">Art</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Technology">Technology</option>
                        <option value="Food">Food</option>
                        <option value="Educative">Educative</option>
                        <option value="Sports">Sports</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="countyId">County</label>
                    <select name="county" id="countyId" class="form-control">
                        <option value="Nairobi">Nairobi</option>
                        <option value="Mombasa">Mombasa</option>
                        <option value="Nakuru">Nakuru</option>
                        <option value="Kiambu">Kiambu</option>
                        <option value="Kisumu">Kisumu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="venueInput">Venue</label>
                    <input type="text" class="form-control" id="venueInput" aria-describedby="emailHelp" name="venue">
                </div>


                <div class="form-group">
                    <label for="ticketpriceId">Ticket Price</label>
                    <input type="number" class="form-control" id="ticketpriceId"  name="ticketprice" >
                </div>
                <div class="form-group">
                    <label for="periodId">period</label>
                    <input type="number" class="form-control" id="periodId"  name="period" placeholder="In days">
                </div>
                <div class="form-group">
                  <label>Event Description</label>
                 <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                <label for="posterId">Upload a Poster</label>
                <input type="file" class="form-control-file" id="myFile" name="poster">
                </div>

                <button type="submit" class="btn btn-primary mt-2 btn-sm btn-block" name="add-event">Submit</button>
        </form>
        </div>
        </div>
        </div>
        <div class="col-md-8">
            <?php 
                include_once "backend/dbconnection.php";
                include_once "backend/manage/events.php";
                
                $events = getEvents($connection);                
            ?>

             <?php if(isset( $_SESSION["success_operation"])){?>
                        
                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <small> Success! <?php echo  $_SESSION["success_operation"]; ?></small> 
                        </div>
                        <?php  } ?>
                
                    <?php  $_SESSION["success_operation"] = Null ?>
                <?php if(count($events) > 0){?>
            <table class="table table-sm table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Event Name</th>
                    <th>Category</th>
                    <th>County</th>
                    <th>Venue</th>
                    <th>Ticket Price</th>
                    <th>Period</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($events as $num => $cs){
                            ?>
                            <tr>
                                <td><?php echo $num+1    ?></td>
                                <td><?php echo $cs["name"] ?></td>
                                <td><?php echo $cs["category"] ?></td>
                                <td><?php echo $cs["county"] ?></td>
                                <td><?php echo $cs["venue"] ?></td>
                                <td><?php echo "Ksh.".$cs["ticketprice"] ?></td>
                                <td><?php echo $cs["period"]."days" ?></td>
                                <td><?php echo $cs["date"] ?></td>
                                <td>
                               
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#event<?php echo $cs['id']?>"><i class="fa fa-edit px-1" aria-hidden="true"></i>Edit</button>
                                    <a href="backend/delete_event.php?id=<?php echo $cs["id"]  ?>" class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this record?')">
                                    <i class="fa fa-trash px-1" aria-hidden="true"></i>Delete</a>
                                
                                                                 
                                </td>
                                 <!-- Modal -->
                                <div class="modal fade" id="event<?php echo $cs['id']?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Update Event Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="POST" action="backend/update_event.php">
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="eventID"  name="id" value="<?php echo $cs["id"] ?>" readonly style="display:none">
                                            
                                            </div>
                                        <div class="form-group">
                                                <label for="eventInput">Event Name</label>
                                                <input type="text" class="form-control" id="eventInput" aria-describedby="emailHelp" name="eventname" value="<?php echo $cs["name"] ?>">
                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                            </div>

                                            <div class="form-group">
                                                <label for="countyId">Category</label>
                                                <select name="category" id="categoryId" class="form-control">
                                                           <option value="Music">Music</option>
                                                           <option value="Art">Art</option>
                                                           <option value="Fashion">Fashion</option>
                                                           <option value="Technology">Technology</option>
                                                           <option value="Food">Food</option>
                                                           <option value="Educative">Educative</option>
                                                           <option value="Sports">Sports</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="CountyId">County</label>
                                                <select name="county" id="CountyId" class="form-control">
                                                    <option value="Nairobi" <?php if($cs["county"] == "Nairobi"){ echo "selected";}?>>Nairobi</option>
                                                    <option value="Mombasa" <?php if($cs["county"] == "Mombasa"){ echo "selected";}?>>Mombasa</option>
                                                    <option value="Nakuru" <?php if($cs["county"] == "Nakuru"){ echo "selected";}?>>Nakuru</option>
                                                    <option value="Kiambu"<?php if($cs["county"] == "Kiambu"){ echo "selected";}?>>Kiambu</option>
                                                    <option value="Kisumu"<?php if($cs["county"] == "Kisumu"){ echo "selected";}?>>Kisumu</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="venueInput">venue</label>
                                                <input type="text" class="form-control" id="venueInput" aria-describedby="emailHelp" name="venue" value="<?php echo $cs["venue"] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="ticketpriceId">Ticket Price</label>
                                                <input type="number" class="form-control" id="ticketpriceId"  name="ticketprice" value="<?php echo $cs["ticketprice"] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="periodId">Period</label>
                                                <input type="number" class="form-control" id="periodId"  name="period" value="<?php echo $cs["period"]?>">
                                            </div>
                                            <div class="form-group">
                                              <label>Description</label>
                                               <textarea name="description" class="form-control"><?php echo $cs["description"]?></textarea>
                                           </div>
                                            <div class="form-group">
                                                <label for="posterId">Upload a Poster</label>
                                                <input type="file" class="form-control-file" id="myFile" name="posterupdate">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-sm btn-primary" name="update-event">Update</button>
                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- end modal -->
                            </tr>

                            <?php
                        }
                    ?>
                </tbody>
            </table>
                    <?php }else {
                            echo "<h1> You have not added any event</h1>";
                    }
                    ?>

                   

        </div>
    </div>
</div>  
<?php include('footer.html')?>
</body>
</div>
</html>

<?php } ?>


