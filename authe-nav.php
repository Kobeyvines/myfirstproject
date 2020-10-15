<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#343a40;">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
<div class="logo-wrapper sn-ad-avatar-wrapper">
        <a href="edit-profile.php"class="userprofile"> <img id="profile"src="<?php if(isset($_SESSION['image'])){echo "images1/".$_SESSION['image'];} else {echo "images/slider10.jpg";}?>" length="10%" width="10%"padding left="0px"class="rounded-circle"></a>
        <a class="navbar-brand" href="user-profile.php"><?php echo $_SESSION['username'];?></a>
</div>
  <div class="bg">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-3">
  
    <li class="nav-item-home">
         <i class="fa fa-home w3-xlarge"></i>
        <a class="nav-link" href="home.php">Home</a>
    </li>
      <li class="nav-item-home">
      <i class="fa fa-search w3-xlarge"></i>
        <a class="nav-link" href="search-events.php">Search Events</a>
      </li>     
      <li class="nav-item-home">
      <i class="fa fa-help"></i>
        <a class="nav-link" href="help.php">Help</a>
      </li>    
      <li class="nav-item-logout">
        <a class="nav-link" href="backend/logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>