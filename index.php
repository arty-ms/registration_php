<?php
  if(isset($_SESSION['logged_user'])) {
    echo '<script>document.location.href="second.php";</script>'; }
?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <link rel="stylesheet" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/core.js"></script>
    <script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
      <title>BigBrother - <%= title %></title>
  </head>
  <body>
    <div class="window">
      <div class="wrap">
         <div class="header">
           <div id="login" onclick="login_toggle(this);" class="">Login</div> /
           <div id="registration" onclick="login_toggle(this);" class="active">Registration</div>
         </div>
         <form id="myForm" method="post">
          <div class="line" style="margin-top: 30px">
           <div class="edit"><input type="email" name="email" id="email" placeholder="E-mail"  pattern="\S+@[a-z]+.[a-z]+" title='email   required, email format' required /></div>
          </div>
         <div class="line" style="margin-top: 60px" id="username">
           <div class="edit"><input  name ="name" type="text" id="name" placeholder="name" pattern="[a-zA-Z]+" title='username  required, only a-z or A-Z characters' required  /></div>
         </div>     
          <div class="line" style="margin-top: 30px" id="user_login">
            <div class="edit"><input type="text"  name="login" id="userlogin" placeholder="login" title="  required field" required /></div>
          </div>    
         <div class="line" style="margin-top: 30px">
            <div class="edit"><input type="password" name="password" id="password" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*  [A-Z])\w{6,}$" title='password required, at least 6 characters long, at least one lowercase letter, one   uppercase letter, one digit, no special symbols  eg. ~!@#$%^&*()_+;' required /></div>
          </div>   
          <div class="line" style="margin-top: 30px" id="confirmationpassworddiv">
            <div class="edit"><input type="password" name="cpassword"  id="confirmationpassword" placeholder="Retype password" title="  required field" required /></div>
          </div>
          <div class="buttons"> 
            <input type="submit"  class="button" id="loginsbmt" value='REGISTRATION'>
          </div> 
        </form>          
      </div>
    </div>  
  </body>  
</html>