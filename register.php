<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add bootstrap css -->
    <?php include('header.html')?>
    <title>Register</title>
    <style> body{
background-image:url('images/slider8.jpg');
background-attachment:fixed;
background-size:100% 100%;
    }
</style>
</head>
<body id="register-page">
    <div class="container">
        <div class="row login-form">
            <div class="col-md-4 offset-md-4 text-center">
                <h3>Register to login</h3>
                <div class="card py-2">
                    <p>Register new Member</p>

                    <!-- Registration Form -->
                    <!-- action="backend/register-backend.php" method="POST" -->
                    <form  name="registrationform" onsubmit="return validateRegistrationForm" action="backend/register-backend.php" method="POST">   
                        <div class="form-group ml-3 mr-3">
                            <small id="fnametext" class="form-text" style="color:red; text-align:left !important; display:none;">This field is required</small>
                            <input type="text" class="form-control mb-3" name="fname" placeholder="Fullname" id="fname">

                            <small id="unametext" class="form-text" style="color:red; text-align:left !important; display:none;">This field is required</small>
                            <input type="text" class="form-control mb-3" name="uname" placeholder="username" id="uname">

                            <small id="emailtext" class="form-text" style="color:red; text-align:left !important; display:none;">This field is required</small>
                            <input type="email" class="form-control mb-3" name="email" placeholder="Email" id="email">

                            <small id="passwordtext" class="form-text" style="color:red; text-align:left !important; display:none;">This field is required</small>
                            <input type="password" class="form-control mb-3" name="password" placeholder="Password" id="password">

                            <small id="cpasswordtext" class="form-text" style="color:red; text-align:left !important; display:none;">Passwords Do not match</small>
                            <input type="password" class="form-control mb-3" name="cpassword" placeholder="Confirm Password" id="cpassword">
                        </div>

                      <div class="form-group float-left ml-3">
                        <button class="btn btn-primary" type="submit" id="registerbtn" name="registerbtn">Register</button>
                        <a href="index.php" class=" px-3 link"> 
                          <i class="fa fa-arrow-circle-left mr-2" aria-hidden="true"> back</i>
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
    
    var registerbtn = document.getElementById("registerbtn")

    registerbtn.addEventListener('click', function(event){
        
        if(validateRegistrationForm() === false){
            event.preventDefault()
        }
    });

</script>
</body>
</html>