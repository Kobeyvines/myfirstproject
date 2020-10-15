<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('..\header.html')?>
        <title>results</title>
</head>
<div class="result">
<body>
<?php
if(isset($_POST['search'])){
    include_once "dbconnection.php";
    
    $search_val=$_POST['search_term'];

    $query = "SELECT * from `events` WHERE MATCH (name,description) AGAINST ('$search_val')";
	
    $get_result = mysqli_query($connection,$query)or die( mysqli_error($connection));
     while($row=mysqli_fetch_array($get_result)){
      ?>
           <div class="e-card-horizontal">
    <div class="row"style=display:flex;>
       <div class= "container-events">
  <div class="col-6 col-sm-6 col-lg-6">
      <div class="card p-3">
            <ul class="nav">
                  <div class="mx-auto" style="width:160px; padding:0px;">
                    <div class="d-flex justify-content-center align-items-center" style="height:100%; background-color: rgb(233, 236, 239): background-repeat:no-repeat;background-size:contain;">
                    <div class="container" style="width: 100%; height: 100%;">
                     <li class="col-24 col-sm-24 col-lg-24"> <span  href="#EVENT_DETAILS" id="#EVENT_DETAILS" data-toggle="modal" data-target="#EVENT_DETAILS" data-id="<?php echo $row['id']; ?>"><?php echo"<img length=100% width=100% padding-left=0px src='Images3/".$row['poster']."' />"?></span></li>
                          <div id="EVENT_DETAILS" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                              <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                              <div class="modal-body" id="#EVENT_DETAILS">
                                  <div id="carouselExample" data-ride="carousel">
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <div class="poster"><img length=100% width=100% src="" class="img-responsive"></div>
                                    </div>
                                  </div>
                                    </div>
                                  </div>
                                 <p id="description"></p>
                                  

                                <div class="modal-footer">
                                <i type="submit" name="save-event" id="btn" onclick="myFunction(this);mySaveFunction();" class='fa fa-heart-o' style = "position:relative; left:-340px; top:2px;font-size:48px;color:black;"></i>
                                <script>
                                  function myFunction(x) {
                                    x.classList.toggle('fa-thumbs-up');
                                  }
                                </script>
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                      </div>
                  </div>
                 </div>
                
              <li class="nav-item"><a class="nav-link px-2" ><span><b>Event:</b><?php echo$row['name']?></span></a></li>
              <li class="nav-item"><a class="nav-link px-2" ><span><b>County:</b><?php echo$row['county']?> </span></a></li>
              <li class="nav-item"><a class="nav-link px-2" ><span><b>Venue:</b><?php echo$row['venue']?> </span></a></li>
              <li class="nav-item"><a class="nav-link px-2" ><span><b>Ticket Price:</b><?php echo$row['ticketprice']?></span></a></li>
              <li class="nav-item"><a class="nav-link px-2" ><span><b>Period in days:</b><?php echo$row['period']?></span></a></li>
              <li class="nav-item"><a class="nav-link px-2" ><span><b>Description</b><br><?php echo$row['description']?></span></a></li>
            </ul>
          
        </div>
    </div>    
  </div>
  </div>
  </div>
  <?php include('..\footer.html')?>
  </body>
</div>
</html>
  <?php

}
 ?>
 
<?php } ?>