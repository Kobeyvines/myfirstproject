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
    <title>memoir</title>
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

                <div id="shopping-cart">
                <div class="txt-heading"><h5>BOOKINGS</h5></div>

                <a id="btnEmpty" href="memoir.php?action=empty">Empty Cart</a>
                <?php
                if(isset($_SESSION["book_event"])){
                    $total_quantity = 0;
                    $total_price = 0;
                ?>	
                <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                <tr>
                <th>#</th>
                    <th style="text-align:center;" width="5%">Event Name</th>
                    <th style="text-align:center;" width="5%">Category</th>
                    <th style="text-align:center;" width="5%">County</th>
                    <th style="text-align:center;" width="5%">Venue</th>
                    <th style="text-align:center;" width="5%">Ticket Price</th>
                    <th style="text-align:center;" width="5%">Period</th>
                    <th style="text-align:center;" width="5%">Date Added</th>
                    <th style="text-align:center;" width="5%">Remove</th>
                </tr>	
                <?php		
                    foreach ($_SESSION["book_event"] as $item){
                        $item_price = $item["quantity"]*$item["ticketprice"];
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
                                <td style="text-align:center;"><a href="memoir.php?action=remove&code=<?php echo $item["id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>

                        </tr>
                        <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["ticketprice"]*$item["quantity"]);
                    }
                    ?>

                <tr>
                <td colspan="2" align ="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                <td></td>
                </tr>
                </tbody>
                </table>		
                  <?php
                } else {
                ?>
                <div class="no-records">Your Bookings are Empty</div>
                <?php 
                }
                ?>
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


