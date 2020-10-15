function validateRegistrationForm(){
    // this.preventDefault();

    let form = document.forms["registrationform"]

    let fullname = form["fname"].value
    let username = form["uname"].value
    let email = form["email"].value
    let password = form["password"].value
    let c_password = form["cpassword"].value

    


    if(fullname == ""){
        document.getElementById("fname").style.border = "1px solid red";
        document.getElementById("fnametext").style.display = "block";
        
    }else{
        document.getElementById("fname").style.border = "1px solid gray";
        document.getElementById("fnametext").style.display = "none";
        
    }

    if(username == ""){
        document.getElementById("uname").style.border = "1px solid red";
        document.getElementById("unametext").style.display = "block";
        
    }else{
        document.getElementById("uname").style.border = "1px solid gray";
        document.getElementById("unametext").style.display = "none";
        
    }

    if(email == ""){
        document.getElementById("email").style.border = "1px solid red";
        document.getElementById("emailtext").style.display = "block";
       
    }else{
        document.getElementById("email").style.border = "1px solid gray";
        document.getElementById("emailtext").style.display = "none";
        
    }

    if(password == ""){
        document.getElementById("password").style.border = "1px solid red";
        document.getElementById("passwordtext").style.display = "block";
        
    }else{
        document.getElementById("password").style.border = "1px solid gray";
        document.getElementById("passwordtext").style.display = "none";
       
    }

    if(c_password != password ){
        document.getElementById("cpassword").style.border = "1px solid red";
        document.getElementById("cpasswordtext").style.display = "block";
        
    }else{
        document.getElementById("cpassword").style.border = "1px solid gray";
        document.getElementById("cpasswordtext").style.display = "none";
        
    }

    if(date == "today"){
        document.getElementById("date");
        document.getElementById("date");
        
    }else{
        document.getElementById("date");
        document.getElementById("passwordtext");
       
    }

    if(fullname == "" ||username == ""|| email == "" || password =="" || password != c_password){
        return false
    }else{
        return true
    }

}




//validate login form
function validateLoginForm(){

    let form = document.forms["loginform"]

 
    let email = form["email"].value
    let password = form["password"].value

    if(email == ""){
        document.getElementById("email").style.border = "1px solid red";
        document.getElementById("emailtext").style.display = "block";
       
    }else{
        document.getElementById("email").style.border = "1px solid gray";
        document.getElementById("emailtext").style.display = "none";
        
    }

    if(password == ""){
        document.getElementById("password").style.border = "1px solid red";
        document.getElementById("passwordtext").style.display = "block";
        
    }else{
        document.getElementById("password").style.border = "1px solid gray";
        document.getElementById("passwordtext").style.display = "none";
       
    }

    if(email == "" || password ==""){
        return false
    }else{
        return true
    }
    
}
/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
  }
  //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
function triggerClick(e) {
    document.querySelector('#profileImage').click();
  }
  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }
  $('#EVENT_DETAILS').on('shown.bs.modal', function (a, b,c) {
    var clickedImageUrl = a.relatedTarget.childNodes[0].src;
     displayPhotos(clickedImageUrl);
   })
   
   function displayPhotos(url) {
    console.log(url);
    $('.poster img').attr('src',url);
    $('#EVENT_DETAILS').modal();
   }

   
   function do_search()
   {
    var search_term=$("#search_term").val();
    $.ajax
    ({
     type:'post',
     url:'backend/search-eventbackend.php',
     data:{
      search:"search",
      search_term:search_term
     },
     success:function(response) 
     {
      document.getElementById("result_div").innerHTML=response;
     }
    });
    
    return false;
   }