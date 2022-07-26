<?php
require("config.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Billing </title>
	
</head>
<body>
  
  <style >
   @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

*{5

  margin: 0;
  padding: 0   box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body{
   background-image: linear-gradient(-180deg, #a759d1 25%, #8261ee 100%);
  padding: 0 10px;
}
.wrapper{
  max-width: 500px;
  width: 100%;
  background: #fff;
  margin: 20px auto;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
  padding: 30px;
}

.wrapper .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color: #a759d1;
  text-transform: uppercase;
  text-align: center;
}

.wrapper .form{
  width: 100%;
}

.wrapper .form .inputfield{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.wrapper .form .inputfield label{
   width: 200px;
   color: #757575;
   margin-right: 10px;
  font-size: 14px;
}

.wrapper .form .inputfield .input,
.wrapper .form .inputfield .textarea{
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}

.wrapper .form .inputfield .textarea{
  width: 100%;
  height: 80px;
  resize: none;
}

.wrapper .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}

.wrapper .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: #d5dbd9 transparent transparent transparent;
  pointer-events: none;
}

.wrapper .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid #d5dbd9;
  border-radius: 3px;
}


.wrapper .form .inputfield .input:focus,
.wrapper .form .inputfield .textarea:focus,
.wrapper .form .inputfield .custom_select select:focus{
  border: 1px solid #fec107;
}

.wrapper .form .inputfield p{
   font-size: 14px;
   color: #757575;
}
.wrapper .form .inputfield .check{
  width: 15px;
  height: 15px;
  position: relative;
  display: block;
  cursor: pointer;
}
.wrapper .form .inputfield .check input[type="checkbox"]{
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.wrapper .form .inputfield .check .checkmark{
  width: 15px;
  height: 15px;
  border: 1px solid  #a759d1;
  display: block;
  position: relative;
}
.wrapper .form .inputfield .check .checkmark:before{
  content: "";
  position: absolute;
  top: 1px;
  left: 2px;
  width: 5px;
  height: 2px;
  border: 2px solid;
  border-color: transparent transparent #fff #fff;
  transform: rotate(-45deg);
  display: none;
}
.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark{
  background: #a759d1;
}

.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark:before{
  display: block;
}

.wrapper .form .inputfield .btn{
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
.wrapper .form .inputfield .btn:hover{
  background: #a759d1;
}

.wrapper .form .inputfield:last-child{
  margin-bottom: 0;
}

@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper .form .inputfield.terms{
    flex-direction: row;
  }
}
</style>
<form method="POST" action="">

<div class="wrapper">
    <div class="title">
      Customer Payments 
    </div>
    <div class="form">
       <div class="inputfield">
          <input type="text" placeholder="Enter customer name" class="input" name="cname">
          <div class="inputfield">
        <input type="submit" value="Search" name="Search" class="btn">
      </div>
       </div>  
       <?php
         
        if (isset($_POST['Search']))
         {
          $cname=$_POST['cname'];
          
          $query="select * from tbl_customer where cname='$cname'";
          $result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
          $row=mysqli_fetch_array($result);
          $cname=$row['cname'];
          $newspaper=$row['newspaper'];
          $_SESSION['cname']=$cname;

         
          
       echo"<div class='inputfield'>
         <label>Name</label>
          <input type=text' class='input' name='cname' value='$cname'>
       </div> 
        <div class='inputfield'>
          <label>News paper name</label>
          <input type='text' class='input' name='newspaper' value='$newspaper'>
       </div>";

    
          $query1="select * from tbl_newspaper where nname='$newspaper'";
          $result1=mysqli_query($con,$query1) or die("query failed....".mysqli_error($con));
          $row=mysqli_fetch_array($result1);
          $cprice=$row['nprice'];
        



     
       echo"<div class='inputfield'>
          <label>News paper price</label>
          <input type='text' class='input' name='nprice' value='$cprice'>
       </div> ";
       $date=date('Y-m-d');

      
      echo"<div class='inputfield'>
          <label>previously payed date</label>
          <input type='date' class='input' name='pdate'>
       </div> ";
     
      echo"<div class='inputfield'>
          <label>Current Date</label>
          <input type='date' class='input' name='cdate' value='$date'>
       </div>";

        }
       ?>
        <div class="inputfield">
          <label>Received money</label>
          <input type="text" class="input" name="rmoney">
       </div>
    
       <div class="inputfield">
          <label>Balance</label>
          <input type="text" class="input" name="balance" >
       </div>
        
     
      <div class="inputfield">
        <input type="submit" value="Submit" name="Submit" class="btn">
      </div>
      <?php
      $cname1=$_SESSION['cname'];
      if ( isset($_POST['Submit']))
 {
  $cname=$_POST['cname'];
  $nname=$_POST['newspaper'];
  $nprice=$_POST['nprice'];
  $pdate=$_POST['pdate'];
  $cdate=$_POST['cdate'];
  $rmoney=$_POST['rmoney'];
  $balance=$_POST['balance'];
  $query= "insert into tbl_billing values('$cname1','$nname',$nprice,'$pdate','$cdate',$rmoney,$balance)";
$result=mysqli_query($con,$query) or die("query failed....".mysqli_error($con));
 echo "Sucess";
 
 }
 ?>
      <div class="inputfield">
        <input type="submit" value="cancel" class="btn"> 
      </div>
    </div>
</div>

</form>
</body>
</html>