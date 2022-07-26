<?php
require("config.php")

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Login Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form">
            <h2 class="title">WELCOME</h2>
            <h3 class="title"> <strong>News Paper Smart</strong></h3>
    
            
         </form>
          <form method="POST" action="" class="sign-up-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
           <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" name="login" class="btn" value="Login" />
          </form>
          




        </div>
      </div>

    <?php
    if (isset($_POST['login'])) 
    {
     $username=$_POST['username'];
     $password=$_POST['password'];
     $query="select role from tbl_login where username='$username' and password='$password'";
     $result=mysqli_query($con,$query) or die("query failed ".mysqli_error());
     $row=mysqli_fetch_array($result);
     if ($row['role']=="admin")
      {
         header("location:adhome.php");
      }  
         elseif ($row['role']=="user")
          {
            header("location:agenthome.php");
           } 
           else 
            {
              echo "invalid username and password";
            } 

    }
    ?>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Start</h3>
            <p>
              
          
            </p>
            <button class="btn transparent" id="sign-up-btn">
              >>>>>>>
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Home </h3>
            <p>
              
            
            </p>
            <button class="btn transparent" id="sign-in-btn">
              <<<<<< 
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>