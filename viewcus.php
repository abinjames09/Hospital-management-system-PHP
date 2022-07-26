<?php
require("config.php");
session_start();


?>
<!DOCTYPE html>
<html>
<head>
  <style>
     @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
         body
          {
            font-family: Arial, Helvetica, sans-serif;
         background-image: linear-gradient(-180deg, #a759d1 25%, #8261ee 100%);
          background-color: rgba(0,0,0,0.5);


          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: 100% 100%;
        }
            button {
  background-color: #8261ee;
  color: #fff;
  padding: 14px 20px;
  margin: 8px ;
  border: none;
  cursor: pointer;
  width: 30%;
  border-radius: 25px;
   margin-left: 100px;
    }
    .wrapper{
  max-width: 1200px;
  width: 100%;
  background: #fff;
  margin: 20px auto;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
  padding: 30px;
}
  .title{
  font-size: 28px;
  font-weight: 700;
  margin-bottom: 25px;
  color: #a759d1;
  text-transform: uppercase;
  text-align: center;
}

.wrapper .inputfield{
   width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}
.wrapper .inputfield .btn{
  width: 100%;
   padding: 8px 10px;
  font-size: 15px; 
  border: 0px;
  background: #8261ee;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
}

    button.acc
    {
      width: 80%;
      margin-left: 2px;
   }
    border-radius: 1px;
      padding: 5px 10px;
      margin: 1px ;
    }

    input[type=text], input[type=password],input[type=textarea] {
  width: 50%;
  padding: 12px 40px;
  margin-top:10px;
  margin-bottom: 10px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
   border-radius: 25px;
}




@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

#events {
 
  border-collapse: collapse;
  width: 100%;
   border: 1px solid #d5dbd9;
}

#events td, #events th {
  border: 1px solid #ddd;
  padding: 8px;
}

#events tr:nth-child(even){background-color: rgb(0, 0, 0,0.2);}




#events th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:  #ff589e;
  color: white;
}
.container {
    background: rgb(0, 0, 0); /* Fallback color */
      background: rgba(0, 0, 0, 0.5);
      color: #f1f1f1;

 margin: auto;
  width: 60%;
  border: 1px #73AD21;
  padding: 10px;
  }
</style>
</head>
<body>

 <form action="" method="POST">
<div class="wrapper">
   <div class="title">
      Customers
    </div>

    <div class="inputfield">
    <input type="text" name="cname" placeholder="Enter name" class="inputfield">
       </div>
        <div class="inputfield">
        <input type="submit" name="search" value="search" class="btn">
      </div> 


<table id="events">
  <tr>
    <th>Customer id</th>
    <th>Name</th>
    <th>Age</th>
    <th>Email</th>
    <th>phone</th>
    <th>Address</th>
    <th>land mark</th>
    <th>News Paper</th>
    <th>Change</th>
  </tr>
  <?php

  if (isset($_POST['search']))
         {
          $cname=$_POST['cname'];
           $query="select * from tbl_customer ";
          $result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
          while($row=mysqli_fetch_array($result))
          {
            $cid=$row['cid'];
            $cname=$row['cname'];
            $cage=$row['cage'];
            $cmail=$row['cmail'];
            $cphone=$row['cphone'];
            $caddress=$row['caddress'];
            $landmark=$row['landmark'];
            $newspaper=$row['newspaper'];
            $_SESSION['cname']=$cname;
 echo "<tr>
    <td>$cid</td>
    <td>$cname</td>
    <td>$cage</td>
    <td>$cmail</td>
    <td>$cphone</td>
    <td>$caddress</td>
    <td>$landmark</td>
    <td>$newspaper</td>
   
    
    </span>
   <span style='display:inline;''> <td> <button class='acc' name='Delete'>Delete</button>
    </td></span>";
  }
}
if (isset($_POST['Delete'])) {

   $cname1=$_SESSION['cname'];
   $query="delete from tbl_customer where cname='$cname1'" ;  
    $result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
    echo "Sucess";
     
}
?>
  </tr>
</table>
<div class="inputfield">
        <input type="submit" value="Cancel" class="btn">
      </div>
</div>
</center>
</br>


  
 


</form>
        
         </body>
         </html>