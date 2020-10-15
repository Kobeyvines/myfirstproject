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
    <title>food</title>
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
<div class="e-card-horizontal">
<div class="row"style=display:flex;>
  <?php
    include_once('backend/dbconnection.php');
    $sql=mysqli_query($connection,"SELECT * FROM `events` WHERE `category`='Food'")or die(mysqli_error($connection));
    while($row=mysqli_fetch_array($sql)){
  ?>
  <div class= "container-events">
  <div class="col-12 col-sm-6 col-lg-11">
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
 
  
  <?php

 }
  ?>
        </div> 
                   

        </div>
    </div>
</div> 
</div> 
<!-- Links -->
<section class="links">
        <div class="links-inner">
          <ul>
            <li><h3>What's New</h3></li>
            <li><a href="#">Surface Pro X</a></li>
            <li><a href="#">Surface Laptop 3</a></li>
            <li><a href="#">Surface Pro 7</a></li>
            <li><a href="#">Windows 10 apps</a></li>
            <li><a href="#">Office apps</a></li>
          </ul>
          <ul>
            <li><h3> Stores</h3></li>
            <li><a href="#">Account Profile</a></li>
            <li><a href="#">Download Center</a></li>
            <li><a href="#">Microsoft Store support</a></li>
            <li><a href="#">Returns</a></li>
            <li><a href="#">Older tracking</a></li>
          </ul>
          <ul>
            <li><h3>Education</h3></li>
            <li><a href="#">Microsfot in education</a></li>
            <li><a href="#">Office for students</a></li>
            <li><a href="#">Office 365 for schools</a></li>
            <li><a href="#">Deals for studentss</a></li>
            <li><a href="#">Microsfot Azure</a></li>
          </ul>
          <ul>
            <li><h3>Enterprise</h3></li>
            <li><a href="#">Azure</a></li>
            <li><a href="#">AppSource</a></li>
            <li><a href="#">Automotive</a></li>
            <li><a href="#">Government</a></li>
            <li><a href="#">Healthcare</a></li>
          </ul>
          <ul>
            <li><h3>Developer</h3></li>
            <li><a href="#">Visual Studio</a></li>
            <li><a href="#">Windowszs Dev Center</a></li>
            <li><a href="#">Developer Network</a></li>
            <li><a href="#">TechNet</a></li>
            <li><a href="#">YourPlug Developer</a></li>
          </ul>
          <ul>
            <li><h3>Company</h3></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">About YourPlug</a></li>
            <li><a href="#">Company news</a></li>
            <li><a href="#">Privacy at Microsoft</a></li>
            <li><a href="#">Inverstors</a></li>
          </ul>
        </div>
      </section>

      <!-- Footer -->
      <footer class="footer">
        <div class="footer-inner">
          <div><i class="fas fa-globe fa-2x"></i> English (United States)</div>
          <ul>
            <li><a href="#">Sitemap</a></li>
                    <li><a href="#">Contact YourPlug</a></li>
                    <li><a href="#">Privacy & cookies</a></li>
                    <li><a href="#">Terms of use</a></li>
                    <li><a href="#">Trademarks</a></li>
                    <li><a href="#">Safety & eco</a></li>
                    <li><a href="#">About our ads</a></li>
                    <li><a href="#">&copy; YourPlug 2020</a></li>
          </ul>
        </div>
      </footer>

</div>
<?php include('footer.html')?>
</body>
</div>
</html>

<?php } ?>


