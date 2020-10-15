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
    <title>user profile</title>
</head>
<div class="dashboardbody">
<body>
    <!-- navbar -->
    <?php include('authe-nav.php'); ?>
    

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

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="containersideprofile">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 235px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link px-2 active" href="edit-profile.php"><i class='fa fa-address-card-o'> </i><span>Edit profile</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="email-settings.php"><i class='fa fa-envelope'></i> <span>Email settings</span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="change-password.php"><i class='fa fa-eye'></i> <span>Change password </span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="connect-account.php"><i class='fa fa-twitter'></i> <span>Connect accounts </span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="close-account.php"><i class='fa fa-power-off'></i> <span>Close account </span></a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
              <?php
                   include_once "backend/dbconnection.php";;
                  $results = mysqli_query($connection, "SELECT * FROM `profile`");
                  $profile = mysqli_fetch_all($results, MYSQLI_ASSOC);
              ?>
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239): background-repeat:no-repeat;background-size:contain;">
                    
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"><img id="profile"src="<?php if(isset($_SESSION['image'])){echo "images1/".$_SESSION['image'];} else {echo "images/avatar.jpg";}?>"length="85%" width="85%"style="background-repeat:no-repeat;background-size:contain;"></span>
                   
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><a><?php echo $_SESSION['fullname'];?></a></h4>
                    <p class="mb-0">@:<?php echo $_SESSION['username']; ?></p>
                    <div class="text-muted"><small><?php echo $_SESSION['user']; ?></small></div>
                    <br>
                    <p class="mb-0"> <?php if(isset($_SESSION['bio'])){echo "".$_SESSION['bio'];}?></p>
                    <div class="mt-2">
        
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">administrator</span>
                    <div class="text-muted"><small>Joined on:<?php echo $_SESSION['joinedon']; ?></small></div>
                  </div>
                </div> 
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane-active">
                  <form class="form" novalidate="">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="name" placeholder="" value="<?php echo $_SESSION['fullname'];?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" type="text" name="username" placeholder="" value="<?php echo $_SESSION['username'];?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" placeholder="user@example.com" value="<?php echo $_SESSION['user'];?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Location</label>
                              <select class="form-control" type="text" placeholder="" value="">
                                 <option value="">Nairobi</options>
                                 <option value="">Mombasa</options>
                                 <option value="">Nakuru</options>
                                 <option value="">Kiambu</options>
                                 <option value="">Kisumu</options>
                              </select>
                              
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>Bio</label>
                              
                              <textarea class="form-control" rows="5" placeholder="My Bio"><?php if(isset($_SESSION['bio'])){echo "".$_SESSION['bio'];}?></textarea>
                             </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">Get fast, free help from our friendly assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
        </div>
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
<?php include('footer.html')?>
</body>
</div>
</html>

<?php } ?>