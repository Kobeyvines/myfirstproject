<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add bootstrap css -->
    <?php include('header.html')?>
    <title>Login</title>
    <style> body{
background-image:url('images/slider7.jpg');
background-attachment:fixed;
background-size:100% 100%; 
    }
    </style>
</head>
<body id="register-page">
    <div class="container">
        <div class="row login-form">
        <style> body {div style="background-image:url('slider7.jpg');"}</style>
            <div class="col-md-4 offset-md-4 text-center">
                <h3>Already registered? Login here</h3>
                <div class="card py-2">
                    <p>User Login</p>

                   
                        <?php if(isset($_SESSION['error'])){?>

                        
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <small> Error! <?php echo $_SESSION['error']; ?></small> 
                        </div>
                        <?php  } ?>

                        <?php $_SESSION['error'] = Null ?>
                   

                    <!-- Registration Form -->
                    <!-- action="backend/register-backend.php" method="POST" -->
                    <form  name="loginform" action="backend/login-backend.php" method="POST">   
                        <div class="form-group ml-3 mr-3">
         

                            <small id="emailtext" class="form-text" style="color:red; text-align:left !important; display:none;">This field is required</small>
                            <input type="email" class="form-control mb-3" name="email" placeholder="Email" id="email">

                            <small id="passwordtext" class="form-text" style="color:red; text-align:left !important; display:none;">This field is required</small>
                            <input type="password" class="form-control mb-3" name="password" placeholder="Password" id="password">

                        </div>

                      <div class="form-group float-left ml-3">
                        <button class="btn btn-primary" type="submit" id="loginbtn" name="loginbtn">Login</button>
                        <a href="register.php" class=" px-3 link"> 
                          <i class="ml-2" aria-hidden="true">Click here to register</i>
                        </a>
                      </div>                       
                    </form>
                    <!-- End registration Form -->

                </div>
            </div>
        </div>
    </div>
  
<!-- add bootstrap js -->
<?php include('footer.html')?>
<script>
    var registerbtn = document.getElementById("loginbtn")

    registerbtn.addEventListener('click', function(event){
    
    if(validateLoginForm() === false){
        event.preventDefault()
    }
});
</script>
</body>
</html>